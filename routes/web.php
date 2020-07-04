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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['check.login.admin']], function () {
    Route::get('/', 'AdminController@home')->name('admin.home');
    Route::resource('role', 'RoleController');
    Route::get('role-show', 'RoleControlelr@showRole')->name('show.role');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'UserController@showList')->name('user.list');
        Route::get('/get-list', 'UserController@getList')->name('user.get.list');

        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');

        Route::get('/edit/{id}', 'UserController@showEditForm')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@edit')->name('user.edit');

        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', 'CustomerController@showList')->name('customer.list');
        Route::get('/get-list', 'CustomerController@getList')->name('customer.get.list');

        Route::get('/create', 'CustomerController@create')->name('customer.create');
        Route::post('/store', 'CustomerController@store')->name('customer.store');

        Route::get('/edit/{id}', 'CustomerController@showEditForm')->name('customer.edit');
        Route::post('/edit/{id}', 'CustomerController@edit')->name('customer.edit');

        Route::get('/delete/{id}', 'CustomerController@delete')->name('customer.delete');
    });
});

Route::get('/', function () {
    return view('welcome');
});
