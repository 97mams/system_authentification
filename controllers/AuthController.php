<?php

namespace controllers;

use App\Renderer;
use models\Users;

class AuthController
{
    public function login(): Renderer
    {
        return Renderer::make('Auth/index', []);
    }

    public function singin(): Renderer
    {
        return Renderer::make('Auth/singin', []);
    }

    public function store(array $request): Renderer
    {
        $message = 'Inscription réussit !';
        if (!empty($request[0])) {
            $user = new Users();
            $user->setUsername($request[0]['username']);
            $user->setPassword($request[0]['pwd']);
            $user->addUser();
            return Renderer::make('Auth/singin', compact('message'));
        }
    }
}
