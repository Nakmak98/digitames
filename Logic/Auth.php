<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 28.11.2018
 * Time: 22:16
 */

namespace Logic;
require_once 'Db/Db.php';
require_once 'BasicAuth.php';

abstract class Auth {

    function __construct() {
    }

    static function getInstance($params) {
        return new BasicAuth($params);
    }

    abstract function authenticate();

    abstract function login();
}

