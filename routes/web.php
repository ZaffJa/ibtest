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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
//login
Route::get('/admin', function () {return view('admin');})->name('admin');
Route::get('/engineer', function () {return view('engineer');})->name('engineer');
Route::get('/technician', function () {return view('technician');})->name('technician');

//PasswordChange
Route::get('/change_mpassword', function () { return view('auth.change_mpassword'); });
Route::get('/change_epassword', function () { return view('auth.change_epassword'); });
Route::get('/change_tpassword', function () { return view('auth.change_tpassword'); });
Route::post('change/password', 'ChangePasswordController@changePassword');
//Admin
Route::resource('users', 'UsersController');
Route::resource('items', 'ItemController');
Route::resource('stock', 'StockController');
//Engineer
Route::resource('users-engineer', 'Users_EngineerController');
Route::resource('items-engineer', 'Item_EngineerController');
Route::resource('supplier', 'SupplierController');
//Technician
Route::resource('users-technician', 'Users_TechnicianController');


Route::group(['middleware' => ['web']], function(){
  Route::resource('production', 'ProductionController');
});

Route::group(['middleware' => ['web']], function(){
  Route::resource('production-technician', 'Production_TechnicianController');
});

Route::group(['middleware' => ['web']], function(){
  Route::resource('production-engineer', 'Production_EngineerController');
});

Route::group(['middleware' => ['web']], function(){
  Route::resource('stock', 'StockController');
});

Route::group(['middleware' => ['web']], function(){
  Route::resource('report', 'ReportController');
});

















/*
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});*/
