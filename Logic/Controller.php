<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 29.11.2018
 * Time: 22:54
 */
namespace Logic;
use Logic\Locolizer\Locolizer;

require_once  'User.php';
require_once 'Locolizer/Locolizer.php';

class Controller {
    protected $container;
    public $user;
    protected $db;
    protected $context;
    protected $locolizer;

    function __construct($container) {
        $this->container = $container;
        $isAuth = isset($_COOKIE['sessid']) ? true : false;
        $this->user = User::getInstance($isAuth);
        $this->context['user'] = $this->user;
        if (isset($_COOKIE['locale']))
            $this->context['locale'] = $_COOKIE['locale'];
        else {
            $this->context['locale'] = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        }

    }
}
