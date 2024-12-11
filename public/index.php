<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:15
 */

require '../vendor/autoload.php';

use App\Services\Router;
use App\Services\Database;

define('BASE_DIR', dirname(__DIR__)); // Base directory of the project
define('CONFIG_DIR', dirname(__DIR__) . '/configs');

$db = new Database('../configs/database.dev.yaml');

// Test query
$users = $db->fetchAll("SELECT * FROM users");


$router = new Router();

$router->add('home', 'HomeController@index');
$router->add('post', 'PostController@index');
$router->add('gallery', 'GalleryController@index');
$router->add('contact', 'ContactController@index');
$router->add('about', 'AboutController@index');

$router->add('404', 'ErrorController@index');

$router->add('post/{id}', 'PostController@show');
$router->add('user/{username}', 'UserController@profile');

$router->add('admin', 'AdminController@index');
$router->add('admin_users', 'AdminUsersController@index');
$router->add('user_add', 'AdminUsersController@add');
$router->add('user_update', 'AdminUsersController@update');




// Handle 404 for unmatched routes
$requestedPage = $_GET['page'] ?? 'home';

if (!$router->has($requestedPage)) {
    $router->dispatch('404');
} else {
    $router->dispatch($requestedPage);
}


