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
    //role
    Route::resource('role', 'RoleController');

    //category
    Route::resource('category', 'CategoryController');
    Route::get('/category/delete/{id}', ['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

    //post
    Route::resource('post', 'PostController');
    Route::get('/post-list', 'PostController@getList')->name('post.list');
    Route::get('/post/delete/{id}', ['as' => 'post.delete', 'uses' => 'PostController@destroy']);

    //profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile.index');
        Route::post('/', 'ProfileController@update')->name('profile.update');
    });
    //user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'UserController@showList')->name('user.list');
        Route::get('/get-list', 'UserController@getList')->name('user.get.list');

        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');

        Route::get('/edit/{id}', 'UserController@showEditForm')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@edit')->name('user.edit');

        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });
    //customer
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', 'CustomerController@showList')->name('customer.list');
        Route::get('/get-list', 'CustomerController@getList')->name('customer.get.list');

        Route::get('/create', 'CustomerController@create')->name('customer.create');
        Route::post('/store', 'CustomerController@store')->name('customer.store');

        Route::get('/edit/{id}', 'CustomerController@showEditForm')->name('customer.edit');
        Route::post('/edit/{id}', 'CustomerController@edit')->name('customer.edit');

        Route::get('/delete/{id}', 'CustomerController@delete')->name('customer.delete');
    });

    //banner
    Route::resource('banner', 'BannerController');
    Route::get('/banner/delete/{id}', ['as' => 'banner.delete', 'uses' => 'BannerController@destroy']);

    //todo-list
    Route::resource('todo-list', 'TodolistController');
    Route::group(['prefix' => 'todo-list'], function () {
        Route::get('delete/{id}', ['as' => 'todo-list.delete', 'uses' => 'TodolistController@destroy']);
        Route::group(['prefix' => 'approve'], function () {
            Route::get('/send-request/{id}', ['as' => 'todo-list.approve.send-request', 'uses' => 'TodolistController@approveSendRequest']);
            Route::get('/list', ['as' => 'todo-list.approve.list', 'uses' => 'TodolistController@approveList']);
            Route::get('/checked/{id}', ['as' => 'todo-list.approve.checked', 'uses' => 'TodolistController@approveChecked']);
            Route::get('/delete/{id}' , ['as' => 'todo-list.approve.delete', 'uses' => 'TodolistController@approveDelete']);
        });
    });

});

Route::group(['prefix' => '/', 'namespace' => 'Site'], function () {
    Route::get('/', 'HomeController@index')->name('site.home');

    Route::get('category/{id}', function ($id) {
        return view('site.category.category');
    })->name('site.category');

    Route::get('blog-image', function () {
        return 'blog image';
    })->name('site.blog');

    Route::get('about', function () {
        return view('site.about.about');
    })->name('site.about');

    Route::get('contact', function () {
        return view('site.contact.contact');
    })->name('site.contact');

    Route::get('/post/{id}', function ($id) {
        return $id;
    })->name('site.post');


});

