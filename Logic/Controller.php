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
        $this->context['base']= Locolizer::getBaseContext();
        $isAuth = isset($_COOKIE['sessid']) ? true : false;
        $this->user = User::getInstance($isAuth);
        $this->context['user'] = $this->user;
    }
}
