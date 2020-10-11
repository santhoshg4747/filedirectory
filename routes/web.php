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
Route::get('/viewuploadfiles', 'FileController@viewUploadFiles');
Route::get('/uploadfiles', 'FileController@uploadFiles');
Route::post('/uploadfiles', 'FileController@storeFile');
Route::any('/searchfiles','FileController@searchFiles');
Route::get('/deletefile/{fileid}', 'FileController@deleteFile');
Route::get('/deletedfiles', 'FileController@deletedfiles');