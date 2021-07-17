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

// if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '10.0.0.104'){
//     Route::get('/', function () {
//         return redirect(route('login.login'));
//     });
// } else {
//     Route::get('/', function () {
//         return redirect('https://financeiro.profracosta.com.br/login');
//     });
// }

Route::get('/', function () {
    // return redirect(route('login.login'));
    return view('links');
});
    

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/app', function () {
    return view('app.index');
});

// sem autenticar
Route::post('/login', 'Auth\LoginController@login')->name('login.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('login.logout');
Route::get('/inserir', 'PagamentosController@inserir')->name('pagamentos.inserir');
Route::get('/saques', 'SaquesController@inserir')->name('saques.inserir');
Route::post('/saques-salvar', 'SaquesController@salvar')->name('saques.salvar');
Route::post('/salvar', 'PagamentosController@salvar')->name('pagamentos.salvar');

Route::prefix('home')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
   
});

// autenticados
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::prefix('bancos')->group(function () {
        Route::get('/', 'BancosController@index')->name('bancos.index');
        Route::get('/create', 'BancosController@create')->name('bancos.create');
        Route::post('/store', 'BancosController@store')->name('bancos.store');
        Route::get('/{id}/edit', 'BancosController@edit')->name('bancos.edit');
        Route::put('/update', 'BancosController@update')->name('bancos.update');
    });

    Route::prefix('categorias')->group(function () {
        Route::get('/', 'CategoriasController@index')->name('categorias.index');
        Route::get('/create', 'CategoriasController@create')->name('categorias.create');
        Route::post('/store', 'CategoriasController@store')->name('categorias.store');
        Route::get('/{id}/edit', 'CategoriasController@edit')->name('categorias.edit');
        Route::put('/update', 'CategoriasController@update')->name('categorias.update');
    });

    Route::prefix('forma-pagamentos')->group(function () {
        Route::get('/', 'FormaPagamentosController@index')->name('forma_pagamentos.index');
        Route::get('/create', 'FormaPagamentosController@create')->name('forma_pagamentos.create');
        Route::post('/store', 'FormaPagamentosController@store')->name('forma_pagamentos.store');
        Route::get('/{id}/edit', 'FormaPagamentosController@edit')->name('forma_pagamentos.edit');
        Route::put('/update', 'FormaPagamentosController@update')->name('forma_pagamentos.update');
    });
    
    Route::prefix('pagamentos')->group(function () {
        Route::get('/', 'PagamentosController@index')->name('pagamentos.index');
        Route::post('/filter', 'PagamentosController@filter')->name('pagamentos.filter');
        Route::get('/create', 'PagamentosController@create')->name('pagamentos.create');
        Route::post('/store', 'PagamentosController@store')->name('pagamentos.store');
        Route::get('/exportar', 'PagamentosController@exportar')->name('pagamentos.exportar');
        Route::post('/exec-exportar', 'PagamentosController@execExportar')->name('pagamentos.exec-exportar');
    });

});

