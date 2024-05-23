<?php

namespace routes;

class Routes
{
    private array $route;

    public function register(string $path, callable|array $action): void
    {
        $this->route[$path] = $action;
    }
}
