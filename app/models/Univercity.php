<?php

class Univercity extends Eloquent {
    protected $table = 'univercities';
    
    public function city()
    {
        return $this->belongsTo('City');
    }

}