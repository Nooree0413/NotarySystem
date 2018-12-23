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
    Route::get('/show/client/{id}', 'StaffController@clientDetails')->name('client.profile.show');
    Route::get('/client/delete/{id}', 'StaffController@deleteClient')->name('staff.client.delete');
    Route::get('/client/transaction/{id}', 'StaffController@getListTransactions')->name('transaction.list');
    Route::get('/add/client/children', 'StaffController@showChildrenForm')->name('show.children.form');
    Route::post('/add/client/children', 'StaffController@addChildren')->name('add.children');
    Route::get('/confirm/number/children', 'StaffController@showChildrenConfirmation')->name('confirm.children');
    Route::post('/confirm/number/children', 'StaffController@addNumberChildren')->name('add.num.children');
    Route::get('/generate/contract/partage', 'StaffController@partageGeneration')->name('show.partage');
    Route::post('/generate/contract/partage' ,'partageController@generatePartage')->name('generate.partage');
    // Route::post('/preview/contract/pdf', 'previewPDFController@previewContractSOIP')->name('view.pdf');
});

Route::prefix('rgd')->group(function(){
    Route::get('/','RgdController@index')->name('rgddashboard');
    Route::get('/login','Auth\RgdLoginController@showLoginForm')->name('rgd.login');
    Route::post('/login','Auth\RgdLoginController@login')->name('rgd.login.submit');
    Route::get('/logout', 'Auth\RgdLoginController@rgdlogout')->name('rgd.logout');
});

