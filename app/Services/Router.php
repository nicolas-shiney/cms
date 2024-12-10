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
private $routes = [];

    /**
     * Add a route to the system.
     */
    public function add(string $path, string $action): void
    {
        $this->routes[$path] = $action;
    }

    /**
     * Dispatch the request to the appropriate controller and method.
     */
    public function dispatch(string $path): void
    {
        foreach ($this->routes as $route => $action) {
            $regex = preg_replace('/\{(\w+)\}/', '(\d+)', $route); // Convert {param} to regex
            $regex = '#^' . $regex . '$#'; // Add start and end anchors

            if (preg_match($regex, $path, $matches)) {
                array_shift($matches); // Remove the full match

                [$controller, $method] = explode('@', $action);
                $controllerClass = "App\\Controllers\\$controller";

                if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                    $controllerInstance = new $controllerClass();
                    call_user_func_array([$controllerInstance, $method], $matches);
                    return;
                }

                http_response_code(404);
                echo "Controller or method not found: $controllerClass@$method";
                return;
            }
        }

        http_response_code(404);
        echo "404 - Route not found";
    }
}
