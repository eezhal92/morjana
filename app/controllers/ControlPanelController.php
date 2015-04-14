<?php

class ControlPanelController extends \BaseController
{
    
    public function dashboard()
    {
        $students = Student::all();
        
        return View::make('dashboard', compact('students'));
    }
}