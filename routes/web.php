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

// Example Routes
Route::get('/', function (){
    return redirect()->route('login');
});
Route::get('/dashboard', 'HomeController')->middleware('auth')->name('home');
Auth::routes();