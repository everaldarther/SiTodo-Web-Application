<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\personTask;
use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sessionId = auth()->user()->id;
        $workspace = Member::all()->whereIn('user_id',$sessionId);

        $idWorkspace = $workspace->pluck('workspace_id');
        $worktask = Task::all()->whereIn('workspace_id',$idWorkspace);

        $persontask = personTask::all()->where('user_id','=',$sessionId);

        return view('dashboards.index',[
            'workspace' => $workspace,
            'worktasks' => $worktask,
            'persontask' => $persontask,
        ]);
    }
}
