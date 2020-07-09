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

Route::get('/', 'HomeController@index')
->name('homepage');

Route::get('/about', function () {
    return view('misc.about');
})->name('aboutpage');

Route::get('/notes', 'NoteController@notes')->name('allnotes');

Route::get('/note/{id}', 'NoteController@viewNote')->name('singlenote');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'NoteController@admin')->name('adminpage');
    Route::post('/', 'NoteController@create')->name('createnote');
    Route::get('/{id}', 'NoteController@edit')->name('editnotepage');
    Route::patch('/{id}', 'NoteController@update')->name('updatenote');
    Route::get('/delete/{id}', 'NoteController@deleteNote')->name('deletenotepage');
    Route::post('/delete/{id}', 'NoteController@delete')->name('deletenote');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
