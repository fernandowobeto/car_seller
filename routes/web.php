<?php

Route::get('/', 'IndexController@home')->name('home');
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@login_action')->name('login_action');

Route::middleware('auth')->group(function () {
   Route::get('/logout', 'LoginController@logout')->name('logout');

   Route::namespace('Perfil')->prefix('perfil')->name('perfil.')->group(function(){
      Route::get('/', 'PerfilController@index')->name('perfil');
      Route::post('update', 'PerfilController@update')->name('update');

      Route::get('/veiculo/add', 'PerfilController@veiculo_add')->name('veiculo.add');
      Route::post('/veiculo/add', 'PerfilController@veiculo_add')->name('veiculo.save');
      Route::get('/veiculos', 'PerfilController@veiculos')->name('veiculos');
      Route::get('/mensagens', 'PerfilController@mensagens')->name('mensagens');

      Route::middleware('auth.admin')->group(function () {
         Route::get('/localizacoes', 'LocalizacaoController@index')->name('localizacoes');
         Route::get('/localizacoes/form/{id?}', 'LocalizacaoController@form')
            ->name('localizacao.form')
            ->where('id', '[0-9]+');
         Route::post('/localizacoes/create', 'LocalizacaoController@create')->name('localizacao.create');
         Route::post('/localizacoes/update/{id}', 'LocalizacaoController@update')
            ->name('localizacao.update')
            ->where('id', '[0-9]+');

         Route::get('/marcas', 'MarcaController@index')->name('marcas');
         Route::get('/marcas/form/{id?}', 'MarcaController@form')
            ->name('marca.form')
            ->where('id', '[0-9]+');
         Route::post('/marcas/create', 'MarcaController@create')->name('marca.create');
         Route::post('/marcas/update/{id}', 'MarcaController@update')
            ->name('marca.update')
            ->where('id', '[0-9]+');

         Route::get('/modelos', 'ModeloController@index')->name('modelos');
         Route::get('/modelos/form/{id?}', 'ModeloController@form')
            ->name('modelo.form')
            ->where('id', '[0-9]+');
         Route::post('/modelos/create', 'ModeloController@create')->name('modelo.create');
         Route::post('/modelos/update/{id}', 'ModeloController@update')
            ->name('modelo.update')
            ->where('id', '[0-9]+');

         Route::get('/combustiveis', 'CombustivelController@index')->name('combustiveis');
         Route::get('/combustiveis/form/{id?}', 'CombustivelController@form')
            ->name('combustivel.form')
            ->where('id', '[0-9]+');
         Route::post('/combustiveis/create', 'CombustivelController@create')->name('combustivel.create');
         Route::post('/combustiveis/update/{id}', 'CombustivelController@update')
            ->name('combustivel.update')
            ->where('id', '[0-9]+');
      });
   });
});

