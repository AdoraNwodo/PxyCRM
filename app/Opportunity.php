<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    
    protected $fillable=['opportunity_name', 'opportunity_company', 'opportunity_closing_date', 'opportunity_currency', 'opportunity_amount', 'opportunity_status', 'opportunity_sales_stage', 'opportunity_lead_source', 'opportunity_assigned_to', 'opportunity_description', 'opportunity_last_modified_by' ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'opportunity_name', 
        'opportunity_company',
        'opportunity_closing_date', 
        'opportunity_currency', 
        'opportunity_amount', 
        'opportunity_status', 
        'opportunity_sales_stage',
        'opportunity_lead_source', 
        'opportunity_assigned_to', 
        'opportunity_description'
    );
    
    protected $revisionFormattedFieldNames = array(
        'opportunity_name' => 'Opportunity Name',
        'opportunity_company' => 'Account',
        'opportunity_closing_date' => 'Expected Close Date',
        'opportunity_currency' => 'Currency',
        'opportunity_amount' => 'Amount',
        'opportunity_status' => 'Status',
        'opportunity_sales_stage' => 'Sales Stage',
        'opportunity_lead_source' => 'Lead Source',
        'opportunity_assigned_to' => 'Assigned To',
        'opportunity_description'=> 'Description'
    );


}
