<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Lead;
use App\Contact;
use App\Account;
use App\User;

class LeadController extends Controller
{
    //
    public function index(){
        
        $leads = DB::table('leads')
            ->join('accounts', 'leads.lead_company', '=', 'accounts.id')
            ->join('users', 'leads.lead_assigned_to', '=', 'users.id')
            ->select('leads.*', 'users.name', 'accounts.account_name')
            ->orderBy('leads.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.leads', ['leads' => $leads, 'title' => 'SEARCH LEADS']);
    }
    
    public function userindex(){
        
        $leads = DB::table('leads')
            ->where('lead_assigned_to', Auth::user()->id)
            ->join('accounts', 'leads.lead_company', '=', 'accounts.id')
            ->join('users', 'leads.lead_assigned_to', '=', 'users.id')
            ->select('leads.*', 'users.name', 'accounts.account_name')
            ->orderBy('leads.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.leads', ['leads' => $leads, 'title' => 'MY LEADS']);
    }
    
    public function store(Request $request){
        
        $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Lead::create($dataInput);
        return redirect('/lead');
    }
    
    public function createindex(){
        $users = User::all();
        $accounts = Account::all();

        return view('create.create_lead', ['users' => $users, 'accounts' => $accounts]);
    }
    
    public function showdetails($id){
        
        $lead = DB::table('leads')
            ->where('leads.id', $id)
            ->join('users as modifier', 'leads.lead_last_modified_by', '=', 'modifier.id')
            ->join('users as assigned', 'leads.lead_assigned_to', '=', 'assigned.id')
            ->join('accounts', 'leads.lead_company', '=', 'accounts.id')
            ->select('leads.*', 'modifier.name as modifier_name', 'assigned.name as assigned_name', 'accounts.account_name')
            ->first();
        
        if (empty($lead)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_lead')->with('lead', $lead); 
        }
    }
    
    public function update(Request $request, $id){
        $lead = Lead::where('id',$id)->first();
        $lead->update($request->all()); 
        
        return redirect('/lead');
        //return view('edit.edit_account'); 
    }
    
    public function edit($id){
        $lead = Lead::where('id',$id)->first(); //first for one data, get for many data
        $company = Account::where('id',$lead->lead_company)->first(); 
        $usr_name = User::where('id',$lead->lead_assigned_to)->first();
        $users = User::all();
        $accounts = Account::all();
        
        return view('edit.edit_lead', ['lead' => $lead, 'company' => $company, 'accounts' => $accounts, 'users' => $users, 'usr_name' => $usr_name]);
    }
    
    public function convert($id){
        $lead = Lead::find($id);
        $lead->lead_status = 'Converted';

        $lead->save();
        
        $contact = new Contact;

        $contact->contact_title = $lead->lead_title;
        $contact->contact_first_name = $lead->lead_first_name;
        $contact->contact_last_name = $lead->lead_last_name;
        $contact->contact_mobile = $lead->lead_mobile;
        $contact->contact_email = $lead->lead_email;
        $contact->contact_company = $lead->lead_company;
        $contact->contact_department = $lead->lead_department;
        $contact->contact_role = $lead->lead_role;
        $contact->contact_status = 'Working';
        $contact->contact_last_modified_by = Auth::user()->id;
        $contact->contact_assigned_to = $lead->lead_assigned_to;
        
        $contact->save();
        
        $contacts = DB::table('contacts')
            ->where('contact_assigned_to', Auth::user()->id)
            ->join('accounts', 'contacts.contact_company', '=', 'accounts.id')
            ->select('contacts.*', 'accounts.account_name')
            ->orderBy('contacts.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.contact', ['contacts' => $contacts]); 

    }
    
    public function audit($id){
        $history = Lead::find($id);
        $logs = $history->revisionHistory;
        $leaddetail = DB::table('leads')
            ->where('leads.id', $id)
            ->join('accounts', 'leads.lead_company', '=', 'accounts.id')
            ->select('accounts.account_name')
            ->first();
        $title = $history->lead_first_name.' '.$history->lead_last_name.' : '.$leaddetail->account_name;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
        
}
