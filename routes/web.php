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



//Category routee are here==============================

Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
Route::post('/insert-category', 'CategoryController@InsertCategory');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');





//Product route are here---------------------------

Route::get('/add-product', 'ProductController@AddProduct')->name('add.product');
Route::post('/insert-product', 'ProductController@InsertProduct');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/view-product/{id}', 'ProductController@ViewProduct');
Route::get('/edit-product/{id}', 'ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct');

// Expense route are here------------------------------

Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@InsertExpense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense');
Route::post('/update-expense/{id}', 'ExpenseController@UpdateExpense');
Route::get('/monthly-expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense', 'ExpenseController@YearlyExpense')->name('yearly.expense');
Route::get('/january-expense', 'ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/october-expense', 'ExpenseController@OctoberExpense')->name('october.expense');



//Attendance Route are here---------------------------------------

Route::get('/take-attendance', 'AttendanceController@TakeAttendance')->name('take.attendance');
Route::post('/insert-attendance', 'AttendanceController@InsertAttendance');
Route::get('/all-attendance', 'AttendanceController@AllAttendance')->name('all.attendance');
Route::get('/edit-attendance/{edit_date}', 'AttendanceController@EditAttendance');
Route::post('/update-attendance', 'AttendanceController@UpdateAttendance');
Route::get('/view-attendance/{edit_date}', 'AttendanceController@ViewAttendance');








//setting route are here======================================
Route::get('/website-setting', 'SettingController@WebsiteSetting')->name('setting');
Route::post('/view-website/{id}', 'SettingController@');






//POS route are here===============================================

Route::get('/pos', 'PosController@Index')->name('pos');
Route::get('/pending-orders', 'PosController@PendingOrders')->name('pending.orders');
Route::get('/view-order-status/{id}', 'PosController@ViewOrder');
Route::get('/pos-done/{id}', 'PosController@PosDone');
Route::get('/success-orders', 'PosController@SuccessOrders')->name('success.orders');



//cart Controller-------------------------------------------
Route::post('/add-cart', 'CartController@Index');
Route::post('/cart-update/{rowId}', 'CartController@CartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@CartRemove');
Route::post('/create-invoice', 'CartController@CreateInvoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');
















 
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
