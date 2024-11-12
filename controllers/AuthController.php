<?php

namespace controllers;

use App\Renderer;
use models\Users;
use models\App;
use Psr\Http\Message\ServerRequestInterface;

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
        // return $this->renderer->render('@Auth/index');
        $message = 'identifants incorrect ...';
        $auth = App::getAut();
        // $body = $request->getBody();
        // if (!empty($body)) {
        $username = $_POST['username'];
        $password = $_POST['pwd'];

        $login = $auth->login($username, $password);
        dump($login);
        // if ($login) {
        //     return Renderer::make('Home/index', compact('login'));
        // } else {
        //     return Renderer::make('Auth/index', compact('message'));
        // }
        // }
    }

    public function singin()
    {
        return $this->renderer->render('@Auth/singin');
    }

    public function register(array $request)
    {
        $auth = App::getAut();
        $message = 'Inscription réussit !';
        if (!empty($request[0])) {
            $user = new Users();
            $user->setUsername($request[0]['username']);
            $user->setPassword($request[0]['pwd']);
            $user->addUser();
            $login = $auth->login($request[0]['username'], $request[0]['pwd']);
        }
    }
}
