<?php

use Illuminate\Support\Facades\Route;

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
   // return redirect()->route('login');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//employee route
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');


Route::post('/insert-employee', 'EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@Employees')->name('all.employee');

Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee');

// Customers routes are here-----------------------------------------
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer', 'CustomerController@Store');
Route::get('/all-customer', 'CustomerController@Customers')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer');

// Suppliers route are here-----------------------------------------

Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');


Route::post('/insert-supplier', 'SupplierController@store');
Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all.supplier');


//salary routes are here-------------------------
Route::get('/add-advanced-salary', 'SalaryController@AddAdvancedSalary')->name('add.advancedsalary');
Route::post('/insert-advancedsalary', 'SalaryController@InsertAdvanced');
Route::get('/all-advanced-salary', 'SalaryController@AllSalary')->name('all.advancedsalary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');








 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
