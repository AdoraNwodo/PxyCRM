<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Case;

class CasesController extends Controller
{
    //
    
    public function createindex(){
        $users = User::all();
        $accounts = Account::all();

        return view('create.create_case', ['users' => $users, 'accounts' => $accounts]);
    }
    
    public function store(Request $request){
        
         $dataInput = $request->all();
        //$name =$request->input('name');
        
        //access db through model
        Case::create($dataInput);
        return redirect('/case');
    }
}
