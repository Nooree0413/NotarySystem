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
    Flashy::message("Welcome Aboard","http://your-awesome-link.com");
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//Route::get('/dashboard', 'HomeController@viewDashboard')->name('dashboard');

Route::get('/logout', 'HomeController@userlogout');
//Route::get('/generateWord', 'wordTest@redirectToPage');

//Route::get('/generateWord', ['as'=>'createWord','uses'=>'WordTest@createWordDocx']);
// Route::post('/generateWord', 'WordTest@createWordDocx')->name('createWord');

// Route::get('/registernew', 'HomeController@newRegisterPage')->name('registernew');
// Route::get('/propertyRegistration', 'HomeController@propertyRegistration')->name('propertyRegistration');
// Route::get('/generateContract', 'HomeController@generateContract')->name('generateContract');
// Route::get('/registerSpouse', 'HomeController@newRegisterSpousePage')->name('registerSpouse');
// Route::post('/propertyRegistration', 'userController@add_property')->name('add_property');
// Route::post('/registernew','userController@add_user')->name('add_user');
// Route::post('/registerSpouse','userController@add_spouse')->name('add_spouse');
Route::get('/viewuser','userController@viewUsers')->name('viewUser');
Route::get('/test','userController@viewUsers')->name('test');
Route::post('propertyRegistration/fetch', 'HomeController@fetch')->name('dynamicdependent.fetch');

//staff only
Route::prefix('staff')->group(function(){
    Route::get('/','StaffController@index')->name('staffdashboard');
    Route::get('/login','Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/login','Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::get('/logout', 'Auth\StaffLoginController@logout')->name('staff.logout');
    Route::get('/registernew', 'StaffController@newRegisterPage')->name('registernew');
    Route::post('/registernew','StaffController@add_user')->name('add_user');
    Route::get('/registerSpouse', 'StaffController@newRegisterSpousePage')->name('registerSpouse');
    Route::post('/registerSpouse','StaffController@add_spouse')->name('add_spouse');
    Route::get('/propertyRegistration', 'StaffController@propertyRegistration')->name('propertyRegistration');
    Route::post('/propertyRegistration', 'StaffController@add_property')->name('add_property');
    Route::get('/generateContract', 'StaffController@generateContract')->name('generateContract');
    Route::post('/generateWord', 'WordTest@createWordDocx')->name('createWord');
    Route::get('/profile/view', 'StaffController@myProfile')->name('myProfile');
    Route::post('/profile/view', 'StaffController@profileupdate')->name('profileUpdate');
    Route::get('/meetings', 'StaffController@meeting')->name('meetings');
    Route::post('/meetings', 'StaffController@addMeeting')->name('meetings.add');
    Route::get('/upload/contract', 'StaffController@showUploadForm')->name('upload.contract');
    Route::post('/upload/contract', 'StaffController@uploadContract')->name('upload.contract.submit');
    Route::get('/view/contract/{id}','StaffController@viewContract')->name('view.contract');
    
});

Route::prefix('rgd')->group(function(){
    Route::get('/','RgdController@index')->name('rgddashboard');
    Route::get('/login','Auth\RgdLoginController@showLoginForm')->name('rgd.login');
    Route::post('/login','Auth\RgdLoginController@login')->name('rgd.login.submit');
    Route::get('/logout', 'Auth\RgdLoginController@rgdlogout')->name('rgd.logout');
});