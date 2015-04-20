<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
    return View::make('hello');
});

Route::group(['prefix' => 'account'], function() {
    Route::get('login', [
        'as' => 'account.login',
        'uses' => 'AccountController@login'
    ]);
    
    Route::post('authenticate', [
        'as' => 'account.authenticate',
        'uses' => 'AccountController@authenticate'
    ]);
    
    Route::get('logout', [
        'as' => 'account.logout',
        'uses' => 'AccountController@logout'
    ]);
    
    Route::get('remind', [
        'as' => 'account.getRemind',
        'uses' => 'RemindersController@getRemind'
    ]);
    
    Route::post('remind', [
        'as' => 'account.postRemind',
        'uses' => 'RemindersController@postRemind'
    ]);
        
    Route::get('password/reset/{token}', [
        'as' => 'account.getReset',
        'uses' => 'RemindersController@getReset'
    ]);
    
    Route::post('password/reset', [
        'as' => 'account.postReset',
        'uses' => 'RemindersController@postReset'
    ]);
    
});

Route::group(['prefix' => 'cp', 'before' => 'auth'], function() {
    Route::get('dashboard', [
        'as' => 'cp.dashboard',
        'uses' => 'ControlPanelController@dashboard'
    ]);
    
    Route::resource('students', 'StudentsController');
    
    Route::get('excel', [
        'as' => 'cp.excel', 
        'uses' => 'StudentsController@exportMaster'
    ]);
    
});

Route::group(['prefix' => 'services'], function() {
    Route::get('cities', [
        'as' => 'services.cities',
        'uses' => 'ServicesController@cities'
    ]);
    
    Route::get('villages', [
        'as' => 'services.villages',
        'uses' => 'ServicesController@villages'
    ]);
    
    Route::get('autocomplete-univercities', [
        'as' => 'services.autocomplete-univercities',
        'uses' => 'ServicesController@autoUnivercities'
    ]);
    
    Route::get('autocomplete-faculties', [
        'as' => 'services.autocomplete-faculties',
        'uses' => 'ServicesController@autoFaculties'
    ]);
});

// coba rubah yg ini
Route::get('test',[
    'as' => 'justtest',
    'uses' => 'HelloController@index'
]);
