<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/', 'HomeController@index');

    Route::get('/admin', 'HomeController@index');
    
    Route::get('/password/new', 'PasswordController@index');
    Route::post('/password/new', 'PasswordController@home');
    
    Route::get('/account', 'AccountController@index');
    Route::get('/account/create', function(){return view('create.create_account');});
    Route::get('/account/view/{account}', 'AccountController@showdetails');
    Route::get('/account/edit/{account}', 'AccountController@edit');
    Route::put('/account/edit/{account}', 'AccountController@update');
    Route::get('/account/audit/{account}', 'AccountController@audit');
    Route::post('/account', 'AccountController@store'); // route to store accounts to db


    Route::get('/contact/create', 'ContactsController@createindex');
    Route::get('/contact', 'ContactsController@index');    
    Route::get('/contact/user', 'ContactsController@userindex');
    Route::get('/contact/view/{contact}', 'ContactsController@showdetails');
    Route::get('/contact/edit/{contact}', 'ContactsController@edit');
    Route::put('/contact/edit/{contact}', 'ContactsController@update');
    Route::get('/contact/audit/{contact}', 'ContactsController@audit');
    Route::post('/contact', 'ContactsController@store'); // route to store contacts to db


    Route::get('/opportunity/create', 'OpportunityController@createindex');
    Route::get('/opportunity', 'OpportunityController@index');
    Route::get('/opportunity/user', 'OpportunityController@userindex');
    Route::get('/opportunity/view/{opportunity}', 'OpportunityController@showdetails');
    Route::post('/opportunity', 'OpportunityController@store'); // route to store opportunities to db
    Route::get('/opportunity/edit/{opportunity}', 'OpportunityController@edit');
    Route::get('/opportunity/audit/{opportunity}', 'OpportunityController@audit');
    Route::put('/opportunity/edit/{opportunity}', 'OpportunityController@update');


    Route::get('/lead/create', 'LeadController@createindex');
    Route::get('/lead', 'LeadController@index');
    Route::get('/lead/user', 'LeadController@userindex');
    Route::get('/lead/view/{lead}', 'LeadController@showdetails');
    Route::get('/lead/edit/{lead}', 'LeadController@edit');
    Route::get('/lead/audit/{lead}', 'LeadController@audit');
    Route::put('/lead/edit/{lead}', 'LeadController@update');
    Route::post('/lead/convert/{lead}', 'LeadController@convert');
    Route::post('/lead', 'LeadController@store'); // route to store leads to db


    Route::get('/call/create', 'CallController@createindex');
    Route::get('/call', 'CallController@index');
    Route::get('/call/user', 'CallController@userindex');
    Route::get('/call/view/{call}', 'CallController@showdetails');
    Route::get('/call/edit/{call}', 'CallController@edit');
    Route::put('/call/edit/{call}', 'CallController@update');
    Route::get('/call/audit/{call}', 'CallController@audit');
    Route::post('/call', 'CallController@store'); // route to store calls to db


    Route::post('/task/create', 'TaskController@createindex');
    Route::get('/task/create', 'TaskController@goback');
    Route::get('/task', 'TaskController@index');
    Route::get('/task/user', 'TaskController@userindex');
    Route::post('/task', 'TaskController@store'); // route to store project tasks to db
    Route::get('/task/view/{task}', 'TaskController@showdetails');
    Route::get('/task/edit/{task}', 'TaskController@edit');
    Route::get('/task/audit/{project}', 'TaskController@audit');
    Route::put('/task/edit/{task}', 'TaskController@update');


    Route::get('/project/create', 'ProjectController@createindex');
    Route::get('/project/user', 'ProjectController@userindex');
    Route::get('/project', 'ProjectController@index');    
    Route::post('/project', 'ProjectController@store'); // route to store contacts to db
    Route::get('/project/view/{project}', 'ProjectController@showdetails');
    Route::get('/project/edit/{project}', 'ProjectController@edit');
    Route::get('/project/audit/{project}', 'ProjectController@audit');
    Route::put('/project/edit/{project}', 'ProjectController@update');


    Route::get('/campaign/create', 'CampaignController@createindex');
    Route::get('/campaign', 'CampaignController@index');
    Route::get('/campaign/user', 'CampaignController@userindex');
    Route::post('/campaign', 'CampaignController@store'); // route to store campaigns to db
    Route::get('/campaign/view/{campaign}', 'CampaignController@showdetails');
    Route::get('/campaign/audit/{campaign}', 'CampaignController@audit');
    Route::get('/campaign/edit/{campaign}', 'CampaignController@edit');
    Route::put('/campaign/edit/{campaign}', 'CampaignController@update');
    
    
    Route::get('/case/create', 'CasesController@createindex');
    Route::get('/case', 'CasesController@index');
    Route::get('/case/user', 'CasesController@userindex');
    Route::post('/case', 'CasesController@store'); // route to store campaigns to db
    Route::get('/case/view/{campaign}', 'CasesController@showdetails');
    Route::get('/case/audit/{campaign}', 'CasesController@audit');
    Route::get('/case/edit/{campaign}', 'CasesController@edit');
    Route::put('/case/edit/{campaign}', 'CasesController@update');


    Route::get('/meeting/create', 'MeetingController@createindex');
    Route::get('/meeting', 'MeetingController@index');
    Route::get('/meeting/user', 'MeetingController@userindex');
    Route::get('/meeting/view/{meeting}', 'MeetingController@showdetails');
    Route::get('/meeting/audit/{meeting}', 'MeetingController@audit');
    Route::get('/meeting/edit', function(){
       return view('edit.edit_meeting'); 
    });
    Route::post('/meeting', 'MeetingController@store'); // route to store calls to db

});


Auth::routes();

Route::get('/home', 'HomeController@index');


