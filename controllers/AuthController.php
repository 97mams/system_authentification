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

    public function doLogin(array $request): Renderer
    {
        $message = 'identifants incorrect ...';
        if (!empty($request[0])) {
            $user = new Users();
            $user->setUsername($request[0]['username']);
            $user->setPassword($request[0]['pwd']);
            $user->addUser();
            header('location:/home');
        }
        return Renderer::make('Auth/index', compact('message'));
    }

    public function singin(): Renderer
    {
        return Renderer::make('Auth/singin', []);
    }

    public function register(array $request): Renderer
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
