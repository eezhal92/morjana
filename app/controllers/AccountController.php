<?php

use Carbon\Carbon;

class AccountController extends \BaseController {

	/**
	 * Display login form.
	 *
	 * @return Response
	 */
	public function login()
	{
        if(Auth::check())
        {
            return Redirect::to('/');
        }
            
		return View::make('account.login');
	}
    
    public function authenticate()
    {
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $email = Input::get('email');
        $password = Input::get('password');
        $remember = Input::get('remember');
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        if(Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            
            return Redirect::intended('/');
        } else {
            return Redirect::back()->with('error', 'Cannot logging you in.');
        }
        
    }
    
    public function logout() 
    {
        Auth::logout();
        
        return Redirect::to('/');
    }


}
