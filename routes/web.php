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
Route::get('/crudetable','CrudeController@crude');
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
Route::post('/edit', 'StockController@edit');
Route::get('/itemName', 'StockController@itemName');
Route::resource('report', 'ReportController');
Route::post('/editName', 'ReportController@editName');
Route::get('/show', 'OrderController@show')->name('order.olist');
Route::get('/approve/{id}', 'OrderController@approve')->name('order.approve');
Route::get('/financial',function(){
  return view('financial');
})->name('finance');
//Engineer
Route::resource('users-engineer', 'Users_EngineerController');
Route::resource('items-engineer', 'Item_EngineerController');
Route::resource('supplier', 'SupplierController');
//Route::get('/order/index', 'OrderController@index')->name('order');
Route::resource('order', 'OrderController');
Route::get('/company_details', 'OrderController@company_details');
Route::get('/item_total', 'OrderController@item_total');
Route::get('/showEngineer', 'OrderController@showEngineer')->name('order.olist-engineer');
Route::resource('stock-engineer', 'Stock_EngineerController');
Route::post('/editEng', 'Stock_EngineerController@editEng');
Route::resource('report-engineer', 'Report_EngineerController');
Route::post('/editNameEng', 'Report_EngineerController@editNameEng');
//Technician
Route::resource('users-technician', 'Users_TechnicianController');
Route::resource('report-technician', 'Report_TechnicianController');
Route::post('/editNameTech', 'Report_TechnicianController@editNameTech');
Route::resource('stock-technician', 'Stock_TechnicianController');
Route::post('/editTech', 'Stock_TechnicianController@editTech');


Route::resource('production', 'ProductionController');
Route::resource('production-technician', 'Production_TechnicianController');
Route::resource('production-engineer', 'Production_EngineerController');








/*
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});*/
