<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
     use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    
    protected $fillable = ['campaign_name', 'campaign_assigned_to', 'campaign_status', 'campaign_type', 'campaign_description', 'campaign_budget', 'campaign_actual_cost', 'campaign_expected_revenue', 'campaign_expected_cost', 'campaign_currency', 'campaign_impressions', 'campaign_objective', 'campaign_last_modified_by', 'campaign_account' ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'campaign_name', 
        'campaign_assigned_to', 
        'campaign_status', 
        'campaign_type', 
        'campaign_description', 
        'campaign_budget', 
        'campaign_actual_cost', 
        'campaign_expected_revenue',
        'campaign_expected_cost', 
        'campaign_currency', 
        'campaign_impressions', 
        'campaign_objective',
        'campaign_account'
    );
    
    protected $revisionFormattedFieldNames = array(
        'campaign_name' => 'Campaign Name', 
        'campaign_assigned_to' => 'Assigned To', 
        'campaign_status' => 'Campaign Status', 
        'campaign_type' => 'Campaign Type', 
        'campaign_description' => 'Campaign Description', 
        'campaign_budget' => 'Campaign Budget', 
        'campaign_actual_cost' => 'Actual Cost', 
        'campaign_expected_revenue' => 'Expected Revenue',
        'campaign_expected_cost' => 'Expected Cost', 
        'campaign_currency' => 'Currency', 
        'campaign_impressions' => 'Impressions', 
        'campaign_objective' => 'Objective',
        'campaign_account' => 'Account'
    );
    
}
