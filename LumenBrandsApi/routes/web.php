<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/brands', 'BrandController@index');
$router->post('/brands', 'BrandController@store');
$router->get('/brands/{id}', 'BrandController@show');
$router->put('/brands/{id}', 'BrandController@update');
$router->patch('/brands/{id}', 'BrandController@update');
$router->delete('/brands/{id}', 'BrandController@destroy');
