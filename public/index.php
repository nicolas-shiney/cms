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

define('BASE_DIR', dirname(__DIR__)); // Base directory of the project
define('CONFIG_DIR', dirname(__DIR__) . '/configs');

//$view = new BaseView(BASE_DIR);

$router = new Router();

$router->add('home', 'HomeController@index');
$router->add('post', 'PostController@index');
$router->add('gallery', 'GalleryController@index');
$router->add('contact', 'ContactController@index');
$router->add('about', 'AboutController@index');
$router->add('404', 'ErrorController@index');
$router->add('post/{id}', 'PostController@show');
$router->add('user/{username}', 'UserController@profile');


// Handle 404 for unmatched routes
$requestedPage = $_GET['page'] ?? 'home';

if (!$router->has($requestedPage)) {
    $router->dispatch('404');
} else {
    $router->dispatch($requestedPage);
}


