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

Route::get('/', 'PublicacaoController@getIndex');

Route::controller('publicacoes', 'PublicacaoController');

// Funções AJAX
Route::controller('ajax', 'AjaxController');

//Sign
Route::controller('sign', 'SignController');