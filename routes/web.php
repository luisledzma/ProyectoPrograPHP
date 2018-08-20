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

// Route::get('/','PrincipalController@getIndex'
// )->name('pr.index');

Route::get('', [
    'uses'=>'PrincipalController@getIndex',
    'as'=>'pr.index'
  ]
);

Route::get('registro',
[
  'uses'=>'PrincipalController@getRegistro',
  'as'=>'pr.registro'
]);

Route::group(['prefix'=>'centro','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'CentroController@getCentroIndex',
      'as'=>'centro.index',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::get('registro', [
      'uses'=>'CentroController@getRegistroCanjes',
      'as'=>'centro.registroCanjes'
    ]
  );
  Route::get('create',
    [
      'uses'=>'CentroController@getCentroCreate',
      'as'=>'centro.create',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::get('createCanje',
    [
      'uses'=>'CentroController@getCreateCanje',
      'as'=>'centro.canje',

    ]
  );

  Route::post('miCanje',
    [
      'uses'=>'CentroController@ValidaUsuarioCanje',
      'as'=>'centro.miCanje',

    ]
  );

  Route::post('miDet',
    [
      'uses'=>'CentroController@CreateDetalle',
      'as'=>'centro.miDet',

    ]
  );
  Route::get('dCanjeTemp',
    [
      'uses'=>'CentroController@RegresarCanje',
      'as'=>'centro.regresarCanje',

    ]
  );
  Route::get('saveCanje',
    [
      'uses'=>'CentroController@GuardarMiCanje',
      'as'=>'centro.saveCanje',

    ]
  );
  Route::post('create',
    [
      'uses'=>'CentroController@ctCentroCreate',
      'as'=>'centro.create',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::post('createCanje',
    [
      'uses'=>'CentroController@canjeCreate',
      'as'=>'centro.canje',

    ]
  );
  Route::get('edit/{id}',
    [
      'uses'=>'CentroController@getCentroEdit',
      'as'=>'centro.edit',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::post('edit',
    [
      'uses'=>'CentroController@CentroUpdate',
      'as'=>'centro.update',
      'middleware'=>'can:mant-admin'
    ]
  );

});

Route::group(['prefix'=>'usuario','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'UsuarioController@getUsuarioIndex',
      'as'=>'usuario.index',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::get('clientes', [
      'uses'=>'UsuarioController@getUsuarioIndexClientes',
      'as'=>'usuario.clientes',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::get('create',
    [
      'uses'=>'UsuarioController@getUsuarioCreate',
      'as'=>'usuario.create',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::post('create',
    [
      'uses'=>'UsuarioController@UsuarioCreate',
      'as'=>'usuario.create',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::get('edit/{id}',
    [
      'uses'=>'UsuarioController@getUsuarioEdit',
      'as'=>'usuario.edit',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::post('edit',
    [
      'uses'=>'UsuarioController@UsuarioUpdate',
      'as'=>'usuario.update',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::get('password', [
      'uses'=>'UsuarioController@getUsuarioPassword',
      'as'=>'usuario.password',

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
      'as'=>'material.index',
      'middleware'=>'can:mant-admin'
    ]
  );

  Route::get('create',
    [
      'uses'=>'MaterialController@getMaterialCreate',
      'as'=>'material.create',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::post('create',
    [
      'uses'=>'MaterialController@MaterialCreate',
      'as'=>'material.create',
      'middleware'=>'can:mant-admin'

    ]
  );
  Route::get('edit/{id}',
    [
      'uses'=>'MaterialController@getMaterialEdit',
      'as'=>'material.edit',
      'middleware'=>'can:mant-admin'
    ]
  );
  Route::post('edit',
    [
      'uses'=>'MaterialController@MaterialUpdate',
      'as'=>'material.update',
      'middleware'=>'can:mant-admin'
    ]
  );

});


Route::group(['prefix'=>'cupones','middleware'=>'auth'], function(){
  Route::get('', [
      'uses'=>'CuponController@getCuponIndex',
      'as'=>'cupon.index',
      'middleware'=>'can:mant-admin'
    ]
  );

  Route::get('', [
      'uses'=>'CuponController@getCambiarCupon',
      'as'=>'cupon.cambiarCup',
      'middleware'=>'can:cliente-cupones'
    ]
  );

  Route::get('create',
    [
      'uses'=>'CuponController@getCuponCreate',
      'as'=>'cupon.create',
      'middleware'=>'can:mant-admin'
    ]
  );
   Route::post('create',
     [
       'uses'=>'CuponController@CuponCreate',
       'as'=>'cupon.create',
       'middleware'=>'can:mant-admin'

     ]
   );
   Route::post('cambiar',
     [
       'uses'=>'CuponController@CuponCambiar',
       'as'=>'cupon.cambiar',
       'middleware'=>'can:cliente-cupones'
     ]
   );
  Route::get('edit/{id}',
     [
       'uses'=>'CuponController@getCuponEdit',
       'as'=>'cupon.edit',
       'middleware'=>'can:mant-admin'
     ]
   );
   Route::get('detalle/{id}',
      [
        'uses'=>'CuponController@getCuponDet',
        'as'=>'cupon.detalle',
        'middleware'=>'can:mant-admin'
      ]
    );
   Route::post('edit',
     [
       'uses'=>'CuponController@CuponUpdate',
       'as'=>'cupon.update',
       'middleware'=>'can:mant-admin'
     ]
   );

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
