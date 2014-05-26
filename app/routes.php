<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*---------------- Álbumes ---------------------------*/
Route::get('/albums/show', 'AlbumController@show');
Route::get('/albums/create', 'AlbumController@create');
Route::get('/albums/edit/{id}', 'AlbumController@edit');
Route::get('/albums/remove/{id}', 'AlbumController@destroy');
Route::get('/albums/datatables', 'AlbumController@datatables');

/*---------------- Secciones ---------------------------*/
Route::get('/sections/show/{albumid}', 'SectionController@show');
Route::get('/sections/create/{albumid}', 'SectionController@create');
Route::get('/sections/edit/{id}', 'SectionController@edit');
Route::get('/sections/remove/{id}', 'SectionController@destroy');

/*---------------- Hojas ---------------------------*/
Route::get('/sheets/show/{sectionid}', 'SheetController@show');
Route::get('/sheets/create/{sectionid}', 'SheetController@create');
Route::get('/sheets/edit/{id}', 'SheetController@edit');
Route::get('/sheets/remove/{id}', 'SheetController@destroy');

Route::group(array('before' => 'csrf'), function()
{
    Route::post('/albums/store', 'AlbumController@store');    
    Route::post('/albums/update', 'AlbumController@update');
    
    Route::post('/sections/store', 'SectionController@store');    
    Route::post('/sections/update', 'SectionController@update');
    
    Route::post('/sheets/store', 'SheetController@store');    
    Route::post('/sheets/update', 'SheetController@update');
});