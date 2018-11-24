<?php
use App\User;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Resources\User as UserResource;
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

// Route::get('/json',function(){
//     $user = User::where('id', 1)->first();
//     return new UserResource($user);
// });
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

Route::post('/api/task', function(Request $request){
    Task::create($request->all());
    return $request->all();
});