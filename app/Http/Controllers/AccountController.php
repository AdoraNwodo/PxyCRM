<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    //
    
    public function store(Request $request){
        
        //store form data to db
        $dataInput = $request->all();
        Account::create($dataInput);
        return redirect('/account');
    }
    
    public function index(){
    
        //get data from db and send data to homepage view
        $accounts = DB::table('accounts')->select('accounts.*')->orderBy('accounts.id', 'desc')->simplePaginate(10);
        return view('main.account', ['accounts' => $accounts]);
    }
    
    public function showdetails($id){
        
        //show the details of a databsae record.
        $account = DB::table('accounts')
            ->where('accounts.id', $id)
            ->join('users', 'accounts.account_last_modified_by', '=', 'users.id')
            ->select('accounts.*', 'users.name')
            ->first();
        
        if (empty($account)) {
            // list is empty.
            return redirect()->back();
        }else{
            return view('singleview.view_account')->with('accounts', $account); 
        }
        
    }
    
    public function update(Request $request, $id){
        //update data relating to an Account with a particular id
        $account = Account::where('id',$id)->first();
        $account->update($request->all()); 
        
        return redirect('/account');
    }
    
    public function edit($id){
        //renders the edit form
        $account = Account::where('id',$id)->first(); //first for one data, get for many data
        return view('edit.edit_account')->with('account', $account);
    }
    
    public function audit($id){
        //shows database change change history 
        $history = Account::find($id);
        $logs = $history->revisionHistory;
        $title = $history->account_name;
        
        //return $history;
        return view('audit.changelog', ['title' => $title, 'logs' => $logs]);
    }
}
