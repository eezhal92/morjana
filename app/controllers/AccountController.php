<?php

class AccountController extends \BaseController {

	/**
	 * Display login form.
	 *
	 * @return Response
	 */
	public function login()
	{
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
            return Redirect::intended('/');
        } else {
            return Redirect::back()->with('message', 'Cannot logging you in.');
        }
        
    }
    
    public function logout() 
    {
        Auth::logout();
        
        return Redirect::to('/');
    }


}
