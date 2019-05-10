<?php

use Illuminate\Support\Facades\Route;



Route::get('login','Admin\AuthController@authpage')->name('admin.login.page');
Route::post('login','Admin\AuthController@login')->name('admin.login');
Route::post('logout','Admin\AuthController@logout');

Route::resource('member','Admin\MemberController');
Route::resource('membername','Admin\SavedNamesController');
Route::resource('project','Admin\ProjectController');

Route::redirect('/', 'admin/member');

Route::post('member/toggle/{user}','Admin\MemberController@toggle')->name('admin.toggle.active');


//Profile

Route::get('profile','Admin\ProfileController@index');