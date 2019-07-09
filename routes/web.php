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

Route::view('/', 'home');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('contact', 'contact');
// Route::get('contact', function() {
//     return view('contact');
// });
Route::view('about', 'about');
// Route::get('about', function(){
//     return view('about');
// });

// Route::get('customers', function(){
//     $customers=[
//         'John Doe',
//         'Jane Doe',
//         'Bob the builder',
//     ];
//     return view('internals.customers', ['key' => $customers]);
// });
Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');
Route::get('customers/{something}', 'CustomersController@show');
Route::patch('customers/{customer}', 'CustomersController@update');
Route::get('customers/{customer}/edit', 'CustomersController@edit');
