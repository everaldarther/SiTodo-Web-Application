<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Task;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessionId = auth()->user()->id;

        $availabe = DB::table('members')->select('members.*')->where('members.user_id','=', $sessionId)->get();


        // $workspace = Member::all();
        // $workspace = Member::find($sessionId);

        // $detail = Workspace::find($workspace);

        confirmDelete();

        return view('workspaces.index',[
            'available' => $availabe,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sessionId = auth()->user()->id;


        return view('workspaces.createWorkspace',['user_id' => $sessionId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Please input Workspace Name',
        ];

        $validator = Validator::make($request->all(), [
            'workspaceName' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        $sessionId = auth()->user()->id;

        $workspace = New Workspace;
        $workspace->user_id = $request->user_id;
        $workspace->namaWorkspace = $request->workspaceName;
        $workspace->deskWorkspace = $request->workspaceDesc;
        $workspace->save();


        $member = New Member;
        $member->workspace_id = $workspace->id;
        $member->user_id = $sessionId;
        $member->level = '1';
        $member->save();

        Alert::toast('Workspace Created', 'success');

        return redirect()->route('workspaces.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sessionId = auth()->user()->id;
        $workspace = Workspace::find($id);

        $member = Member::all()->where('workspace_id','=',$workspace->id)->pluck('user_id');

        $usersName = User::all()->whereIn('id',$member);

        $task = Task::all()->whereIn('workspace_id',$workspace->id);

        return view('workspaces.detail', compact('workspace','sessionId','member','usersName','task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sessionId = auth()->user()->id;
        $workspace = Workspace::find($id);

        $member = Member::all()->where('workspace_id','=',$workspace->id)->pluck('user_id');

        $usersName = User::all()->whereIn('id',$member);

        if ($workspace->user_id == $sessionId){
            $user = User::all();
            return view('workspaces.edit', compact('workspace','sessionId','user','usersName'));

        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Please input Workspace Name',
        ];

        $validator = Validator::make($request->all(), [
            'workspaceName' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $workspace = Workspace::find($id);
        $workspace->user_id = $request->user_id;
        $workspace->namaWorkspace = $request->workspaceName;
        $workspace->deskWorkspace = $request->workspaceDesc;
        $workspace->save();

        $new = $request->newName;

        if (!empty($new)) {
            $member = New Member;
            $member->workspace_id = $workspace->id;
            $member->user_id = $new;
            $member->level = '0';
            $member->save();
        }

        Alert::toast('Workspace Updated','success');

        return redirect()->route('workspaces.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sessionId = auth()->user()->id;

        $work = Workspace::find($id);

        if ($work->user_id == $sessionId){
            $work->delete();
        }
        else{
            return redirect()->route('workspaces.index');
        }

        Alert::toast('Workspace Deleted', 'success');

        return redirect()->route('workspaces.index');
    }

    public function getData(Request $request)
    {
        $sessionId = auth()->user()->id;

        // ELOQUENT
        $detail = Member::where('user_id','=',$sessionId)
        ->pluck('workspace_id');

        // ELOQUENT
        $workspace = Workspace::whereIn('id', $detail);

        if ($request->ajax()) {
            return datatables()->of($workspace)
                ->addIndexColumn()
                ->addColumn('actions', function ($workspace) {
                    // Query to get the level for the current workspace and user
                    $sessionId = auth()->user()->id;
                    $level = Member::where('workspace_id', '=', $workspace->id)->where('user_id','=',$sessionId);
                    return view('workspaces.actions', compact('workspace','level'));
                })
                ->toJson();
        }
    }

    // public function searchUser(Request $request){

    //     $q = $request->input('q');

    //     $users = User::where('email', 'like', '%'.$q.'%')->select('id', 'email')->get();

    //     return response()->json($users);
    // }
}
