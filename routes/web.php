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

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * Usuarios routes
     */
    $router->get('/usuarios', 'UsuarioController@index');
    $router->post('/usuarios', 'UsuarioController@store');
    $router->get('/usuarios/{usuario}', 'UsuarioController@show');
    $router->put('/usuarios/{usuario}', 'UsuarioController@update');
    $router->patch('/usuarios/{usuario}', 'UsuarioController@update');
    $router->delete('/usuarios/{usuario}', 'UsuarioController@destroy');

    /**
     * Tareas routes
     */
    $router->get('/tareas', 'TareaController@index');
    $router->post('/tareas', 'TareaController@store');
    $router->get('/tareas/{tarea}', 'TareaController@show');
    $router->put('/tareas/{tarea}', 'TareaController@update');
    $router->patch('/tareas/{tarea}', 'TareaController@update');
    $router->delete('/tareas/{tarea}', 'TareaController@destroy');

    /**
     * Users Login routes
     */
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->patch('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy');
});

/**
 * ruta protec para usuarios logueados
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/users/me', 'UserController@me');
});