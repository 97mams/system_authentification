<?php

namespace routes;

use Exception;

class Router
{
    private array $route;

    /**
     * @param string $path
     * @param callable | [] $action
     * @return void
     */
    public function register(string $path, callable|array $action): void
    {
        $this->route[$path] = $action;
    }

    /**
     * @param string $uri
     * @return mixed
     */
    public function resoleve(string $uri): mixed
    {
        $path = explode("?", $uri)[0];
        $action = $this->route[$path] ?? null;

        if (is_callable($action)) {
            return $action;
        }

        if (is_array($action)) {
            [$className, $methodName] = $action;
            if (class_exists($className) && method_exists($className, $methodName)) {
                $class = new $className();
                return call_user_func_array([$class, $methodName], []);
            }
        }
        throw new Exception('route not found !!');
    }
}
