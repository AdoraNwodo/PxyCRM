<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot()
    {
        parent::boot();
    }
    //define the fillable fields
    protected $fillable=['account_name', 'account_industry', 'account_phone', 'account_email', 'account_address_street', 'account_address_city', 'account_address_state', 'account_address_country','account_last_modified_by', ];
    
    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    
    protected $keepRevisionOf = array(
        'account_name', 
        'account_industry', 
        'account_phone', 
        'account_email',
        'account_address_street', 
        'account_address_city', 
        'account_address_state', 
        'account_address_country'
    );
    
    protected $revisionFormattedFieldNames = array(
        'account_name' => 'Account Name',
        'account_industry' => 'Industry',
        'account_phone' => 'Phone',
        'account_email' => 'Email',
        'account_address_street' => 'Address (Street)',
        'account_address_city' => 'Address (City)',
        'account_address_state' => 'Address (State)',
        'account_address_country' => 'Country'
    );

}
