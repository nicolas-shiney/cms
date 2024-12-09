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
$router->add('about', 'AboutController@index');
$router->add('contact', 'ContactController@index');


// Get the requested path (default to "home")
$requestedPath = $_GET['page'] ?? 'home';
$router->dispatch($requestedPath);
