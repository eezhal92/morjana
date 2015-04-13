<?php 

use \Illuminate\Database\Eloquent\Collection;

class Village extends Eloquent {
    protected $table = 'villages';
    
    public function sub_district() {
        return $this->belongsTo('SubDistrict');
    }
    
    public function people() {
        return $this->hasMany('People');
    }
    
    public function students() {
        $students = new Collection;
        
        $village = $this->load('people.student');
        
        foreach($village->people as $people) {    
            if(!is_null($people->student)) {
                $students->add($people->student);
            }
        }
        
        return ($students->count() > 0) ? $students : null;
    }
    
}