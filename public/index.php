<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */

require '../vendor/autoload.php';

use App\Services\Router;

if (class_exists(Router::class)) {
    echo "Router class loaded successfully!";
} else {
    echo "Router class not found!";
}

// Initialize the router
$router = new Router();

// Register routes
$router->add('home', 'HomeController@index');
$router->add('about', 'AboutController@index');

// Get the requested path (default to "home")
$requestedPath = $_GET['page'] ?? 'home';

// Dispatch the request
$router->dispatch($requestedPath);
