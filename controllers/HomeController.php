<?php

namespace controllers;

use App\Renderer;

class HomeController
{
    public function index(): Renderer
    {
        return Renderer::make('Home/index', []);
    }
}
