<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//General Routing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', function() { return view('map'); });

Route::get('/resumebuilder', function () { return view('resumebuilder'); });

// Account Routing
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('info', 'You have been logged out!');
});

Route::get('/edit/account', function() { return view('edit/account'); });

Route::get('/account/{id}', function($id) { return view('view/account', ['data'=>$id]); });

Auth::routes();

//Organization Routing
Route::get('/create/organization', function () { return view('create/organization'); });

Route::get('/edit/organization/{id}', function ($id) { return view('edit/organization', ['data'=>$id]); });

Route::get('/organization', function () { return view('organization'); });

Route::get('/organization/{id}', function ($id) { return view('view/organization', ['data'=>$id]); });

//Trial Routing
Route::get('/create/trial', function () { return view('create/trial'); });

Route::get('/edit/trial/{id}', function ($id) { return view('edit/trial', ['data'=>$id]); });

Route::get('/trial', function () { return view('trial'); });

Route::get('/trial/{id}', function ($id) { return view('view/trial', ['data'=>$id]); });

Route::get('/skills/trial/{id}', function ($id) { return view('edit/trialskills', ['data'=>$id]); });

//Skills Routing
Route::get('/create/skill', function () { return view('create/skill'); });

Route::get('/skill', function () { return view('skill'); });

Route::get('/skill/{id}', function ($id) { return view('view/skill', ['data'=>$id]); });

Route::get('/edit/skill/{id}', function ($id) { return view('edit/skill', ['data'=>$id]); });

Route::get('/edit/skills', function () { return view('edit/accountskills'); });

//Application Routing
Route::get('/create/application/{id}', function ($id) { return view('create/application', ['data'=>$id]); });

Route::get('/application', function () { return view('application'); });

Route::get('/application/{id}', function ($id) { return view('/view/application', ['data'=>$id]); });