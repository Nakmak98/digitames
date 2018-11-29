<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 27.11.2018
 * Time: 23:43
 */

namespace Logic;


abstract class User {
    protected $sessid;
    protected $user_id;
    protected $nickname;
    protected $age;
    protected $region;
    protected $role;

    static function getInstance($userIsAuth) {
        if ($userIsAuth) {
            return new AuthUser();
        }
        return new AnonymousUser();
    }

    abstract function shortName();
}

class AnonymousUser extends User {
    function shortName() {
        // TODO: Implement shortName() method.
    }
}

class AuthUser extends User {

    function __construct() {
        $this->sessid = $_COOKIE['sessid'];
        $user_data = $this->getUserData();
        $this->nickname = $user_data['nickname'];
        $this->age = $user_data['age'];
        $this->region = $user_data['region'];
        $this->user_id = $user_data['user_id'];
    }

    private function getUserData() {
        $dbconn = \Db::getConnection();
        $result = $dbconn->query("SELECT * FROM gamesite.user_data WHERE session_id='$this->sessid'");
        return $result->fetch_assoc();
    }

    function shortName() {
        // TODO: Implement shortName() method.
    }
}