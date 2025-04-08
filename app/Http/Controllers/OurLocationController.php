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

        // Update columns array to prioritize "sequence"
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

        // Ensure sorting by sequence
        // $columnName = $columns[$columnIndex] ?? 'sequence';

        // Build the query with ROW_NUMBER based on sequence
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
                    <a href="' . route('admin.teamedit', $ourlocation->id) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteteam(' . $ourlocation->id . ')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
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
    // public function teamedit($id)
    // {
    //     $team = Team::find($id);
    //     return view("admin.team_edit", compact('team'));
    // }
    // public function teameditOp(Request $request)
    // {

    //     $addteam = Team::find($request->id);
    //     $addteam->name = $request->name;
    //     $addteam->position = $request->position;
    //     $addteam->category = $request->category;
    //     $addteam->description = $request->description;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('public/team');
    //         $addteam->image = 'public/team/' . basename($imagePath);
    //     }
    //     $addteam->save();
    //     return redirect()->back()->with('success', 'Team updated successfully');
    // }


    // public function teamDelete(Request $request)
    // {
    //     $team = Team::find($request->id);
    //     if ($team) {
    //         $team->delete();
    //         return response()->json(['success' => '200', 'message' => 'data deleted successfully!']);
    //     } else {
    //         return response()->json(['success' => '404', 'message' => 'data not found']);
    //     }
    // }

    // public function updatePosition(Request $request)
    // {
    //     $request->validate([
    //         'positions.*.id' => 'required|exists:teams,id',
    //         'positions.*.position' => 'required|integer',
    //     ]);

    //     foreach ($request->positions as $position) {
    //         Team::where('id', $position['id'])->update(['sequence' => $position['position']]);
    //     }

    //     return response()->json(['success' => true, 'message' => 'Positions updated successfully.']);
    // }
}
