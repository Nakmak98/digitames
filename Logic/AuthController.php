<?php /** @noinspection PhpUndefinedMethodInspection */
/** @noinspection ALL */

/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:20
 */

namespace Logic;
require_once 'AuthenticateUser.php';

class AuthController extends Controller {
    protected $login;
    protected $password;

    function getLoginForm($request, $response, $args) {
        return $this->container['view']->render($response, 'login.html');
    }

    function signIn($request, $response, $args) {
        $auth = AuthenticateUser::getInstance($_POST);
        $user = $auth->authenticate();
        if ($user) {
            $auth->login();
            return $this->container['view']->render($response, 'profile.html');
        }
        return $this->container['view']->render($response, 'login.html', [
            'error' => 'Неверный логин / пароль',
        ]);
    }

    function logout($request, $response, $args) {
        $auth = AuthenticateUser::getInstance($_POST);
        $auth->logout();
        return $this->container['view']->render($response, 'home.php');
    }
}