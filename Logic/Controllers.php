<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 29.11.2018
 * Time: 22:54
 */

require_once('Manager.php');

class Controller {
    protected $container;
    protected $sessid;
    public $user;
    protected $db;
    protected $context;

    function __construct($container) {
        $this->container = $container;
        $isAuth = isset($_COOKIE['sessid']) ? true : false;
        $this->user = \Logic\User::getInstance($isAuth);
        $this->context['user'] = $this->user;
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
        if ($user) {
            $auth->login();
            return $this->container['view']->render($response, 'profile.php');
        }
        return $this->container['view']->render($response, 'login.php', [
            'error' => 'Неверный логин / пароль',
        ]);
    }

    function logout($request, $response, $args) {
        $auth = AuthenticateUser::getInstance($_POST);
        $user = $auth->logout();
        return $this->container['view']->render($response, 'home.php');
    }
}

class HomePageController extends Controller {
    static $getFeatured = "SELECT * FROM `game_project` WHERE is_featured = 1";
    static $getTableView = "SELECT * FROM `game_project`";

    function getHomePage($request, $response, $args) {
        $manager = new Manager();
        $feature_result = $manager->getResult(self::$getFeatured);
        $tableview_result = $manager->getResult(self::$getTableView);
        $feature_list = $feature_result->fetch_all(MYSQLI_ASSOC);
        $this->context['featured'] = $feature_list;
        $this->context['featured_num_rows'] = $feature_result->num_rows - 1;
        $this->context['tableview'] = $tableview_result;
        return $this->container['view']->render($response, 'home.html', $this->context);
    }
}
