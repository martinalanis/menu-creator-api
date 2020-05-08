<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth'], function () {
  Route::post('login', 'LogInController');
  Route::post('logout', 'LogOutController');
});

Route::group(['middleware' => 'auth:api'], function () {
  Route::get('user', 'UserController@getActiveUser');
  Route::apiResource('provedores', 'ProvedorController');
  Route::apiResource('grupos', 'GrupoAlimentosController');
  Route::apiResource('categorias-recetas', 'CategoriaRecetasController');
  Route::apiResource('insumos', 'InsumoController');
  Route::get('insumos/verify/{clave}', 'InsumoController@verify');
});
