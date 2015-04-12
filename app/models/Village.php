<?php 

class Village extends Eloquent {
    protected $table = 'villages';
    
    public function sub_district() {
        return $this->belongsTo('SubDistrict');
    }
}