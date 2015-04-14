<?php

class Student extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

    protected $fillable = [
        'people_id', 'student_number', 'univercity_id', 'major_id', 
        'degree_id', 'year', 'status', 'type', 'amount_of_grant', 
        'father_id', 'mother_id'
    ];
    
    protected $visible = [
        'people_id', 'student_number', 'univercity_id', 'major_id', 
        'degree_id', 'year', 'status', 'type', 'amount_of_grant', 
        'father_id', 'mother_id'
    ];
    
    protected $hidden = ['id'];
   
    public function people() {
        return $this->belongsTo('People', 'people_id');
    }
    
    public function major() {
        return $this->belongsTo('Major');
    }

}
