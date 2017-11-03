<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    
    protected $fillable=['project_name', 'project_status', 'project_date_range', 'project_manager', 'project_description', 'project_last_modified_by', 'project_account' ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'project_name', 
        'project_status',
        'project_date_range', 
        'project_manager', 
        'project_description', 
        'project_account'
    );
    
    protected $revisionFormattedFieldNames = array(
        'project_name' => 'Project Name', 
        'project_status' => 'Project Status',
        'project_date_range'  => 'Start and End Date', 
        'project_manager'  => 'Project Manager', 
        'project_description'  => 'Project Description', 
        'project_account'  => 'Account'
    );

}
