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
$router->post('/category', 'CategoriesController@addCategory');
$router->put('/category', 'CategoriesController@updateCategory');
$router->get('/categories', 'CategoriesController@getCategories');
$router->post('post/create', 'PostsController@createPost');
$router->get('/postsbycategory/{category}', 'PostsController@getPostsByCategory');
$router->delete('delete/post/{id}', 'PostsController@deletePost');
