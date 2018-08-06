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
  Route::get('edit/{id}',
    [
      'uses'=>'CentroController@getCentroEdit',
      'as'=>'centro.edit',

    ]
  );
  Route::post('edit',
    [
      'uses'=>'CentroController@CentroUpdate',
      'as'=>'centro.update',

    ]
  );

});

Route::group(['prefix'=>'usuario','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'UsuarioController@getUsuarioIndex',
      'as'=>'usuario.index'
    ]
  );
  Route::get('clientes', [
      'uses'=>'UsuarioController@getUsuarioIndexClientes',
      'as'=>'usuario.clientes'
    ]
  );
  Route::get('create',
    [
      'uses'=>'UsuarioController@getUsuarioCreate',
      'as'=>'usuario.create',

    ]
  );
  Route::post('create',
    [
      'uses'=>'UsuarioController@UsuarioCreate',
      'as'=>'usuario.create',

    ]
  );
  Route::get('edit/{id}',
    [
      'uses'=>'UsuarioController@getUsuarioEdit',
      'as'=>'usuario.edit',
    ]
  );
  Route::post('edit',
    [
      'uses'=>'UsuarioController@UsuarioUpdate',
      'as'=>'usuario.update',

    ]
  );
  Route::get('password', [
      'uses'=>'UsuarioController@getUsuarioPassword',
      'as'=>'usuario.password'
    ]
  );
  Route::post('passUpdate',
    [
      'uses'=>'UsuarioController@PasswordUpdate',
      'as'=>'usuario.passUpdate',

    ]
  );

});


Route::group(['prefix'=>'materiales','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'MaterialController@getMaterialIndex',
      'as'=>'material.index'
    ]
  );

  Route::get('create',
    [
      'uses'=>'MaterialController@getMaterialCreate',
      'as'=>'material.create',
    ]
  );
  Route::post('create',
    [
      'uses'=>'MaterialController@MaterialCreate',
      'as'=>'material.create',

    ]
  );
  Route::get('edit/{id}',
    [
      'uses'=>'MaterialController@getMaterialEdit',
      'as'=>'material.edit',
    ]
  );
  Route::post('edit',
    [
      'uses'=>'MaterialController@MaterialUpdate',
      'as'=>'material.update',
    ]
  );

});


Route::group(['prefix'=>'cupones','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'CuponController@getCuponIndex',
      'as'=>'cupon.index'
    ]
  );

  Route::get('create',
    [
      'uses'=>'CuponController@getCuponCreate',
      'as'=>'cupon.create',
    ]
  );
  // Route::post('create',
  //   [
  //     'uses'=>'MaterialController@MaterialCreate',
  //     'as'=>'material.create',
  //
  //   ]
  // );
  // Route::get('edit/{id}',
  //   [
  //     'uses'=>'MaterialController@getMaterialEdit',
  //     'as'=>'material.edit',
  //   ]
  // );
  // Route::post('edit',
  //   [
  //     'uses'=>'MaterialController@MaterialUpdate',
  //     'as'=>'material.update',
  //   ]
  // );

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
