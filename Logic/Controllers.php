<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 29.11.2018
 * Time: 22:54
 */

class Controller {
    protected $container;
    protected $sessid;
    protected $user;
    protected $db;

    function __construct($container) {
        $this->container = $container;
        $isAuth = isset($_COOKIE['sessid']) ? true : false;
        $this->user = \Logic\User::getInstance($isAuth);
    }
}

class AuthController extends Controller {
    protected $login;
    protected $password;

    function getLoginForm($request, $response, $args) {
        $className = get_class($this->user);
        return $this->container['view']->render($response, 'login.php', [
            'test' => $className]);
    }

    function signIn($request, $response, $args) {
        $auth = AuthenticateUser::getInstance($_POST);
        $user = $auth->authenticate();
        if($user){
            $auth->login();
            return $this->container['view']->render($response, 'profile.php');
        }
        return $this->container['view']->render($response, 'error.php', [
        ]);
    }

    function logout($request, $response, $args){
        $auth = AuthenticateUser::getInstance($_POST);
        $user = $auth->logout();
        //TODO пернаправить на шаблон стартовой страницы
        return $this->container['view']->render($response, 'home.php');
    }
}
