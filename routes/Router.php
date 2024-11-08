<?php

namespace Route;

use Exception;

class Router
{

    private $routes = [];
    private $url;
    private $namedRoute = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get(string $path, callable | array $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post(string $path, callable | array $callable,  $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    public function add(string $path, callable | array $callable, string | null $name, string $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if ($name) {
            $this->namedRoute[$name] = $route;
        }
        return $route;
    }

    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new \Exception('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        throw new Exception("No matching routes");
    }

    public function url(string $name, array $params = [])
    {
        if (!isset($this->namedRoute[$name])) {
            throw new \Exception('No route matches this name');
        }
        return $this->namedRoute[$name]->getUrl($params);
    }
}
