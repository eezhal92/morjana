<?php

use \Illuminate\Database\Eloquent\Collection;

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
    
    public static $rules = [
        'student_number' => 'required|min:3',
        'first_name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'gender' => 'required',
        'address' => 'required|min:3',
        'sub_district_id' => 'required',
        'village_id' => 'required|numeric',

        'father_first_name' => 'required|min:2',
        'father_last_name' => 'required|min:2',
        'father_address' => 'required|min:3',
        'mother_first_name' => 'required|min:2',
        'mother_last_name' => 'required|min:2',
        'mother_address' => 'required|min:3',

        'major' => 'required',
        'faculty' => 'required',
        'univercity' => 'required',
        'univercity_type' => 'required',
        'univercity_province_id' => 'required|numeric',
        'univercity_city_id' => 'required|numeric',

        'degree_id' => 'required|numeric',
        'year' => 'required|min:4|max:4',
        'type' => 'required',
        'amount_of_grant' => 'required',
    ];
   
    public function people() {
        return $this->belongsTo('People', 'people_id');
    }
    
    public function major() {
        return $this->belongsTo('Major');
    }
    
    public function univercity() {
        return $this->belongsTo('Univercity', 'univercity_id');
    }
    
    public function parents() {
        $father = $this->father();
        $mother = $this->mother();
        
        $parents = new Collection;
        $parents->add($father);
        $parents->add($mother);
        
        return $parents;
    }
    
    public function father() {
        return $this->belongsTo('People', 'father_id');
    }
    
    public function mother() {
        return $this->belongsTo('People', 'mother_id');
    }

}
