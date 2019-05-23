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
use \Illuminate\Support\Facades\Route;
Route::redirect('/','/login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projects', 'HomeController@projets');
Route::get('/projet/{project}', 'HomeController@projetIndex')->name('projet');

Route::get('/profile','HomeController@profile');
Route::get('/profile/{user}','HomeController@profileMember');
Route::get('/vote/{user}','HomeController@vote');

Route::get('/profileedit','HomeController@profileEdit');
Route::get('/search','HomeController@search');
Route::post('/profile/edit','HomeController@profileEditSave');

Route::resource('comment','CommentController');
Route::resource('proproject','ProProjectsController');
Route::resource('entrproject','EntrProjectsController');

Route::resource('subproject','SubProjectController');
Route::get('subproject/add/{project}','SubProjectController@createSB')->where([
    'project'=>'^[0-9]+$'
]);
