<?php

class People extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'people';

    protected $fillable = ['first_name', 'last_name', 'address', 'village_id', 'date_of_birth'];
    
    public $timestamps = true;
    
    public function student() {
        return $this->hasOne('Student');   
    }
}
