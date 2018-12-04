<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:47
 */

namespace Logic;
require_once 'Db/Db.php';

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