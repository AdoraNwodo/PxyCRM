<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    

    protected $fillable=['contact_title','contact_first_name','contact_last_name','contact_mobile','contact_email','contact_company','contact_department','contact_role','contact_status','contact_last_modified_by', 'contact_assigned_to'];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'contact_title', 
        'contact_first_name',
        'contact_last_name',
        'contact_mobile',
        'contact_email',
        'contact_company',
        'contact_department',
        'contact_role',
        'contact_status',
        'contact_assigned_to'
    );
    
    protected $revisionFormattedFieldNames = array(
        'contact_title' => 'Title',
        'contact_first_name' => 'First Name',
        'contact_last_name' => 'Last Name',
        'contact_mobile' => 'Mobile',
        'contact_email' => 'Email',
        'contact_company' => 'Account',
        'contact_department' => 'Department',
        'contact_role' => 'Role',
        'contact_status' => 'Working Status',
        'contact_assigned_to'=> 'Assigned To'
    );
}
