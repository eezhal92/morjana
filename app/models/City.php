<?php

class City extends Eloquent {
    protected $table = 'cities';
    
    protected $fillable = ['name', 'province_id'];
    
    public function province() {
        return $this->belongsTo('Province');    
    }
    
    public function sub_districts() {
        return $this->hasMany('SubDistrict');    
    }
    
    public function univercities() {
        return $this->hasMany('Univercity');
    }
}