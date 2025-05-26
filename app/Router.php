<?php

namespace App;
use App\Http\Middlewares\Auth;
use App\Http\Middlewares\Guest;

class Router 
{
    protected array $routes = [];

    public function get(string $uri, string|array $controller)
    {
        return $this->addRoute('GET', $uri, $controller);
    }
    
    public function post(string $uri, string|array $controller)
    {
        return $this->addRoute('POST', $uri, $controller);
    }

    public function delete(string $uri, string|array $controller)
    {
        return $this->addRoute('DELETE', $uri, $controller);
    }

    public function put(string $uri, string|array $controller)
    {
        return $this->addRoute('PUT', $uri, $controller);
    }

    public function patch(string $uri, string|array $controller)
    {
        return $this->addRoute('PATCH', $uri, $controller);
    }

    public function only($state)
    {
        $lastIndex = array_key_last($this->routes);
        $this->routes[$lastIndex]['only'] = $state;
        return $this;
    }

    public function addRoute(string $method, string $uri, string|array $controller)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'uri' => trim($uri, '/'),
            'controller' => $controller,
            'only' => null
        ];

        return $this;
    }

    public function route(string $uri, string $method)
    {
        $uri = trim($uri, '/');
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                $controller = $route['controller'];

                if ($route['only'] == 'auth') {
                    Auth::access();
                }

                
                if ($route['only'] == 'guest') {
                    Guest::access();
                }

                if (is_array($controller)) {
                    [$class, $action] = $controller;
                    if (class_exists($class) && method_exists($class, $action)) {
                        return (new $class)->$action();
                    }
                }

                if (is_string($controller)) {
                    return require view($controller);
                }

                throw new \Exception("Invalid route handler.");
            }
        }

        http_response_code(404);
        exit("404 | page does not exist");
    }
}
