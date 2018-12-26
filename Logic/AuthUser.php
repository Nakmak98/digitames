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

    public function logout() {
        session_abort();
        $dbconn = \Db::getConnection();
        $sql = "UPDATE gamesite.user_data SET gamesite.user_data.session_id = ''
                WHERE gamesite.user_data.session_id = '$this->sessid'";
        $dbconn->query($sql);
        if (isset($_COOKIE['sessid'])) {
            unset($_COOKIE['sessid']);
            setcookie('sessid', '', time() - 3600, '/'); // empty value and old timestamp
        }
        if (isset($_COOKIE['PHPSESSID'])) {
            unset($_COOKIE['PHPSESSID']);
            setcookie('PHPSESSID', '', time() - 3600, '/'); // empty value and old timestamp
        }
    }
}