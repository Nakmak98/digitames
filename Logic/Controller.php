<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 29.11.2018
 * Time: 22:54
 */
namespace Logic;
require_once  'User.php';

class Controller {
    protected $container;
    public $user;
    protected $db;
    protected $context;

    function __construct($container) {
        $this->container = $container;
        $isAuth = isset($_COOKIE['sessid']) ? true : false;
        $this->user = User::getInstance($isAuth);
        $this->context['user'] = $this->user;
    }
}
