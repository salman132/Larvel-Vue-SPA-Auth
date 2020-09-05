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

Route::get('/{any}','UsersController@index');
Route::get('/','UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'auth'],function (){


   Route::post('login','UsersController@login');
   Route::post('register','UsersController@register');
   Route::get('/init','UsersController@init');

   Route::group(['middleware'=>'auth'],function (){

       Route::post('logout','UsersController@logout');

   });
});
