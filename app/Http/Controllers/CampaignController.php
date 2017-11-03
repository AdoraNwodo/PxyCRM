<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Campaign;
use App\User;
use App\Account;

class CampaignController extends Controller
{
    //
    
    public function index(){
         
         $campaigns = DB::table('campaigns')
             ->join('accounts', 'campaigns.campaign_account', '=', 'accounts.id')
             ->join('users', 'campaigns.campaign_assigned_to', '=', 'users.id')
             ->select('campaigns.*', 'users.name', 'accounts.account_name')
             ->orderBy('campaigns.id', 'desc')
             ->simplePaginate(10);
         
         return view('main.campaigns', ['campaigns' => $campaigns,  'title' => 'SEARCH CAMPAIGNS']);
     }
    
    public function userindex(){
         
         $campaigns = DB::table('campaigns')
             ->where('campaign_assigned_to', Auth::user()->id)
             ->join('accounts', 'campaigns.campaign_account', '=', 'accounts.id')
             ->join('users', 'campaigns.campaign_assigned_to', '=', 'users.id')
             ->select('campaigns.*', 'users.name', 'accounts.account_name')
             ->orderBy('campaigns.id', 'desc')
             ->simplePaginate(10);
         
         return view('main.campaigns', ['campaigns' => $campaigns,  'title' => 'MY CAMPAIGNS']);
     }
    
     public function store(Request $request){
        
         $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Campaign::create($dataInput);
        return redirect('/campaign');
    }
    
    public function createindex(){
        $users = User::all();
        $accounts = Account::all();

        return view('create.create_campaign', ['users' => $users, 'accounts' => $accounts]);
    }
    
    public function showdetails($id){
        
        $campaign = DB::table('campaigns')
            ->where('campaigns.id', $id)
            ->join('users as modifier', 'campaigns.campaign_last_modified_by', '=', 'modifier.id')
            ->join('users as assigned', 'campaigns.campaign_assigned_to', '=', 'assigned.id')
            ->join('accounts', 'campaigns.campaign_account', '=', 'accounts.id')
            ->select('campaigns.*', 'modifier.name as modifier_name', 'assigned.name as assigned_name', 'accounts.account_name')
            ->first();
        
        if (empty($campaign)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_campaign')->with('campaign', $campaign); 
        }
    }
    
    public function update(Request $request, $id){
        $campaign = Campaign::where('id',$id)->first();
        $campaign->update($request->all()); 
        
        return redirect('/campaign');
        //return view('edit.edit_account'); 
    }
    
    public function edit($id){
        $campaign = Campaign::where('id',$id)->first(); //first for one data, get for many data
        $company = Account::where('id',$campaign->campaign_account)->first(); 
        $usr_name = User::where('id',$campaign->campaign_assigned_to)->first();
        $users = User::all();
        $accounts = Account::all();
        
        return view('edit.edit_campaign', ['campaign' => $campaign, 'company' => $company, 'accounts' => $accounts, 'users' => $users, 'usr_name' => $usr_name]);
    }
    
    public function audit($id){
        $history = Campaign::find($id);
        $logs = $history->revisionHistory;
        $campaigndetail = DB::table('campaigns')
            ->where('campaigns.id', $id)
            ->join('accounts', 'campaigns.campaign_account', '=', 'accounts.id')
            ->select('accounts.account_name')
            ->first();
        
        $title = $history->campaign_name.' - '.$campaigndetail->account_name;
        
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
    
}
