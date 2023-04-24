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

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /*
        Routes for brands
    */

    $router->get('/brands', 'BrandController@index');
    $router->post('/brands', 'BrandController@store');
    $router->get('/brands/{id}', 'BrandController@show');
    $router->put('/brands/{id}', 'BrandController@update');
    $router->patch('/brands/{id}', 'BrandController@update');
    $router->delete('/brands/{id}', 'BrandController@destroy');

    /*
        Routes for cities
    */

    $router->get('/cities', 'CityController@index');
    $router->post('/cities', 'CityController@store');
    $router->get('/cities/{id}', 'CityController@show');
    $router->put('/cities/{id}', 'CityController@update');
    $router->patch('/cities/{id}', 'CityController@update');
    $router->delete('/cities/{id}', 'CityController@destroy');

    /*
        Routes for cars
    */

    $router->get('/cars', 'CarController@index');
    $router->post('/cars', 'CarController@store');
    $router->get('/cars/{id}', 'CarController@show');
    $router->put('/cars/{id}', 'CarController@update');
    $router->patch('/cars/{id}', 'CarController@update');
    $router->delete('/cars/{id}', 'CarController@destroy');
});