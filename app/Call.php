<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
     use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    
    protected $fillable=['call_subject','call_status','call_time', 'call_date','call_assigned_to','call_description','call_last_modified_by','call_to', ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'call_subject',
        'call_status',
        'call_time', 
        'call_date',
        'call_assigned_to',
        'call_description',
        'call_to'
    );
    
    protected $revisionFormattedFieldNames = array(
        'call_subject' => 'Subject', 
        'call_status' => 'Status', 
        'call_time' => 'Time', 
        'call_date' => 'Date', 
        'call_assigned_to' => 'Assigned To', 
        'call_description' => 'Description', 
        'call_to' => 'Contact'
    );
}
