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
    return view('auth.login');
});

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();



Route::group(['middleware' => ['auth']], function() {
//Route::post('/delete','InvoicesController@destroy')->name('delete_invoices')->middleware('auth');
Route::get('home', 'HomeController@index')->name('home');
Route::resource('invoices', 'InvoicesController')->middleware('auth');
Route::resource('Sections', 'SectionsController')->middleware('auth');
Route::resource('Products', 'ProductsController')->middleware('auth');
Route::resource('InvoiceAttachments','InvoicesAttachmentsController')->middleware('auth');
Route::resource('Archive', 'InvoiceArchiveController');
#################################################################

################################## Route Delete #########################
Route::post('/delete_file/','InvoicesDetailsController@destroy')->name('delete_file')->middleware('auth');

Route::post('invoices/delete/','InvoicesController@destroy')->name('invoices.destroy');

Route::post('Products/delete/','ProductsController@destroy')->name('Products.destroy');

Route::post('Sections/delete','SectionsController@destroy')->name('Sections.destroy');

################################## Route Delete End #########################

################################## Route Roles  #########################

Route::resource('roles','UserManagement\RoleController');
Route::resource('users','UserController');
################################## Route Roles End #########################


Route::get('/edit/{id}','InvoicesController@edit')->name('edit')->middleware('auth');

Route::get('/section/{id}','InvoicesController@getProducts')->middleware('auth');

Route::get('/details/{id}','InvoicesDetailsController@index')->middleware('auth');

Route::get('InvoicesDetails/{id}','InvoicesDetailsController@index')->middleware('auth');

Route::get('/View_file/{invoice_number}/{file_name}','InvoicesDetailsController@Openfile')->middleware('auth');

Route::get('/Download_file/{invoice_number}/{file_name}','InvoicesDetailsController@Downloadfile')->middleware('auth');

Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');

Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');

Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');

Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');

Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');

Route::get('export_invoices','InvoicesController@export');

Route::get('changeStatus/{id}','UserController@changeStatus') -> name('changeStatus');

Route::get('invoices_report', 'Invoices_ReportController@index');

Route::post('Search_invoices', 'Invoices_ReportController@Search_invoices');

Route::get('customers_report', 'CustomersReportController@index')->name("customers_report");

Route::post('Search_customers', 'CustomersReportController@Search_customers');

Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('/{page}', 'AdminController@index');
});
