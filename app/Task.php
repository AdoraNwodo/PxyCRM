<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
        
    protected $fillable = [
        'task_subject', 'task_status', 'task_priority','task_start_and_end_date','task_project', 'task_assigned_to', 'task_description', 'task_last_modified_by',
    ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'task_subject', 
        'task_status', 
        'task_priority',
        'task_start_and_end_date',
        'task_project', 
        'task_assigned_to', 
        'task_description',
    );
    
    protected $revisionFormattedFieldNames = array(
        'task_subject' => 'Subject', 
        'task_status' => 'Status', 
        'task_priority' => 'Priority',
        'task_start_and_end_date' => 'Date Range',
        'task_project' => 'Project', 
        'task_assigned_to' => 'Assigned To', 
        'task_description' => 'Description'
    );
    
}
