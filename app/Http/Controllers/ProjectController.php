<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;
use App\Account;

class ProjectController extends Controller
{
    //
    public function index(){
        
        $projects = DB::table('projects')
            ->join('users', 'projects.project_manager', '=', 'users.id')
            ->select('projects.*', 'users.name')
            ->orderBy('projects.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.projects', ['projects' => $projects,  'title' => 'SEARCH PROJECTS']); 
    }
    
    public function userindex(){
        
        $projects = DB::table('projects')
            ->where('project_manager', Auth::user()->id)
            ->join('users', 'projects.project_manager', '=', 'users.id')
            ->select('projects.*', 'users.name')
            ->orderBy('projects.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.projects', ['projects' => $projects,  'title' => 'MY PROJECTS']); 
    }
    
    public function store(Request $request){
        
         $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Project::create($dataInput);
        return redirect('/project');
    }
    
    public function createindex(){
        $users = User::all();
        $accounts = Account::all();

        return view('create.create_project', ['users' => $users, 'accounts' => $accounts]);
    }
    
    public function showdetails($id){
        
        $project = DB::table('projects')
            ->where('projects.id', $id)
            ->join('users as modifier', 'projects.project_last_modified_by', '=', 'modifier.id')
            ->join('users as manager', 'projects.project_manager', '=', 'manager.id')
            ->select('projects.*', 'modifier.name as modifier_name', 'manager.name as manager_name')
            ->first();
        
        $tasks = DB::table('tasks')
            ->where('task_project', $id)
            ->join('users', 'tasks.task_assigned_to', '=', 'users.id')
            ->select('tasks.*', 'users.name')
            ->orderBy('tasks.id', 'desc')
            ->simplePaginate();
        
        if (empty($project)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_project' , ['project' => $project , 'tasks' => $tasks]);
        }
    }
    
    public function update(Request $request, $id){
        $project = Project::where('id',$id)->first();
        $project->update($request->all()); 
        
        return redirect('/project');
    }
    
    public function edit($id){
        $project = Project::where('id',$id)->first(); //first for one data, get for many data
        $company = Account::where('id',$project->project_account)->first(); 
        $manager = User::where('id',$project->project_manager)->first();
        $users = User::all();
        $accounts = Account::all();
        
        return view('edit.edit_project', ['project' => $project, 'company' => $company, 'accounts' => $accounts, 'users' => $users, 'manager' => $manager]);
    }
    
    public function audit($id){
        $history = Project::find($id);
        $logs = $history->revisionHistory;
        
        $projectdetail = DB::table('projects')
            ->where('projects.id', $id)
            ->join('accounts', 'projects.project_account', '=', 'accounts.id')
            ->select('accounts.account_name')
            ->first();
        
        $title = $history->project_name.' - '.$projectdetail->account_name;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
