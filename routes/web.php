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

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function () {

    Route::resource('/user', 'UserController');
    Route::resource('/profile', 'ProfileController');
    Route::resource('/article', 'ArticleController');
    Route::resource('/role', 'RoleController');
    
});

Route::get('/mail', function () {
    return view('mailform');
})->name('mail');

Route::post('/mail', 'UserController@mail')->name('mail.post');