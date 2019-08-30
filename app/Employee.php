<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employees';
    
    /**
     * Indicates primary key of the table
     *
     * @var bool
     */
    public $primaryKey = 'id';
    
    /**
     * Indicates if the model should be timestamped
     * 
     * default value is 'true'
     * 
     * If set 'true' then created_at and updated_at columns 
     * will be automatically managed by Eloquent
     * 
     * If created_at and updated_at columns are not in your table
     * then set the value to 'false'
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_id'
    ];
    /**
     * The attributes that aren't mass assignable
     *
     * @var array
     */
    public function companies()
    {
    	return $this->belongsTo(Company::class,'company_id');
    }
    protected $guarded = array();
}
