<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
     use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    
    protected $fillable = ['meeting_subject', 'meeting_status', 'meeting_date', 'meeting_time', 'meeting_duration', 'meeting_location', 'meeting_assigned_to', 'meeting_description', 'meeting_last_modified_by'];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'meeting_subject', 
        'meeting_status', 
        'meeting_date', 
        'meeting_time', 
        'meeting_duration', 
        'meeting_location', 
        'meeting_assigned_to', 
        'meeting_description'
    );
    
    protected $revisionFormattedFieldNames = array(
        'meeting_subject'  => 'Subject', 
        'meeting_status' => 'Status', 
        'meeting_date' => 'Date', 
        'meeting_time' => 'Time', 
        'meeting_duration' => 'Duration', 
        'meeting_location' => 'Location', 
        'meeting_assigned_to' => 'Assigned To', 
        'meeting_description' => 'Description'
    );
    
}
