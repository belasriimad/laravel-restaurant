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
    return view('welcome');
});

Auth::routes(["register" => false, "reset" => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');
Route::resource('tables', 'TableController');
Route::resource('servants', 'ServantsController');
Route::resource('menus', 'MenuController');
Route::get('payments', 'PaymentController@index')->name("payments.index");
Route::resource('sales', 'SalesController');
Route::get('reports', 'ReportController@index')->name("reports.index");
Route::post('reports/generate', 'ReportController@generate')->name("reports.generate");
Route::post('reports/export', 'ReportController@export')->name("reports.export");
