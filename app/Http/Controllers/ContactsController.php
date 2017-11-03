<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Contact;
use App\User;
use App\Account;

class ContactsController extends Controller
{
    //
    public function index(){
        //return Contact::all();
        $contacts = DB::table('contacts')
            ->join('accounts', 'contacts.contact_company', '=', 'accounts.id')
            ->select('contacts.*', 'accounts.account_name')
            ->orderBy('contacts.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.contact', ['contacts' => $contacts,  'title' => 'SEARCH CONTACTS']); 
    }
    
    
    public function userindex(){
        //return Contact::all();
        $contacts = DB::table('contacts')
            ->where('contact_assigned_to', Auth::user()->id)
            ->join('accounts', 'contacts.contact_company', '=', 'accounts.id')
            ->select('contacts.*', 'accounts.account_name')
            ->orderBy('contacts.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.contact', ['contacts' => $contacts,  'title' => 'MY CONTACTS']); 
    }
    
    
    public function store(Request $request){
        
         $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Contact::create($dataInput);
        return redirect('/contact');
    }
    
    
    public function createindex(){
        $users = User::all();
        $accounts = Account::all();

        return view('create.create_contact', ['users' => $users, 'accounts' => $accounts]);
    }
    
    public function showdetails($id){
        
        $contact = DB::table('contacts')
            ->where('contacts.id', $id)
            ->join('users as modifier', 'contacts.contact_last_modified_by', '=', 'modifier.id')
            ->join('users as assigned', 'contacts.contact_assigned_to', '=', 'assigned.id')
            ->join('accounts', 'contacts.contact_company', '=', 'accounts.id')
            ->select('contacts.*', 'modifier.name as modifier_name', 'assigned.name as assigned_name', 'accounts.account_name')
            ->first();
        
        if (empty($contact)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_contact')->with('contact', $contact); 
        }
    }
    
     public function update(Request $request, $id){
        $contact = Contact::where('id',$id)->first();
        $contact->update($request->all()); 
        
        return redirect('/contact');
        //return view('edit.edit_account'); 
    }
    
    public function edit($id){
        $contact = Contact::where('id',$id)->first(); //first for one data, get for many data
        $acc_name = Account::where('id',$contact->contact_company)->first(); 
        $usr_name = User::where('id',$contact->contact_assigned_to)->first(); 
        $users = User::all();
        $accounts = Account::all();
        
        return view('edit.edit_contact', ['users' => $users, 'accounts' => $accounts, 'contact' => $contact, 'acc_name' => $acc_name, 'usr_name' => $usr_name]);
        
    }
    
    public function audit($id){
        $history = Contact::find($id);
        $logs = $history->revisionHistory;
        $contactdetail = DB::table('contacts')
            ->where('contacts.id', $id)
            ->join('accounts', 'contacts.contact_company', '=', 'accounts.id')
            ->select('accounts.account_name')
            ->first();
        $title = $history->contact_first_name.' '.$history->contact_last_name.' : '.$contactdetail->account_name;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
