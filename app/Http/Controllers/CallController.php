<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Call;
use App\User;
use App\Contact;


class CallController extends Controller
{
    //
    
    public function store(Request $request){
        
         $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Call::create($dataInput);
        return redirect('/call');
    }
    
    public function index()
    {
        $calls = DB::table('calls')
            ->join('contacts', 'calls.call_to', '=', 'contacts.id')
            ->select('calls.*', 'contacts.contact_first_name', 'contacts.contact_last_name')
            ->orderBy('contacts.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.calls', ['calls' => $calls,  'title' => 'SEARCH CALLS']);
    }
    
    public function userindex()
    {
        $calls = DB::table('calls')
            ->where('call_assigned_to', Auth::user()->id)
            ->join('contacts', 'calls.call_to', '=', 'contacts.id')
            ->select('calls.*', 'contacts.contact_first_name', 'contacts.contact_last_name')
            ->orderBy('contacts.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.calls', ['calls' => $calls,  'title' => 'MY CALLS']);
    }
    
    public function createindex(){
        $users = User::all();
        $contacts = Contact::all();

        return view('create.create_call', ['users' => $users, 'contacts' => $contacts]);
    }
    
    public function showdetails($id){
        
        $call = DB::table('calls')
            ->where('calls.id', $id)
            ->join('users as modifier', 'calls.call_last_modified_by', '=', 'modifier.id')
            ->join('users as assigned', 'calls.call_assigned_to', '=', 'assigned.id')
            ->join('contacts', 'calls.call_to', '=', 'contacts.id')
            ->join('accounts', 'contacts.contact_company', '=', 'accounts.id')
            ->select('calls.*', 'contacts.*', 'modifier.name as modifier_name', 'assigned.name as assigned_name', 'accounts.account_name')
            ->first();
        
        if (empty($call)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_call')->with('call', $call); 
        }
    }
    
    public function update(Request $request, $id){
        $call = Call::where('id',$id)->first();
        $call->update($request->all()); 
        
        return redirect('/call');
    }
    
    public function edit($id){
        $call = Call::where('id',$id)->first(); //first for one data, get for many data
        $contact = Contact::where('id',$call->call_to)->first(); 
        $usr_name = User::where('id',$call->call_assigned_to)->first();
        $users = User::all();
        $contacts = Contact::all();
        
        return view('edit.edit_call', ['call' => $call, 'contact' => $contact, 'contacts' => $contacts, 'users' => $users, 'usr_name' => $usr_name]);
    }
    
    public function audit($id){
        $history = Call::find($id);
        $logs = $history->revisionHistory;
        $title = $history->call_subject.' '.$history->call_date;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
