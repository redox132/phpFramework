<?php

namespace App;

use App\Http\Middlewares\Guest;
use App\Http\Middlewares\Auth;

class Router 
{
    protected array $routes = [];

    public function get(string $uri, string $controller)
    {
        return $this->addRoute('GET', $uri, $controller);
    }
    
    public function post(string $uri, string $controller)
    {
        return $this->addRoute('POST', $uri, $controller);
    }

      public function delete(string $uri, string $controller)
    {
        return $this->addRoute('DELETE', $uri, $controller);
    }

    public function only($state)
    {
        $lastIndex = array_key_last($this->routes);
        $this->routes[$lastIndex]['only'] = $state;
        return $this;
    }

    public function addRoute(string $method, string $uri, string $controller)
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

                // Apply middleware *only after matching the route*
                if ($route['only'] === 'auth') {
                    Auth::access(); // Require login
                }

                if ($route['only'] === 'guest') {
                    Guest::access(); // Block if already logged in
                }

                return require basePath($route['controller']);
            }
        }

        http_response_code(404);
        exit("404 | page does not exist");
    }
}
