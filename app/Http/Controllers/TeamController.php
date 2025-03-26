<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function teams()
    {
        return view("admin.team");
    }

    public function teamList(Request $request)
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
            1 => 'no',
            2 => 'image',
            3 => 'name',
            4 => 'position',
            5 => 'sequence',
        ];

        // Ensure sorting by sequence
        $columnName = $columns[$columnIndex] ?? 'sequence';

        // Build the query with ROW_NUMBER based on sequence
        $query = DB::table('teams')
            ->select([
                'id',
                DB::raw('ROW_NUMBER() OVER(ORDER BY sequence ASC) as no'), // Order by sequence here
                'name',
                'position',
                'image',
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
                "image" => '<img src="' . Storage::url($treatment->image) . '" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ccc">',
                "name" => $treatment->name,
                "position" => $treatment->position,
                "sequence" => $treatment->sequence,
                "action" => '
                    <a href="' . route('admin.teamedit', $treatment->id) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteteam(' . $treatment->id . ')" class="btn btn-danger btn-sm">
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


    public function teamAdd()
    {
        return view("admin.team_add");
    }
    public function teamedit($id)
    {
        $team = Team::find($id);
        return view("admin.team_edit", compact('team'));
    }
    public function teameditOp(Request $request)
    {

        $addteam = Team::find($request->id);
        $addteam->name = $request->name;
        $addteam->position = $request->position;
        $addteam->category = $request->category;
        $addteam->description = $request->description;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/team');
            $addteam->image = 'public/team/' . basename($imagePath);
        }
        $addteam->save();
        return redirect()->back()->with('success', 'Team updated successfully');
    }
    public function teamAddOp(Request $request)
    {
        // dd($request->all());
        // "name" => "gopal keshri"
        // "position" => "bsv"
        // "image" =>

        $sequenceno = Team::max('sequence');
        // dd($sequenceno);
        $addteam = new Team();
        $addteam->name = $request->name;
        $addteam->position = $request->position;
        $addteam->category = $request->category;
        $addteam->description = $request->description;
        $addteam->sequence = $sequenceno + 1;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/team');
            $addteam->image = 'public/team/' . basename($imagePath);
        }
        $addteam->save();
        return redirect()->back();
    }
    public function teamDelete(Request $request)
    {
        $team = Team::find($request->id);
        if ($team) {
            $team->delete();
            return response()->json(['success' => '200', 'message' => 'data deleted successfully!']);
        } else {
            return response()->json(['success' => '404', 'message' => 'data not found']);
        }
    }

    public function updatePosition(Request $request)
    {
        $request->validate([
            'positions.*.id' => 'required|exists:teams,id',
            'positions.*.position' => 'required|integer',
        ]);

        foreach ($request->positions as $position) {
            Team::where('id', $position['id'])->update(['sequence' => $position['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Positions updated successfully.']);
    }
}
