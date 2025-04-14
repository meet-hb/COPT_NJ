<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Therapy;
use App\Models\TherapyDetail;
use App\Models\TreatmentDetail;
use App\Models\ViewMoreTreatment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ViewMoreConditionsController extends Controller
{
    //
    public function treatments()
    {
        return view("admin.vmc_treatment");
    }
    public function treatmentsList(Request $request)
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
            0 => 'view_more_treatments.id',
            1 => 'view_more_treatments.no',
            2 => 'view_more_treatments.name',
            // 4 => 'view_more_treatments.sequence',
        ];

        $columnName = $columns[$columnIndex] ?? 'view_more_treatments.id';

        // Build the query
        $query = DB::table('view_more_treatments')
            ->select([
                'view_more_treatments.id as id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY view_more_treatments.id ASC) as no'),
                'view_more_treatments.name as name',
                // 'view_more_treatments.sequence as sequence',
            ])
            ->where('view_more_treatments.is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('view_more_treatments.name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before applying pagination
        $totalRecords = $query->count();

        // Fetch records with pagination
        $view_more_treatments = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($view_more_treatments as $treatment) {
            $data_arr[] = [
                'id' => $treatment->id,
                "no" => $treatment->no,
                "name" => $treatment->name,
                // 'sequence' => $therapy->sequence,
                "action" => '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="window.location.href=\'' . route('admin.treatmentsEdit', ['id' => $treatment->id]) . '\'" class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                </a>&nbsp;
                <a href="javascript:void(0)" onclick="deleteViewMoreTreatment(' . $treatment->id . ')" class="btn btn-danger btn-sm">
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
    public function treatmentsAdd()
    {
        return view("admin.vmc_treatment_add");
    }
    public function treatmentsAddOp(Request $request)
    {
        // $sequenceno = Therapy::max('sequence');
        $alreadyexist = ViewMoreTreatment::where('name', $request->name)->exists();
        if ($alreadyexist) {
            return response()->json(['error' => 'Treatment title already exists'], 409);
        }

        $addViewMoreTreatment = new ViewMoreTreatment();
        $addViewMoreTreatment->name = $request->name;
        // $addViewMoreTreatment->sequence = $sequenceno + 1;
        $addViewMoreTreatment->save();

        return response()->json(['success' => '200', 'message' => 'View More Treatment added successfully!']);
    }
    public function treatmentsDelete(Request $request)
    {
        $ViewMoreTreatment = ViewMoreTreatment::find($request->id);

        if ($ViewMoreTreatment && $ViewMoreTreatment->delete()) {
            TreatmentDetail::where('treatment_id', $request->id)->delete();
            return response()->json(['success' => '
            200', 'message' => 'Treatment deleted successfully!']);
        } else {
            return response()->json(['error' => 'An error occurred while deleting the treatment.']);
        }
    }
    public function treatmentsEdit($id)
    {
        $ViewMoreTreatment = ViewMoreTreatment::find($id);
        return view('admin.vmc_treatment_edit', compact('ViewMoreTreatment'));
    }
    public function treatmentsEditOp(Request $request)
    {
        $alreadyexist = ViewMoreTreatment::where('name', $request->name)->where('id', '!=', $request->id)->exists();
        if ($alreadyexist) {
            return response()->json(['error' => 'Treatment title already exists'], 409);
        }
        $ViewMoreTreatment = ViewMoreTreatment::find($request->id);
        $ViewMoreTreatment->name = $request->name;
        $ViewMoreTreatment->save();

        return response()->json(['success' => '200', 'message' => 'Therapy updated successfully!']);
    }
    // ============================================================================================================================
    public function treatmentsDetails()
    {
        return view("admin.vmc_treatment_det");
    }
    public function treatmentsDetailList(Request $request)
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
            0 => 'treatment_details.id',
            1 => DB::raw('ROW_NUMBER() OVER(ORDER BY treatment_details.id ASC) as no'),
            // 2 => 'therapy_details.image',
            2 => 'view_more_treatments.name',
        ];

        $columnName = $columns[$columnIndex] ?? 'treatment_details.id';

        // Build the query
        $query = DB::table('treatment_details')
            ->join('view_more_treatments', 'treatment_details.treatment_id', '=', 'view_more_treatments.id')
            ->select([
                'treatment_details.id as id',
                'treatment_details.type as type',
                DB::raw('ROW_NUMBER() OVER(ORDER BY treatment_details.id ASC) as no'),
                // 'therapy_details.benner as benner',
                'view_more_treatments.name as name',
            ])
            ->where('treatment_details.is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('view_more_treatments.name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before applying pagination
        $totalRecords = $query->count();

        // Fetch records with pagination
        $treatment_details = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($treatment_details as $treatment_detail) {
            $data_arr[] = [
                "no" => $treatment_detail->no,
                // "image" => '<img src="' . Storage::url($therapies_detail->benner) . '" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ccc">',
                "name" => $treatment_detail->name,
                'type' => $treatment_detail->type,
                "action" => '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="window.location.href=\'' . route('admin.treatmentsDetailEdit', ['id' => $treatment_detail->id]) . '\'" class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                </a>&nbsp;
                <a href="javascript:void(0)" onclick="deletetreatmentdetail(' . $treatment_detail->id . ')" class="btn btn-danger btn-sm">
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
    public function treatmentsDetailAdd()
    {
        $ViewMoreTreatments = ViewMoreTreatment::all();
        return view("admin.vmc_treatment_det_add", compact('ViewMoreTreatments'));
    }
    public function treatmentsDetailAddOp(Request $request)
    {

        // $sequenceno = TherapyDetail::max('sequence');

        $addtreatment = new TreatmentDetail();
        $addtreatment->treatment_id = $request->name;
        $addtreatment->description = $request->description;
        // $addtherapy->sequence = $sequenceno + 1;

        $addtreatment->type = $request->type;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/therapy');
        //     $addtherapy->image = 'public/therapy/' . basename($imagePath);
        // }

        // if ($request->hasFile('banner')) {
        //     $bannerPath = $request->file('banner')->store('public/therapy');
        //     $addtherapy->benner = 'public/therapy/' . basename($bannerPath);
        // }

        $addtreatment->save();

        return response()->json(['success' => '200', 'message' => 'Therapy added successfully!']);
    }
    public function treatmentsDetailDelete(Request $request)
    {
        $treatmentdetail = TreatmentDetail::find($request->id);
        if ($treatmentdetail->delete()) {
            return response()->json(['success' => '200', 'message' => 'Therapy deleted successfully!']);
        } else {
            return response()->json(['error' => 'An error occurred while deleting the therapy.']);
        }
    }
    public function treatmentsDetailEdit($id)
    {
        $treatments = ViewMoreTreatment::all();
        $treatmentdetails = TreatmentDetail::find($id);
        return view('admin.vmc_treatment_det_edit', compact('treatmentdetails', 'treatments'));
    }
    public function treatmentsDetailEditOp(Request $request)
    {
        $treatment = TreatmentDetail::find($request->id);
        $treatment->treatment_id = $request->name;
        $treatment->description = $request->description;
        $treatment->type = $request->type;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/therapy');
        //     $therapy->image = 'public/therapy/' . basename($imagePath);
        // }

        // if ($request->hasFile('banner')) {
        //     $bannerPath = $request->file('banner')->store('public/therapy');
        //     $therapy->benner = 'public/therapy/' . basename($bannerPath);
        // }

        $treatment->save();

        return response()->json(['success' => '200', 'message' => 'Therapy updated successfully!']);
    }

    // public function updatePosition(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'positions.*.id' => 'required',
    //         'positions.*.position' => 'required|integer',
    //     ]);

    //     foreach ($request->positions as $position) {
    //         Therapy::where('id', $position['id'])->update(['sequence' => $position['position']]);
    //     }

    //     return response()->json(['success' => true, 'message' => 'Positions updated successfully.']);
    // }
}
