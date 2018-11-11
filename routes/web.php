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
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'admin\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'admin\AdminLoginController@logout')->name('admin.logout');
});


Route::get('/home', 'HomeController@index')->name('home');