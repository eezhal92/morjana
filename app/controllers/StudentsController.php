<?php

class StudentsController extends \BaseController 
{
    public function index()
    {
        $students = Student::all()->load([
            'people', 'major.faculty', 'univercity.city.province'
        ]);
        
        return View::make('students.index', compact('students'));
    }
    
    public function create()
    {
//        $provinces = ['' => 'Please select univercity province'] + Province::lists('name', 'id');
//        $sub_districts = ['' => 'Please select sub district'] + SubDistrict::lists('name', 'id');
//        $univercity_type_options = ['' => 'Please select one', 'public' => 'Public', 'private' => 'Private'];
//        
//        $degrees = Degree::lists('name', 'id');
        
        return View::make('students.create');
    }
    
    public function store() 
    {
        
//        dd(Input::all());
        
        $validator = Validator::make(
            Input::all(),
            Student::$rules
        );
        
        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $univercity_id = Input::get('univercity_id');
        
        if($univercity_id == '' || null) {
            $univ = new Univercity;
            $univ->city_id = Input::get('univercity_city_id');
            $univ->name = Input::get('univercity');
            $univ->type = Input::get('univercity_type');
            $univ->save();
            
            $univercity_id = $univ->id;
        }
        
        $faculty_id = Input::get('faculty_id');
        
        if($faculty_id == '' || null) {
            $fac = new Faculty;
            $fac->name = Input::get('faculty');
            $fac->save();
        }
        
        $major_id = Input::get('major_id');
        
        if($major_id == '' || null) {
            $maj = new Major;            
            
            /* don't modify this logic*/
            $maj->faculty_id = ($faculty_id == '' || null) ? $fac->id : $faculty_id; 
            $maj->name = Input::get('major');
            $maj->save();
            
            $major_id = $maj->id;
        }
        
        $father_data = [
            'first_name' => Input::get('father_first_name'),
            'last_name' => Input::get('father_last_name'),
            'address' => Input::get('father_last_name'),
        ];
        
        $mother_data = [
            'first_name' => Input::get('mother_first_name'),
            'last_name' => Input::get('mother_last_name'),
            'address' => Input::get('mother_last_name'),
        ];
        
        $person_data = [
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'gender' => Input::get('gender'),
            'address' => Input::get('address'),
            'village_id' => Input::get('village_id'),
        ];
            
        $father = People::create($father_data);
        $mother = People::create($mother_data);
        $person = People::create($person_data);
        
        $student_data = [
            'people_id' => $person->id,
            'student_number' => Input::get('student_number'),
            'univercity_id' => $univercity_id,
            'major_id' => $major_id,
            'degree_id' => Input::get('degree_id'),
            'year' => Input::get('year'),
            'type' => Input::get('type'),
            'amount_of_grant' => Input::get('amount_of_grant'),
            'father_id' => $father->id,
            'mother_id' => $mother->id,
        ];
        
        if($father && $mother && $person) {
            $student = Student::create($student_data);
            
            return Redirect::route('cp.students.index')
                    ->with('success', 'Added new records!');
        }
        
        return Redirect::back()->with('error', 'Fail');
        
        
    }
    
    public function show($id)
    {
        $student = Student::find($id)->load(['people.village.sub_district']);
        
        return View::make('students.show', compact('student'));
    }
    
    public function edit($id)
    {
        $student = Student::find($id);
        
        return View::make('posts.edit', compact('student'));
    }  
    
    public function update($id)
    {
    
    }
    
    public function destroy($id)
    {
    
    }
    
}