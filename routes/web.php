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

Route::get('/', function () {
	$dataBarang = \App\Barang::all();
    return view('welcome', compact('dataBarang'));
});

Route::post('/', 'UploadController@doUpload')->name('upload.doUpload');