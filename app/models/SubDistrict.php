<?php

class SubDistrict extends Eloquent {
    protected $table = 'sub_districts';
    
    public function city() {
        return $this->belongsTo('City');
    }
    
    public function villages() {
        return $this->hasMany('Village');
    }
}