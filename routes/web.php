<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ViewController;
// use Illuminate\Http\Request;

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

Route::get("/",'App\Http\Controllers\ViewController@login');
Route::get("secure-login",'App\Http\Controllers\ViewController@login')->name('secure-login')->middleware('guest');

Route::post('post-register','App\Http\Controllers\LoginController@create');
Route::post('post-login','App\Http\Controllers\LoginController@login');
Route::get('register','App\Http\Controllers\ViewController@register');




Route::group(['middleware' => ['auth']], function() {
    Route::get('home','App\Http\Controllers\DashboardController@index');
    Route::get('my-profile/{id}','App\Http\Controllers\DashboardController@profile');
    Route::get('button','App\Http\Controllers\ViewController@buttons');
    Route::get('typography','App\Http\Controllers\ViewController@typography');
    Route::get('icon','App\Http\Controllers\ViewController@icon');
    Route::get('form','App\Http\Controllers\ViewController@form');
    Route::get('form/{id}','App\Http\Controllers\ViewController@edit_form');
    Route::get('delete/{id}','App\Http\Controllers\ViewController@delete_form');
    Route::get('chart','App\Http\Controllers\ViewController@chart');
    Route::get('basic-table','App\Http\Controllers\ViewController@table');
    Route::get('blank-page','App\Http\Controllers\ViewController@blankpage');
    Route::get('error-404','App\Http\Controllers\ViewController@error404');
    Route::get('error-500','App\Http\Controllers\ViewController@error500');
    Route::get("logout",'App\Http\Controllers\ViewController@logout');
    Route::post('post-form','App\Http\Controllers\EmployeeController@create');
    Route::post('edit-form/{id}','App\Http\Controllers\ViewController@sub_edit_form');
    Route::get('edit-profile/{id}','App\Http\Controllers\ViewController@edit_profile');
    Route::post('edit-profile-form/{id}','App\Http\Controllers\ViewController@edit_profile_form');
});