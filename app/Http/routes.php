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

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});


Route::group(['prefix' => 'cadastrar/pessoa'], function () {
    Route::get('/fisica', function ()    {
        return View::make('formCadPessoaFisica');

    });


    Route::get('/juridica',function(){
    	return View::make('formCadPessoaJuridica');
    });

     Route::post('cadastraPessoaFisica', 'pessoaFisicaController@insert');

      Route::post('cadastraPessoaJuridica', 'PessoaJuridicaController@insert');
   
});

Route::group(['prefix' => 'ver/pessoa'], function () {
	Route::get('/fisica','pessoaFisicaController@selectAll');
	Route::get('/fisica/detalhes/{idPessoa}','pessoaFisicaController@showDetails');
	Route::get('/fisica/detalhes/mail/{idPessoa}',function($idPessoa){
		return View::make('formPessoaFisicaEmail',['idPessoa'=>$idPessoa]);
	});
	Route::post('fisica/detalhes/mail/submit','pessoaFisicaController@insertEmail');
});
   


