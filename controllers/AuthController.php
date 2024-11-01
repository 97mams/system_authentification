<?php

namespace controllers;

use App\Renderer;
use models\Users;
use models\App;


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
            $auth = App::getAut();
            $username = $_POST['username'];
            $password = $_POST['pwd'];
            $login = $auth->login($username, $password);
            if ($login) {
                return Renderer::make('Auth/index', compact('message'));
            }
        }
        header('location:/');
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
