<?php

class Faculty extends Eloquent {
    protected $table = 'faculties';
    
    public function majors() {
        return $this->hasMany('Major');
    }

}