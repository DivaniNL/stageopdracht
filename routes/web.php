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
///Show Views
Route::get('/', function () {
    return view('index');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/home', function () {
    return redirect('index');
});

///Controllers
Route::get('edit', 'AdresController@edit');
Route::get('/{id}/edit', 'AdresController@edit')->name('adres.edit');
Route::get('/{id}/update', 'AdresController@update')->name('adres.update');
Route::resource('/', 'AdresController');
//Authentication Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=> 'auth'], function(){
    Route::get('/edit/{id}', function () {
        return view('edit');
    });
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/create', function () {
        return view('create');
    });
    Route::delete('delete/{id}','AdresController@destroy');
    Route::resource('/', 'AdresController');
});