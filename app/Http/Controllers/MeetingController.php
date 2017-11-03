<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Meeting;
use App\User;
use App\MeetingInvitee;

class MeetingController extends Controller
{
    //
    
    public function index(){
        
        $meetings = DB::table('meetings')
            ->select('meetings.*')
            ->orderBy('meetings.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.meetings', ['meetings' => $meetings, 'title' => 'SEARCH MEETINGS']); 
    }
    
    public function userindex(){
        
        $meetings = DB::table('meeting_invitees')
            ->where('invitee_id', Auth::user()->id)
            ->join('meetings', 'meeting_invitees.meeting_id', '=', 'meetings.id')
            ->select('meeting_invitees.*', 'meetings.*')
            ->orderBy('meetings.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.meetings', ['meetings' => $meetings,  'title' => 'MY MEETINGS']); 
    }
    
    public function store(Request $request){
        
         $dataInput = $request->all();

        //$invitees = $request->input('meeting_invitees');
        $invitees = $request->meeting_invitees;
        
        //access db through model
        $lastrowinserted = Meeting::create($dataInput);
        
        $therowid = $lastrowinserted->id;
        
        foreach($invitees as $invitee){
          $insertArray = array('meeting_id' => $therowid, 'invitee_id' => $invitee);  
          MeetingInvitee::create($insertArray);
        }
     


        return redirect('/meeting');

    }
    
    public function createindex(){
        $users = User::all();

        return view('create.create_meeting', ['users' => $users]);
    }
    

    public function showdetails($id){
        
        $meeting = DB::table('meetings')
            ->where('meetings.id', $id)
            ->join('users as modifier', 'meetings.meeting_last_modified_by', '=', 'modifier.id')
            ->join('users as assigned', 'meetings.meeting_assigned_to', '=', 'assigned.id')
            ->select('meetings.*', 'modifier.name as modifier_name', 'assigned.name as assigned_name')
            ->first();
        
        $invitees = DB::table('meeting_invitees')
            ->where('meeting_id', $id)
            ->join('users', 'meeting_invitees.invitee_id', '=', 'users.id')
            ->select('users.name')
            ->get();
        
        if (empty($meeting)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_meeting' , ['meeting' => $meeting , 'invitees' => $invitees]);
        }
    }
    
    public function audit($id){
        $history = Meeting::find($id);
        $logs = $history->revisionHistory;
        $title = $history->meeting_subject.' '.$history->meeting_date;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
