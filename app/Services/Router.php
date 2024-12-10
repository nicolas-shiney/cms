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

    /** Check if a route exists. */
    public function has(string $path): bool
    {
        return array_key_exists($path, $this->routes);
    }

    /**
     * Dispatch the request to the appropriate controller and method.
     */
    public function dispatch(string $path, array $extraData = []): void
    {
        // Prevent infinite loop if '404' route is missing or misconfigured
        if ($path === '404' && !array_key_exists('404', $this->routes)) {
            http_response_code(404);
            echo "404 - Route not configured";
            return;
        }

        // Match the route
        foreach ($this->routes as $route => $action) {
            if ($route === $path) {
                [$controller, $method] = explode('@', $action);
                $controllerClass = "App\\Controllers\\$controller";

                if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                    $controllerInstance = new $controllerClass();
                    $controllerInstance->$method($extraData);
                    return;
                }

                // If controller or method doesn't exist, call 404
                http_response_code(404);
                if ($path !== '404') { // Avoid looping back to 404
                    $this->dispatch('404');
                }
                return;
            }
        }

        // If no route matches, call 404
        http_response_code(404);
        if ($path !== '404') { // Avoid looping back to 404
            $this->dispatch('404');
        }
    }


}
