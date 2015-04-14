<?php

class Major extends Eloquent {
    protected $table = 'majors';

    public function faculty() {
        return $this->belongsTo('Faculty');   
    }
}