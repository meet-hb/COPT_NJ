<?php

namespace App\Http\Controllers;

use App\Models\Therapy;
use App\Models\TherapyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TherapyController extends Controller
{
    //
    public function therapys()
    {
        return view("admin.therapy");
    }
    public function therapyList(Request $request)
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
            0 => 'therapies.id',
            1 => 'therapies.no',
            2 => 'therapies.therapy_name',
            4 => 'therapies.sequence',
        ];

        $columnName = $columns[$columnIndex] ?? 'therapies.sequence';

        // Build the query
        $query = DB::table('therapies')
            ->select([
                'therapies.id as id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY therapies.sequence ASC) as no'),
                'therapies.therapy_name as therapy_name',
                'therapies.sequence as sequence',
            ])
            ->where('therapies.is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('therapies.therapy_name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before applying pagination
        $totalRecords = $query->count();

        // Fetch records with pagination
        $therapies = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($therapies as $therapy) {
            $data_arr[] = [
                'id' => $therapy->id,
                "no" => $therapy->no,
                "therapy_name" => $therapy->therapy_name,
                'sequence' => $therapy->sequence,
                "action" => '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="window.location.href=\'' . route('admin.therapyEdit', ['id' => $therapy->id]) . '\'" class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                </a>&nbsp;
                <a href="javascript:void(0)" onclick="deletetherapy(' . $therapy->id . ')" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
            </div>',

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
    public function therapyAdd()
    {
        return view("admin.therapy_add");
    }
    public function therapyAddOp(Request $request)
    {
        $sequenceno = Therapy::max('sequence');

        $addtherapy = new Therapy();
        $addtherapy->therapy_name = $request->Therapy_name;
        $addtherapy->sequence = $sequenceno + 1;
        $addtherapy->save();

        return response()->json(['success' => '200', 'message' => 'Therapy added successfully!']);
    }
    public function therapyDelete(Request $request)
    {
        $therapy = Therapy::find($request->id);
        if ($therapy->delete()) {
            return response()->json(['success' => '
            200', 'message' => 'Therapy deleted successfully!']);
        } else {
            return response()->json(['error' => 'An error occurred while deleting the therapy.']);
        }
    }
    public function therapyEdit($id)
    {
        $therapy = Therapy::find($id);
        return view('admin.therapy_edit', compact('therapy'));
    }
    public function therapyEditOp(Request $request)
    {
        $therapy = Therapy::find($request->id);
        $therapy->therapy_name = $request->Therapy_name;
        $therapy->save();

        return response()->json(['success' => '200', 'message' => 'Therapy updated successfully!']);
    }
    // ============================================================================================================================
    public function therapyDetails()
    {
        return view("admin.treatment_det");
    }
    public function therapyDetailList(Request $request)
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
            0 => 'therapy_details.id',
            1 => DB::raw('ROW_NUMBER() OVER(ORDER BY therapy_details.id ASC) as no'),
            2 => 'therapy_details.image',
            3 => 'therapies.therapy_name',
        ];

        $columnName = $columns[$columnIndex] ?? 'therapy_details.id';

        // Build the query
        $query = DB::table('therapy_details')
            ->join('therapies', 'therapy_details.therapy_id', '=', 'therapies.id')
            ->select([
                'therapy_details.id as id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY therapy_details.id ASC) as no'),
                'therapy_details.benner as benner',
                'therapies.therapy_name as therapy_name',
            ])
            ->where('therapy_details.is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('therapies.therapy_name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before applying pagination
        $totalRecords = $query->count();

        // Fetch records with pagination
        $therapies_details = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($therapies_details as $therapies_detail) {
            $data_arr[] = [
                "no" => $therapies_detail->no,
                "image" => '<img src="' . Storage::url($therapies_detail->benner) . '" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ccc">',
                "therapy_name" => $therapies_detail->therapy_name,

                "action" => '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="window.location.href=\'' . route('admin.therapyDetailEdit', ['id' => $therapies_detail->id]) . '\'" class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                </a>&nbsp;
                <a href="javascript:void(0)" onclick="deletetherapydetail(' . $therapies_detail->id . ')" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
            </div>',

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
    public function therapyDetailAdd()
    {
        $therapies = Therapy::all();
        return view("admin.treatment_det_add", compact('therapies'));
    }
    public function therapyDetailAddOp(Request $request)
    {

        $sequenceno = TherapyDetail::max('sequence');

        $addtherapy = new TherapyDetail();
        $addtherapy->therapy_id = $request->therapy_name;
        $addtherapy->description = $request->description;
        $addtherapy->sequence = $sequenceno + 1;

        $addtherapy->extra_information = $request->extra_information;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/therapy');
            $addtherapy->image = 'public/therapy/' . basename($imagePath);
        }

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('public/therapy');
            $addtherapy->benner = 'public/therapy/' . basename($bannerPath);
        }

        $addtherapy->save();

        return response()->json(['success' => '200', 'message' => 'Therapy added successfully!']);
    }
    public function therapyDetailDelete(Request $request)
    {
        $therapy = TherapyDetail::find($request->id);
        if ($therapy->delete()) {
            return response()->json(['success' => '
            200', 'message' => 'Therapy deleted successfully!']);
        } else {
            return response()->json(['error' => 'An error occurred while deleting the therapy.']);
        }
    }
    public function therapyDetailEdit($id)
    {
        $therapies = Therapy::all();
        $therapydetails = TherapyDetail::find($id);
        return view('admin.treatment_det_edit', compact('therapydetails', 'therapies'));
    }
    public function therapyDetailEditOp(Request $request)
    {
        $therapy = TherapyDetail::find($request->id);
        $therapy->therapy_id = $request->therapy_name;
        $therapy->description = $request->description;
        $therapy->extra_information = $request->extra_information;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/therapy');
            $therapy->image = 'public/therapy/' . basename($imagePath);
        }

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('public/therapy');
            $therapy->benner = 'public/therapy/' . basename($bannerPath);
        }

        $therapy->save();

        return response()->json(['success' => '200', 'message' => 'Therapy updated successfully!']);
    }

    public function updatePosition(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'positions.*.id' => 'required',
            'positions.*.position' => 'required|integer',
        ]);

        foreach ($request->positions as $position) {
            Therapy::where('id', $position['id'])->update(['sequence' => $position['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Positions updated successfully.']);
    }
}
