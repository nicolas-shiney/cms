<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */

require '../vendor/autoload.php';

// Initialize the router
use App\Services\Router;

$router = new Router();

$router->add('home', 'HomeController@index');
$router->add('post', 'PostController@index');
$router->add('galery', 'GaleryController@index');
$router->add('contact', 'ContactController@index');
$router->add('about', 'AboutController@index');


$router->add('post/{id}', 'PostController@show');
$router->add('user/{username}', 'UserController@profile');



// Get the requested path (default to "home")
$requestedPage = $_GET['page'] ?? 'home';
$router->dispatch($requestedPage, ['currentPage' => $requestedPage]);
