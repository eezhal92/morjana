<?php

class Major extends Eloquent {
    protected $table = 'majors';

    public function faculties() {
        return $this->belongsTo('Faculty');   
    }
}