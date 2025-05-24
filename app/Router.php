<?php

namespace App;
use App\Http\Middlewares\Guest;
use App\Http\Middlewares\Auth;

class Router 
{
    protected array $routes = [];

    public function get( string $uri, string $controller ) {
        return $this->addRoute('GET', $uri, $controller);
    }


    public function only( $state ) {
     $lastIndex = array_key_last($this->routes);
        $this->routes[$lastIndex]['only'] = $state;
        return $this;
    }

    public function addRoute( string $method, string $uri, string $controller ) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri,
            'controller' => $controller,
            'only' => null
        ];

        return $this;
    }

    public function route (string $uri, string $method ) {
        foreach ( $this->routes as $route ) {

            if ($route['only'] === 'guest') {
                Auth::access();
            }

            if ($route['only'] === 'auth') {
                Guest::access();
            }

            if ( $route['uri'] === $uri && $route['method'] === $method ) {
                return require basePath($route['controller']);
            }

        }
        http_response_code(404);
        exit("404 | page does not exist");
    }
}