<?php

class StudentsController extends \BaseController 
{
    public function index()
    {
        $students = Student::all()->load(['people', 'major.faculty']);
        
        return View::make('students.index', compact('students'));
    }
    
    public function create()
    {
    
    }
    
    public function store() 
    {
    
    }
    
    public function show($id)
    {
    
    }
    
    public function edit($id)
    {
    
    }  
    
    public function update($id)
    {
    
    }
    
    public function destroy($id)
    {
    
    }
    
}