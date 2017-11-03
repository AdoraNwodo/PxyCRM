<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use App\Project;

class TaskController extends Controller
{
    //
    public function index(){
        
        $tasks = DB::table('tasks')
            ->join('projects', 'tasks.task_project', '=', 'projects.id')
            ->join('users', 'tasks.task_assigned_to', '=', 'users.id')
            ->select('tasks.*', 'projects.project_name', 'users.name')
            ->orderBy('tasks.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.task', ['tasks' => $tasks,  'title' => 'SEARCH TASKS']); 
    }
    
     public function userindex(){
        
        $tasks = DB::table('tasks')
            ->where('task_assigned_to', Auth::user()->id)
            ->join('projects', 'tasks.task_project', '=', 'projects.id')
            ->join('users', 'tasks.task_assigned_to', '=', 'users.id')
            ->select('tasks.*', 'projects.project_name', 'users.name')
            ->orderBy('tasks.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.task', ['tasks' => $tasks,  'title' => 'MY TASKS']); 
    }
    
    public function showdetails($id){
        $task = DB::table('tasks')
            ->where('tasks.id', $id)
            ->join('users as modifier', 'tasks.task_last_modified_by', '=', 'modifier.id')
            ->join('users as manager', 'tasks.task_assigned_to', '=', 'manager.id')
            ->join('projects', 'tasks.task_project', '=', 'projects.id')
            ->select('tasks.*', 'modifier.name as modifier_name', 'manager.name as manager_name', 'projects.project_name')
            ->first();
        
        if (empty($task)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_task' , ['task' => $task ]);
        }
    }
    
    public function store(Request $request){
        
         $dataInput = $request->all();
         //access db through model
        
         $dbid = Task::create($dataInput); //$dbid = Task::create($dataInput);
        
         return redirect('/task');
    }
    
    public function goback(){
        return redirect()->back();
    }
    
    public function createindex(Request $request){
        $users = User::all();

        $id =$request->input('project_id');
        $daterange =$request->input('project_date');
        //project id, start date, end date
        $mindate = substr($daterange, 0, strpos($daterange, " - "));
        $maxdate = substr($daterange, strpos($daterange, " - ") + 2, strlen($daterange));
        
        $mindatearray = explode("/",$mindate);
        $minmonth = $mindatearray[0];
        $minday = $mindatearray[1];
        $minyear = $mindatearray[2];
        
        $maxdatearray = explode("/",$maxdate);
        $maxmonth = $maxdatearray[0];
        $maxday = $maxdatearray[1];
        $maxyear = $maxdatearray[2];
        

        return view('create.create_task', ['users' => $users, 'id' => $id, 'minmonth' => $minmonth, 'minday' => $minday, 'minyear' => $minyear, 'maxmonth' => $maxmonth, 'maxday' => $maxday, 'maxyear' => $maxyear]);
    }
    
    public function update(Request $request, $id){
        $task = Task::where('id',$id)->first();
        $task->update($request->all()); 
        
        return redirect('/task');
        //return view('edit.edit_account'); 
    }
    
    public function edit($id){
        $task = Task::where('id',$id)->first(); //first for one data, get for many data
        $project = Project::where('id',$task->task_project)->first(); 
        $usr_name = User::where('id',$task->task_assigned_to)->first();
        $users = User::all();
        $projects = Project::all();
        
        return view('edit.edit_task', ['task' => $task, 'project' => $project, 'users' => $users, 'usr_name' => $usr_name, 'projects' => $projects]);
    }
    
    public function audit($id){
        $history = Task::find($id);
        $logs = $history->revisionHistory;
        
        $taskdetail = DB::table('tasks')
            ->where('tasks.id', $id)
            ->join('accounts', 'tasks.task_project', '=', 'accounts.id')
            ->select('accounts.account_name')
            ->first();
        
        $title = $history->task_subject.' - '.$taskdetail->account_name;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
