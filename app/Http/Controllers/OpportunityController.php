<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Opportunity;
use App\User;
use App\Account;

class OpportunityController extends Controller
{
    //
   
    public function index(){
        
        $opportunities = DB::table('opportunities')
            ->join('accounts', 'opportunities.opportunity_company', '=', 'accounts.id')
            ->select('opportunities.*', 'accounts.account_name')
            ->orderBy('opportunities.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.opportunity', ['opportunities' => $opportunities,  'title' => 'SEARCH OPPORTUNITIES']);
    }
    
    public function userindex(){
        
        $opportunities = DB::table('opportunities')
            ->where('opportunity_assigned_to', Auth::user()->id)
            ->join('accounts', 'opportunities.opportunity_company', '=', 'accounts.id')
            ->select('opportunities.*', 'accounts.account_name')
            ->orderBy('opportunities.id', 'desc')
            ->simplePaginate(10);
        
        return view('main.opportunity', ['opportunities' => $opportunities,  'title' => 'MY OPPORTUNITIES']);
    }
    
    public function store(Request $request){
        
         $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Opportunity::create($dataInput);
        return redirect('/opportunity');
    }
    
    public function createindex(){
        $users = User::all();
        $accounts = Account::all();

        return view('create.create_opportunity', ['users' => $users, 'accounts' => $accounts]);
    }
    
    public function showdetails($id){
        
        $opportunity = DB::table('opportunities')
            ->where('opportunities.id', $id)
            ->join('users as modifier', 'opportunities.opportunity_last_modified_by', '=', 'modifier.id')
            ->join('users as assigned', 'opportunities.opportunity_assigned_to', '=', 'assigned.id')
            ->join('accounts', 'opportunities.opportunity_company', '=', 'accounts.id')
            ->select('opportunities.*', 'modifier.name as modifier_name', 'assigned.name as assigned_name', 'accounts.account_name')
            ->first();
        
        if (empty($opportunity)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_opportunity')->with('opportunity', $opportunity); 
        }
    }
    
    public function update(Request $request, $id){
        $opportunity = Opportunity::where('id',$id)->first();
        $opportunity->update($request->all()); 
        
        return redirect('/opportunity');
        //return view('edit.edit_account'); 
    }
    
    public function edit($id){
        $opportunity = Opportunity::where('id',$id)->first(); //first for one data, get for many data
        $company = Account::where('id',$opportunity->opportunity_company)->first(); 
        $usr_name = User::where('id',$opportunity->opportunity_assigned_to)->first();
        $users = User::all();
        $accounts = Account::all();
        
        return view('edit.edit_opportunity', ['opportunity' => $opportunity, 'company' => $company, 'accounts' => $accounts, 'users' => $users, 'usr_name' => $usr_name]);
        
    }
    
    public function audit($id){
        $history = Opportunity::find($id);
        $logs = $history->revisionHistory;
        $contactdetail = DB::table('opportunities')
            ->where('opportunities.id', $id)
            ->join('accounts', 'opportunities.opportunity_company', '=', 'accounts.id')
            ->select('accounts.account_name')
            ->first();
        
        $title = $history->opportunity_name.' - '.$contactdetail->account_name;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
