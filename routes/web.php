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

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Route;

>>>>>>> a2b7e7312f08e63cd6d22e6babc2f69ea4ba8061
Route::redirect('/','/login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projet/{project}', 'HomeController@projetIndex')->name('projet');
