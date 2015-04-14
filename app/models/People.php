<?php

class People extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'people';

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'address', 'village_id', 'date_of_birth'
    ];
    
    public $timestamps = true;
    
    public function student() {
        return $this->hasOne('Student');   
    }
    
    public function village() {
        return $this->belongsTo('Village'); 
    }
    
    public function getIsStudentAttribute() {
        return ($this->student()->count() >= 1) ? true : false;
    }
    
    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
}
