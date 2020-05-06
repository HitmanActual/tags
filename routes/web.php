<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/tags/v1','Api\v1\TagController@index');
$router->post('/tags/v1','Api\v1\TagController@store');
$router->get('/tags/v1/{tag}','Api\v1\TagController@show');
$router->put('/tags/v1/{tag}','Api\v1\TagController@update');
$router->patch('/tags/v1/{tag}','Api\v1\TagController@update');
$router->delete('/tags/v1/{tag}','Api\v1\TagController@destroy');