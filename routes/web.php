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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');
});

$router->group(['prefix' => 'api/todonotes'], function () use ($router) {
      // $router->get('index', 'TodoController@index');
      $router->get('todonotes', 'TodoController@index');
      $router->post('add-todo', 'TodoController@create');
      $router->put('update-todo/{id}', 'TodoController@update');
      $router->delete('remove-todo/{id}', 'TodoController@remove');
      $router->put('change-completion-status/{id}', 'TodoController@completion');
});
