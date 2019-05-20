<?php

use Illuminate\Support\Facades\Route;



Route::get('login','Admin\AuthController@authpage')->name('admin.login.page');
Route::post('login','Admin\AuthController@login')->name('admin.login');
Route::post('logout','Admin\AuthController@logout');

Route::resource('member','Admin\MemberController');
Route::resource('membername','Admin\SavedNamesController');
Route::resource('project','Admin\ProjectController');
Route::resource('subproject','Admin\SubProjectController');
Route::resource('proproject','Admin\ProProjectController');
Route::resource('entrproject','Admin\EntrProjectController');

Route::get('proproject/activate/{sb}','Admin\ProProjectController@valider');
Route::get('entrproject/activate/{sb}','Admin\EntrProjectController@valider');

Route::get('subproject/activate/{sb}','Admin\SubProjectController@valider');
Route::get('comments','Admin\CommentsController@index');
Route::delete('comments/{comment}','Admin\CommentsController@delete');

Route::redirect('/', 'admin/member');

Route::post('member/toggle/{user}','Admin\MemberController@toggle')->name('admin.toggle.active');


//Profile

Route::get('profile','Admin\ProfileController@index');