<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// use app\Http\Controllers\Author\AuthorController;

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

// $router->get('/authors', [AuthorController::class, 'index']);

$router->get('/authors', 'Author\AuthorController@index');
$router->post('/authors/store', 'Author\AuthorController@store');
$router->get('/authors/{author}', 'Author\AuthorController@show');
$router->put('/authors/update/{author}', 'Author\AuthorController@update');
// $router->patch('/authors/{author}', 'AuthorController@update');
$router->delete('/authors/delete/{author}', 'Author\AuthorController@destroy');