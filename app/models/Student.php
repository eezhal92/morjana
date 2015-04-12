<?php

class Student extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

    protected $fillable = ['people_id', 'father_id', 'mother_id'];
    
    protected $visible = ['people_id', 'father_id', 'mother_id'];
    
    protected $hidden = ['id'];
    
    private $person; 
   
    public function person() {
        return $this->belongsTo('People', 'people_id');
    }
    
    /*public function getFirstNameAttribute() {
        return $this->person->first_name;
    }
    
    public function getLastNameAttribute() {
        return $this->person->last_name;
    }
    
    public function getAddressAttribute() {
        return $this->person->address;
    }
    
    public function getDateOfBirthAttribute() {
        return $this->person->date_of_birth;
    }*/ 

}
