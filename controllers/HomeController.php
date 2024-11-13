<?php

namespace controllers;

use App\Renderer;

class HomeController
{
    private $renderer;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->renderer->addPath('Home', BASE_VIEW_PATH);
    }

    public function index()
    {
        return $this->renderer->render('@Home/index');
    }

    public function home($name)
    {
        return $this->renderer->render('@Home/connected');
    }
}
