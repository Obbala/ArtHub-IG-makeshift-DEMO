<?php

//use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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




Auth::routes(); 
Route::view('/','welcome');

//Route::view('/register','auth.register');

// Route::get('/register', function(){
//     return view('auth.register');
// });



// Route::get('/register', function(){
//     return view('auth.register');
// });


Route::post('follow/{user}',function(){
    return ['success']; 
});


Route::get('welcome', function () {
    return view('profiles.index');
});


//Route::get('login','App\Http\Controllers\Auth\LoginController');
Route::post('register','\App\Http\Controllers\Auth\RegisterController@takeMe');
Route::post('follow/{user}','\App\Http\Controllers\FollowsController@store');
 
Route::get('/','\App\Http\Controllers\PostsController@index');

Route::get('/p/create', 'PostsController@create');
Route::post('/p', '\App\Http\Controllers\PostsControler@store');
Route::get('/p/{post}', '\App\Http\Controllers\PostsController@show');



Route::get('/profiles/{user}', 'profilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit', [App\Http\Controllers\profilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', 'profilesController@ update')->name('profile.update');
