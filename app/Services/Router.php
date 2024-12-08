<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-09
 * Time: 17:12
 */

namespace App\Services;


class Router
{
    // private array $routes = [];
    private $routes = [];

    public function __construct()
    {
        echo "Router initialized";
    }

    /**
     * Add a route to the system.
     *
     * @param string $path The path to match (e.g., "home").
     * @param string $action The action (e.g., "HomeController@index").
     */
    public function add(string $path, string $action): void
    {
        $this->routes[$path] = $action;
    }

    /**
     * Dispatch the request to the appropriate controller and method.
     *
     * @param string $path The requested path (e.g., "home").
     */
    public function dispatch(string $path): void
    {
        if (!isset($this->routes[$path])) {
            http_response_code(404);
            echo "404 - Page not found";
            return;
        }

        [$controller, $method] = explode('@', $this->routes[$path]);
        $controllerClass = "App\\Controllers\\$controller";

        if (!class_exists($controllerClass)) {
            echo "Class $controllerClass not found.";
            return;
        }

        if (!method_exists($controllerClass, $method)) {
            echo "Method $method not found in $controllerClass.";
            return;
        }

        $controllerInstance = new $controllerClass();
        $controllerInstance->$method();
    }

}
