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
            'address' => Input::get('father_address'),
        ];
        
        $mother_data = [
            'first_name' => Input::get('mother_first_name'),
            'last_name' => Input::get('mother_last_name'),
            'address' => Input::get('mother_address'),
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
        $student = Student::find($id)->load(['people.village.sub_district']);
        
        return View::make('students.edit', compact('student'));
    }  
    
    public function update($id)
    {
//        dd(Input::all());
        
        $validator = Validator::make(Input::all(), Student::$rules);
        
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
            'address' => Input::get('father_address'),
        ];
        
        $mother_data = [
            'first_name' => Input::get('mother_first_name'),
            'last_name' => Input::get('mother_last_name'),
            'address' => Input::get('mother_address'),
        ];
        
        $person_data = [
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'gender' => Input::get('gender'),
            'address' => Input::get('address'),
            'village_id' => Input::get('village_id'),
        ];
        
        $father = People::find(Input::get('father_id'));
        $father->update($father_data);
        
        $mother = People::find(Input::get('mother_id'));
        $mother->update($mother_data);
        
        $student = Student::find($id);
        
        $person = People::find($student->people_id);
        $person->update($person_data);
        
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
        
        $student->update($student_data);
        
        if($father && $mother && $student)
        {
            return Redirect::route('cp.students.index')->with('success', 'Student data has been updated');
        } 
        else
        {
            return Redirect::route('cp.students.index')->with('error', 'Fail in updateing student data');
        }
        
    }
    
    public function destroy($id)
    {
        $student = Student::find($id);
        
        if(!$student) {
            return Response::make(404, 'Fail delete student. Data not found.');
        }
        
        $student->delete();
        
        return Response::json(['success' => 'Student succesfully been deleted']);
    }
    
}