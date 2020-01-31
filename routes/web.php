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
Route::group(['middleware'=>'auth'],function () {
    Route::get('/home', 'HomeController@index')->name('home');
//  post
    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/create', 'PostController@store');
    Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');
    Route::delete('/post/{post}', 'PostController@destroy')->name('post.destroy');
//  role
    Route::get('/role', 'RoleController@index')->name('role.index');
    Route::get('/role/create', 'RoleController@create')->name('role.create');
    Route::post('/role/create', 'RoleController@store');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('role.edit');
    Route::patch('/role/{role}/edit', 'RoleController@update')->name('role.update');
    Route::get('/role/{role}/affecter', 'RoleController@affecter_view')->name('role.affecter');
    Route::post('/role/{role_n}/affecter', 'RoleController@affecter')->name('role.affecter.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('role.destroy');


});
