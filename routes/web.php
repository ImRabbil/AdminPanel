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



Route::get('/roles', 'EmployeeController@role_index')->name('admin.role_index');
Route::get('/role/create', 'EmployeeController@role_create')->name('admin.role_create');
Route::post('/role', 'EmployeeController@role_store')->name('admin.role_store');
Route::get('/role/{id}/user', 'EmployeeController@role_user')->name('admin.role_user');


Route::get('/users', 'EmployeeController@user_index')->name('admin.user_index');
Route::get('/user/create', 'EmployeeController@user_create')->name('admin.user_create');
Route::post('/user', 'EmployeeController@user_store')->name('admin.user_store');


//Route for sales manager
// Route::get('/sales/home', function(){
//     return "Welcome to Sales Manager dashboard.";
// })->name('sales.dashboard');



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
// Route::get('/pending-orders', 'PosController@PendingOrders')->name('pending.orders');
 Route::get('/pending-orders', 'PosController@PendingOrders')->name('pending.orders');
Route::get('/view-order-status/{id}', 'PosController@ViewOrder');
Route::get('/pos-done/{id}', 'PosController@PosDONE');
Route::get('/success-orders', 'PosController@SuccessOrders')->name('success.orders');
Route::get('/stock-product', 'PosController@Stock')->name('stock');
Route::get('/edit-stock/{id}', 'PosController@EditStock');
Route::post('/update-stock/{id}', 'PosController@UpdateStock');


//User Pos are route here------------------------------------

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('pos','UserController@index')->name('user.pos');
});
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::post('create-invoice','UserController@CreateInvoice')->name('user.invoice');
});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::post('final-invoice','UserController@FinalInvoice')->name('user.final.invoice');
});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('pending-orders','UserController@PendingOrders')->name('user.pending.orders');
});
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('view-order-status','UserController@ViewOrder')->name('view-order-status/{id}');
});
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('pos-done/{id}','UserController@PosDONE')->name('user.pos-done');
});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('success-orders','UserController@SuccessOrders')->name('user.success.orders');
});





//cart Controller-------------------------------------------
Route::post('/add-cart', 'CartController@Index');
Route::post('/cart-update/{rowId}', 'CartController@CartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@CartRemove');
Route::post('/create-invoice', 'CartController@CreateInvoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');


//sales report route here---------------------------------
Route::get('/today-sales', 'SalesController@TodaySales')->name('today.sales');
Route::get('/monthly-sales', 'SalesController@TodayMonthly')->name('monthly.sales');


//barcode route is here------------------
Route::get('/barcode', 'ProductController@Barcode')->name('barcode');







Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
    Route::get('dashboard','AdminController@index')->name('admin.dashboard');
});



Route::group(['prefix'=>'sales','middleware' => 'sales'],function(){ 
    Route::get('dashboard', function(){
        return view('sales.sales');

    })->name('sales.dashboard');
});

Route::group(['prefix'=>'stock','middleware' => 'stock'],function(){ 
    Route::get('dashboard', function(){
        return view('stock.stock');
    })->name('stock.dashboard');
});
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('dashboard','UserController@index')->name('user.dashboard');
});



Route::group(['prefix'=>'sales','middleware'=>['sales','auth'],'namespace'=>'SalesManager'],function(){ 
    
 //point of sale route here---------------------------------------------

    Route::get('pos','PosController@index')->name('salespage');
    Route::get('/pending-orders', 'PosController@PendingOrders')->name('pending.orders');
    Route::get('/success-orders', 'PosController@SuccessOrders')->name('success.orders');
    Route::get('/view-order-status/{id}', 'PosController@ViewOrder')->name('view-order-status');
    Route::get('/pos-done/{id}', 'PosController@PosDONE')->name('pos-done');



    // Customers routes are here-----------------------------------------
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer', 'CustomerController@Store')->name('insert-customer');
Route::get('/all-customer', 'CustomerController@Customers')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer')->name('view-customer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer')->name('delete-customer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer')->name('edit-customer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer')->name('update-customer');



    //category route here===============
    Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
    Route::post('/insert-category', 'CategoryController@InsertCategory')->name('insert-category');
    Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');


// Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
// Route::post('/insert-category', 'CategoryController@InsertCategory')->name('insert-category');
// Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');
// Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
// Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
// Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');


    //barcode route is here------------------
Route::get('/barcode', 'ManagerController@Barcode')->name('bar');


// Expense route are here------------------------------

Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add_expense');
Route::post('/insert-expense', 'ExpenseController@InsertExpense')->name('insert-expense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today_expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense')->name('edit-today-expense');
Route::post('/update-expense/{id}', 'ExpenseController@UpdateExpense')->name('update-expense');



//sales report route here---------------------------------
Route::get('/today-sales', 'SalesReportController@TodaySales')->name('today.sales');
Route::get('/monthly-sales', 'SalesReportController@TodayMonthly')->name('monthly.sales');






    //cart route
    Route::post('/add-cart', 'CartController@Index')->name('add-cart');
    Route::post('/cart-update/{rowId}', 'CartController@CartUpdate')->name('cart-update');
    Route::get('/cart-remove/{rowId}', 'CartController@CartRemove')->name('cart-remove');
    Route::post('/create-invoice', 'CartController@CreateInvoice')->name('create-invoice');
    Route::post('/final-invoice', 'CartController@FinalInvoice')->name('final-invoice');
});





Route::group(['prefix'=>'stock','middleware'=>['stock','auth'],'namespace'=>'StockManager'],function()
{

 //barcode route is here------------------
Route::get('/barcode', 'ManagerController@Barcode')->name('barcode');

//product route here------------------------
Route::get('/add-product', 'ProductController@AddProduct')->name('add.product');
Route::post('/insert-product', 'ProductController@InsertProduct')->name('insert-product');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct')->name('delete-product');
Route::get('/view-product/{id}', 'ProductController@ViewProduct')->name('view-product');
Route::get('/edit-product/{id}', 'ProductController@EditProduct')->name('edit-product');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct')->name('update-product');

//stock route
Route::get('/stock-product', 'ProductController@Stock')->name('stock');
Route::get('/edit-stock/{id}', 'ProductController@EditStock')->name('edit-stock');
Route::post('/update-stock/{id}', 'ProductController@UpdateStock')->name('update-stock');

// Expense route are here------------------------------

Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@InsertExpense')->name('insert-expense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense');


//Category route here===============
Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
Route::post('/insert-category', 'CategoryController@InsertCategory')->name('insert-category');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory')->name('delete-category');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory')->name('edit-category');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory')->name('update-category');


// Suppliers route are here-----------------------------------------

Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');


Route::post('/insert-supplier', 'SupplierController@store')->name('insert-supplier');
Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all.supplier');

});

















































//modified

// Route::group(['prefix'=>'sales','middleware'=>['sales','auth'],'namespace'=>'sales'],function(){ 
//     Route::get('pos','ManagerController@index')->name('sales.pos');
// });





// Route::group(['prefix'=>'sales','middleware'=>['sales','auth'],'namespace'=>'sales'],function(){ 
//     Route::get('pos','ManagerController@index')->name('sales.pos');
// });


// Route::get('sales/pos','App\Http\Controllers\SalesManager\ManagerController@index')->name('sales.pos');


// Route::get(
//     '/sales/pos',
//     [App\Http\Controllers\SalesManager\ManagerController::class, 'index']
// )->name('salespage');;
//modified












 
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
