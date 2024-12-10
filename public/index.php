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
$router->add('gallery', 'GalleryController@index');
$router->add('contact', 'ContactController@index');
$router->add('about', 'AboutController@index');
$router->add('404', 'ErrorController@notFound');
$router->add('post/{id}', 'PostController@show');
$router->add('user/{username}', 'UserController@profile');


// Handle 404 for unmatched routes
$requestedPage = $_GET['page'] ?? 'home';
$router->dispatch($requestedPage);
