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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'App\Http\Controllers\appController@home');
Route::post('home/tambah', 'App\Http\Controllers\appController@tambah_data');
Route::get('home/{id}/hapus', 'App\Http\Controllers\appController@hapus');

// crawling data page
Route::get('crawling', 'App\Http\Controllers\crawlingController@crawling_view');
Route::post('/crawling/create', 'App\Http\Controllers\crawlingController@get');
