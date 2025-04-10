<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TreatmentController extends Controller
{
    //
    public function treatments()
    {
        return view('admin.treatments');
    }
    public function treatmentAdd()
    {
        return view('admin.treatment_add');
    }

    public function treatmentAddOp(Request $request)
    {
        $sequenceno = Treatment::max('sequence');

        $adddata = new Treatment();
        $adddata->treatment_name = $request->treatment_name;
        $adddata->body_description = $request->description;
        $adddata->causes_summary = $request->causes_summary;
        $adddata->causes_note = $request->causes_note;
        $adddata->symptoms = $request->symptoms;
        $adddata->extra_information = $request->extra_information;
        $adddata->sequence = $sequenceno + 1;


        // Store image and banner in the storage folder
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/treatment');
            $adddata->image = 'public/treatment/' . basename($imagePath);
        }

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('public/treatment');
            $adddata->banner = 'public/treatment/' . basename($bannerPath);
        }

        $adddata->save();

        $addcauses = [];

        if ($request->has('causes') && is_array($request->causes)) {
            // Combine causes and descriptions into a unique array
            $uniqueCauses = [];

            foreach ($request->causes as $key => $cause) {
                if (!empty($cause) && isset($request->causes_description[$key])) {
                    $causeKey = strtolower(trim($cause)); // Normalize case and trim spaces

                    // Only add if this cause hasn't been added yet in the request
                    if (!isset($uniqueCauses[$causeKey])) {
                        $uniqueCauses[$causeKey] = [
                            'treatment_id' => $adddata->id,
                            'name' => trim($cause),
                            'description' => trim($request->causes_description[$key]),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }

            // Convert associative array to indexed array
            $addcauses = array_values($uniqueCauses);
        }

        // Insert only if we have unique causes
        if (!empty($addcauses)) {
            DB::table('causes')->insert($addcauses);
        }

        return response()->json(['success' => 200, 'message' => 'Treatment added successfully!']);
    }

    public function treatmentList(Request $request)
    {
        // dd('hello');
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
            0 => 'treatmentsid',
            1 => 'treatments.no',
            2 => 'treatments.treatment_name',
            3 => 'treatments.image',
            4 => 'treatments.sequence',
        ];

        $columnName = $columns[$columnIndex] ?? 'treatments.sequence';

        // Build the query
        $query = DB::table('treatments')
            ->select([
                'treatments.id as id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY treatments.sequence ASC) as no'),
                'treatments.treatment_name as treatment_name',
                'treatments.image as image',
                'treatments.sequence as sequence',
            ])
            ->where('treatments.is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('treatments.treatment_name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before applying pagination
        $totalRecords = $query->count();

        // Fetch records with pagination
        $treatments = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($treatments as $treatment) {
            $data_arr[] = [
                'id' => $treatment->id,
                "no" => $treatment->no,
                "sequence" => $treatment->sequence,
                "image" => '<img src="' . Storage::url($treatment->image) . '" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ccc">',
                "treatment_name" => $treatment->treatment_name,
                "action" => '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="window.location.href=\'' . route('admin.treatmentEdit', ['id' => $treatment->id]) . '\'" class="btn btn-primary btn-sm">
                    <i class="fas fa-pen"></i>
                </a>&nbsp;
                <a href="javascript:void(0)" onclick="deletetreatment(' . $treatment->id . ')" class="btn btn-danger btn-sm">
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

    public function treatmentEdit($id)
    {
        $treatment = Treatment::find($id);
        if (!$treatment) {
            return response()->json(['error' => 'Treatment not found'], 404);
        }

        $treatment->image = Storage::url($treatment->image);
        $treatment->banner = Storage::url($treatment->banner);

        $causes = DB::table('causes')
            ->where('treatment_id', $treatment->id)
            ->get();




        return view("admin.treatment_edit", compact("treatment", "causes"));
    }

    public function treatmentEditOp(Request $request)
    {
        try {

            // Find and update treatment
            $treatment = Treatment::findOrFail($request->id);
            $treatment->treatment_name = $request->treatment_name;
            $treatment->body_description = $request->description;
            $treatment->causes_summary = $request->causes_summary;
            $treatment->causes_note = $request->causes_note;
            $treatment->symptoms = $request->symptoms;
            $treatment->extra_information = $request->extra_information;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($treatment->image && Storage::exists($treatment->image)) {
                    Storage::delete($treatment->image);
                }
                $imagePath = $request->file('image')->store('treatment', 'public');
                $treatment->image = $imagePath;
            }

            // Handle banner upload
            if ($request->hasFile('banner')) {
                // Delete old banner if exists
                if ($treatment->banner && Storage::exists($treatment->banner)) {
                    Storage::delete($treatment->banner);
                }
                $bannerPath = $request->file('banner')->store('treatment', 'public');
                $treatment->banner = $bannerPath;
            }

            $treatment->save();

            // // Handle causes
            // if ($request->causes_question && count($request->causes_question) > 0) {
            //     // First, delete existing causes for this treatment
            //     DB::table('causes')->where('treatment_id', $treatment->id)->delete();

            //     // Prepare new causes data
            //     $addcauses = [];
            //     foreach ($request->causes_question as $key => $question) {
            //         if (!empty($question) && !empty($request->causes_answer[$key])) {
            //             $addcauses[] = [
            //                 'treatment_id' => $treatment->id,
            //                 'name' => $question,
            //                 'description' => $request->causes_answer[$key],
            //                 'created_at' => now(),
            //                 'updated_at' => now()
            //             ];
            //         }
            //     }

            //     // Use upsert if Laravel version >= 8.x, otherwise use insert
            //     if (!empty($addcauses)) {
            //         if (method_exists(DB::table('causes'), 'upsert')) {
            //             DB::table('causes')->upsert(
            //                 $addcauses,
            //                 ['treatment_id', 'name'], // Unique keys
            //                 ['description', 'updated_at'] // Fields to update
            //             );
            //         } else {
            //             DB::table('causes')->insert($addcauses);
            //         }
            //     }
            // }

            return response()->json([
                'status' => 200,
                'message' => 'Treatment updated successfully!'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function treatmentDelete(Request $request)
    {
        $treatment = Treatment::find($request->id);
        $treatment->delete();
        return response()->json(['success' => '200', 'message' => 'data deleted successfully!']);
    }

    public function updatePosition(Request $request)
    {
        $request->validate([
            'positions.*.id' => 'required',
            'positions.*.position' => 'required|integer',
        ]);

        foreach ($request->positions as $position) {
            Treatment::where('id', $position['id'])->update(['sequence' => $position['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Positions updated successfully.']);
    }
}
