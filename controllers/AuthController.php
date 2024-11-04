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

    public function doLogin(array $request)
    {
        $message = 'identifants incorrect ...';
        $auth = App::getAut();
        if (!empty($request[0])) {
            $username = $_POST['username'];
            $password = $_POST['pwd'];
            $login = $auth->login($username, $password);
            if ($login) {
                return Renderer::make('Home/index', compact('login'));
            } else {
                return Renderer::make('Auth/index', compact('message'));
            }
        }
    }

    public function singin(): Renderer
    {
        return Renderer::make('Auth/singin', []);
    }

    public function register(array $request): Renderer
    {
        $auth = App::getAut();
        $message = 'Inscription réussit !';
        if (!empty($request[0])) {
            $user = new Users();
            $user->setUsername($request[0]['username']);
            $user->setPassword($request[0]['pwd']);
            $user->addUser();
            $login = $auth->login($request[0]['username'], $request[0]['pwd']);
            return Renderer::make('Home/index', compact('message', 'login'));
        }
    }
}
