<?php

use Illuminate\Support\Facades\Route;

Route::resource('/','Admin\HomeController');

Route::get('login','Admin\AuthController@authpage')->name('admin.login.page');
Route::post('login','Admin\AuthController@login')->name('admin.login');
Route::post('logout','Admin\AuthController@logout');

Route::resource('member','Admin\MemberController');
Route::resource('membername','Admin\SavedNamesController');
Route::resource('project','Admin\ProjectController');

Route::post('member/toggle/{user}','Admin\MemberController@toggle')->name('admin.toggle.active');
