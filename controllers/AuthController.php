<?php

namespace controllers;

use App\Renderer;
use GuzzleHttp\Psr7\Header;
use models\Users;
use models\App;

class AuthController
{

    private $renderer;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->renderer->addPath('Auth', BASE_VIEW_PATH);
    }

    public function login()
    {
        return $this->renderer->render('@Auth/index');
    }

    public function doLogin()
    {
        $message = 'identifants incorrect ...';
        $auth = App::getAut();
        $username = $_POST['username'];
        $password = $_POST['pwd'];

        $login = $auth->login($username, $password);
        if ($login) {
            $name = "connect/" . $login->username;
            Header("Location:http://localhost:3000/" . $name);
            exit();
        } else {
            return $this->renderer->render('@Auth/index');
        }
    }

    public function singin()
    {
        return $this->renderer->render('@Auth/singin');
    }

    public function register()
    {
        $auth = App::getAut();
        $message = 'Inscription réussit !';
        $user = new Users();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['pwd']);
        if ($user->addUser()) {
            $login = $auth->login($_POST['username'], $_POST['pwd']);
            $name = $login->username;
            Header("Location:/connect/" . $name);
        }
    }
}
