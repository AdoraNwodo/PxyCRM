<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    
    protected $fillable=['lead_title', 'lead_first_name', 'lead_last_name', 'lead_mobile', 'lead_email', 'lead_company', 'lead_department', 'lead_role', 'lead_status', 'lead_source', 'lead_status_description', 'lead_source_description', 'lead_assigned_to', 'lead_last_modified_by' ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'lead_title', 
        'lead_first_name', 
        'lead_last_name', 
        'lead_mobile', 
        'lead_email', 
        'lead_company',
        'lead_department', 
        'lead_role', 
        'lead_status', 
        'lead_source', 
        'lead_status_description',
        'lead_source_description', 
        'lead_assigned_to'
    );
    
    protected $revisionFormattedFieldNames = array(
        'lead_title' => 'Title',
        'lead_first_name' => 'First Name',
        'lead_last_name' => 'Last Name',
        'lead_mobile' => 'Mobile',
        'lead_email' => 'Email',
        'lead_company' => 'Account',
        'lead_department' => 'Department',
        'lead_role' => 'Role',
        'lead_status' => 'Lead Status',
        'lead_source' => 'Lead Source',
        'lead_status_description' => 'Lead Status Description',
        'lead_source_description' => 'Lead Source Description',
        'lead_assigned_to'=> 'Assigned To'
    );
}
