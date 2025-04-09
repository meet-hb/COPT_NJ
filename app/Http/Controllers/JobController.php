<?php

namespace App\Http\Controllers;

use App\Models\JobsTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function jobs()
    {
        return view('admin.jobs');
    }
    public function jobAdd()
    {
        return view('admin.jobs_add');
    }

    public function jobList(Request $request)
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

        // Update columns array to prioritize "sequence"
        $columns = [
            0 => 'id',
            1 => 'no',
            2 => 'name',
            3 => 'sequence',
        ];

        // Ensure sorting by sequence
        $columnName = $columns[$columnIndex] ?? 'sequence';

        // Build the query with ROW_NUMBER based on sequence
        $query = DB::table('jobs_titles')
            ->select([
                'id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY sequence ASC) as no'), // Order by sequence here
                'name',
                'sequence',
            ])
            ->where('is_deleted', 0);

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', '%' . $searchValue . '%');
            });
        }

        // Get total records before pagination
        $totalRecords = $query->count();

        // Apply sorting and pagination
        $jobs = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        // Prepare data for response
        $data_arr = [];
        foreach ($jobs as $job) {
            $data_arr[] = [
                'id' => $job->id,
                "no" => $job->no,
                "name" => $job->name,
                "sequence" => $job->sequence,
                "action" => '<a href="javascript:void(0)" onclick="deletejobs(' . $job->id . ')" class="btn btn-danger btn-sm">    <i class="fas fa-trash"></i></a>',
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


    public function jobAddOp(Request $request)
    {
        $sequenceno = JobsTitle::max('sequence');
        $addjob = new JobsTitle();
        $addjob->name = $request->name;
        $addjob->sequence = $sequenceno + 1;
        $addjob->save();
        return redirect()->back();
    }


    public function jobDelete(Request $request)
    {
        $jobtitle = JobsTitle::find($request->id);
        if ($jobtitle) {
            $jobtitle->delete();
            return response()->json(['success' => '200', 'message' => 'data deleted successfully!']);
        } else {
            return response()->json(['success' => '404', 'message' => 'data not found']);
        }
    }


    public function updatePosition(Request $request)
    {
//         dd($request->all());
//         "positions" => array:3 [
//     0 => array:2 [
//       "id" => "3"
//       "position" => "1"
//     ]
//     1 => array:2 [
//       "id" => "1"
//       "position" => "2"
//     ]
//     2 => array:2 [
//       "id" => "2"
//       "position" => "3"
//     ]
//   ]
        $request->validate([
            'positions.*.id' => 'required',
            'positions.*.position' => 'required|integer',
        ]);

        foreach ($request->positions as $position) {
            JobsTitle::where('id', $position['id'])->update(['sequence' => $position['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Positions updated successfully.']);
    }
}
