<?php

namespace App\Http\Controllers;

use App\Models\OurLocation;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OurLocationController extends Controller
{
    public function index()
    {
        return view('admin.our-location');
    }


    public function ourlocationList(Request $request)
    {
        $draw = filter_var($request->get('draw'), FILTER_VALIDATE_INT);
        $start = filter_var($request->get('start'), FILTER_VALIDATE_INT);
        $rowperpage = filter_var($request->get('length'), FILTER_VALIDATE_INT);

        if ($draw === false || $start === false || $rowperpage === false) {
            return response()->json(['error' => 'Invalid parameters']);
        }

        $order_arr = $request->get('order', []);
        $searchValue = $request->get('search')['value'] ?? '';

        if (!is_array($order_arr) || count($order_arr) === 0) {
            return response()->json(['error' => 'Invalid order parameter']);
        }

        $columnIndex = $order_arr[0]['column'];
        $columnSortOrder = $order_arr[0]['dir'] ?? 'asc';

        $columns = [
            0 => 'id',
            1 => DB::raw('ROW_NUMBER() OVER(ORDER BY id ASC) as no'),
            2 => 'images',
            3 => 'location_name',
            5 => 'description',
            6 => 'address',
            7 => 'phone',
            8 => 'fax',
            9 => 'email',
            10 => 'expertise',
        ];
        $columnName = $columns[$columnIndex] ?? 'id';

        $query = DB::table('our_locations')
            ->select([
                'id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY id ASC) as no'), // Order by sequence here
                'images',
                'location_name',
                'location_details',
                'description',
                'address',
                'phone',
                'fax',
                'email',
                'business_hours',
                'expertise',
                'extra_information',
            ])
            ->where('is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('location_name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before pagination
        $totalRecords = $query->count();

        // Apply sorting and pagination
        $ourlocations = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($ourlocations as $ourlocation) {
            $data_arr[] = [
                'id' => $ourlocation->id,
                "no" => $ourlocation->no,
                "image" => '<img src="' . Storage::url($ourlocation->images) . '" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ccc">',
                "location_name" => $ourlocation->location_name,
                "description" => $ourlocation->description,
                "address" => $ourlocation->address,
                "phone" => $ourlocation->phone,
                "fax" => $ourlocation->fax,
                "email" => $ourlocation->email,
                "expertise" => $ourlocation->expertise,
                "action" => '
                    <a href="' . route('admin.ourlocationedit', $ourlocation->id) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteourlocation(' . $ourlocation->id . ')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                     <a href="' . route('admin.ourlocationview', $ourlocation->id) . '" class="btn btn-success btn-sm">
                       <i class="fas fa-eye"></i>
                    </a>',
            ];
        }

        $response = [
            'draw' => $draw,
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecords,
            'data' => $data_arr,
        ];

        return response()->json($response);
    }


    public function ourlocationAdd()
    {
        return view("admin.our-location_add");
    }


    public function ourlocationAddOp(Request $request)
    {
        $addourlocation = new OurLocation();
        $addourlocation->location_name = $request->locationname;
        $addourlocation->location_details = $request->locationdetail;
        $addourlocation->description = $request->description;
        $addourlocation->address = $request->address;
        $addourlocation->phone = $request->phone;
        $addourlocation->fax = $request->fax;
        $addourlocation->email = $request->email;
        $addourlocation->business_hours = $request->business_hours;
        $addourlocation->expertise = $request->expertise;
        $addourlocation->extra_information = $request->extrainformation;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/ourlocation');
            $addourlocation->images = 'public/ourlocation/' . basename($imagePath);
        }
        $addourlocation->save();
        return redirect()->back();
    }
    public function ourlocationedit($id)
    {
        $ourlocation = OurLocation::find($id);
        return view("admin.our-location_edit", compact('ourlocation'));
    }
    public function ourlocationview($id)
    {
        $ourlocation = OurLocation::find($id);
        return view("admin.our-location_view", compact('ourlocation'));
    }
    public function ourlocationeditOp(Request $request)
    {
        // dd($request->all());
        $ourlocation = OurLocation::find($request->id);
        $ourlocation->location_name = $request->locationname;
        $ourlocation->location_details = $request->locationdetail;
        $ourlocation->description = $request->description;
        $ourlocation->address = $request->address;
        $ourlocation->phone = $request->phone;
        $ourlocation->fax = $request->fax;
        $ourlocation->email = $request->email;
        $ourlocation->business_hours = $request->business_hours;
        $ourlocation->expertise = $request->expertise;
        $ourlocation->extra_information = $request->extrainformation;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/ourlocation');
        //     $ourlocation->images = 'public/ourlocation/' . basename($imagePath);
        // }

        if ($request->hasFile('image')) {
            if (!empty($ourlocation->images) && Storage::exists($ourlocation->images)) {
                Storage::delete($ourlocation->images);
            }

            $imagePath = $request->file('image')->store('public/ourlocation');
            $ourlocation->images = $imagePath;
        }

        $ourlocation->save();
        return redirect()->back()->with('success', 'Our Location updated successfully');
    }


    public function ourlocationDelete(Request $request)
    {
        $ourlocation = OurLocation::find($request->id);
        if ($ourlocation) {
            $ourlocation->delete();
            return response()->json(['success' => '200', 'message' => 'data deleted successfully!']);
        } else {
            return response()->json(['success' => '404', 'message' => 'data not found']);
        }
    }
}
