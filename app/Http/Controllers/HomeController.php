<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Call;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$calls = Call::where('id', Auth::user()->id )->first();
        $calls = DB::table('calls')->where('call_assigned_to', Auth::user()->id)->join('contacts', 'calls.call_to', '=', 'contacts.id')->select('calls.*', 'contacts.contact_first_name', 'contacts.contact_last_name')->orderBy('calls.id', 'desc')->simplePaginate(5);
        
        $meetings = DB::table('meeting_invitees')->where('invitee_id', Auth::user()->id)->join('meetings', 'meeting_invitees.meeting_id', '=', 'meetings.id')->select('meeting_invitees.*', 'meetings.*')->orderBy('meetings.id', 'desc')->simplePaginate(5);
        
        $opportunities = DB::table('opportunities')->where('opportunity_assigned_to', Auth::user()->id)->join('accounts', 'opportunities.opportunity_company','=','accounts.id')->select('opportunities.opportunity_name', 'opportunities.opportunity_amount', 'opportunities.opportunity_closing_date', 'accounts.account_name')->orderBy('opportunities.id', 'desc')->simplePaginate(5);
        
        $leads = DB::table('leads')->where('lead_assigned_to', Auth::user()->id)->simplePaginate(5);
        
        $history = DB::table('revisions')->where('key', 'created_at')
            ->join('users', 'revisions.user_id', '=', 'users.id')
            ->select('users.name', 'revisions.revisionable_type', 'revisions.revisionable_id')
            ->orderBy('revisions.id', 'desc')
            ->simplePaginate(5);
    
        return view('dashboard', ['calls' => $calls , 'meetings' => $meetings, 'opportunities' => $opportunities, 'leads' => $leads, 'history' => $history]);
    }
}
