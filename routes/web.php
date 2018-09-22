<?php

use App\Entities\Headquater;

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

// Example Routes
Route::get('/', function (){
    return redirect()->route('login');
});
Route::get('dashboard', 'HomeController')->middleware('auth')->name('home');
Route::resource('suppliers', 'SuppliersController')->middleware('auth');
Route::resource('products', 'ProductsController')->middleware('auth');
Route::resource('orders', 'OrdersController')->middleware('auth');
//Route::post('suppliers', 'SuppliersController@store')->middleware('auth')->name('suppliers.save');

Auth::routes();

Route::get('/headquaters', function() {
    return response()->json([
        'status' => 'success',
        'data' => Headquater::all(),
    ]);
});