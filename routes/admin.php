<?php

use Illuminate\Support\Facades\Route;

Route::resource('/','Admin\HomeController');

Route::get('login','Admin\AuthController@authpage')->name('admin.login.page');
Route::post('login','Admin\AuthController@login')->name('admin.login');

Route::resource('member','Admin\MemberController');
Route::post('member/toggle/{user}','Admin\MemberController@toggle')->name('admin.toggle.active');