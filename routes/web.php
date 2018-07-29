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

Route::get('/','PrincipalController@getIndex'
)->name('pr.index');


Route::get('registro',
[
  'uses'=>'PrincipalController@getRegistro',
  'as'=>'pr.registro'
]);

Route::group(['prefix'=>'centro','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'CentroController@getCentroIndex',
      'as'=>'centro.index'
    ]
  );
  Route::get('create',
    [
      'uses'=>'CentroController@getCentroCreate',
      'as'=>'centro.create',

    ]
  );
  Route::post('create',
    [
      'uses'=>'CentroController@ctCentroCreate',
      'as'=>'centro.create',
      
    ]
  );
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
