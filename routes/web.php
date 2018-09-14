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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//Route::get('/dashboard', 'HomeController@viewDashboard')->name('dashboard');

Route::get('/logout', 'HomeController@logout');
//Route::get('/generateWord', 'wordTest@redirectToPage');

Route::get('/generateWord', ['as'=>'createWord','uses'=>'WordTest@createWordDocx']);

Route::get('/registernew', 'HomeController@newRegisterPage')->name('registernew');
Route::post('/registernew','userController@add_user')->name('add_user');
Route::get('/viewuser','userController@viewUsers')->name('viewUser');
Route::get('/test','userController@viewUsers')->name('test');