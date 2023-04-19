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

$router->get('/cities', 'CityController@index');
$router->post('/cities', 'CityController@store');
$router->get('/cities/{id}', 'CityController@show');
$router->put('/cities/{id}', 'CityController@update');
$router->patch('/cities/{id}', 'CityController@update');
$router->delete('/cities/{id}', 'CityController@destroy');
