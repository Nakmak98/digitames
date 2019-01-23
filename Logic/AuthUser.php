<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:47
 */

namespace Logic;
require_once 'Manager.php';

class AuthUser extends User {
    protected $sessid;
    protected $user_id;
    public $nickname;
    public $age;
    public $region;
    public $role;

    function __construct() {
        $this->sessid = $_COOKIE['sessid'];
        $user_data = $this->getUserData();
        $this->nickname = $user_data['nickname'];
        $this->age = $user_data['age'];
        $this->region = $user_data['region'];
        $this->user_id = $user_data['user_id'];
    }

    private function getUserData() {
        $manager = new Manager();
        $sql = "SELECT * FROM gamesite.user_data WHERE session_id=?";
        $param_arr[] = "s";
        $param_arr[] = &$this->sessid;
        return $manager->getPreparedAssocResult($sql,$param_arr);
    }

    function shortName() {
        //  TODO: Implement shortName() method.
    }

    public function logout() {
        session_abort();
        $manager = new Manager();
        $sql = "UPDATE gamesite.user_data SET gamesite.user_data.session_id = ''
                WHERE gamesite.user_data.session_id = ?";
        $param_arr[] = "s";
        $param_arr[] = &$this->sessid;
        $manager->getPreparedResult($sql, $param_arr);
        if (isset($_COOKIE['sessid'])) {
            unset($_COOKIE['sessid']);
            setcookie('sessid', '', time() - 3600, '/');
        }
        if (isset($_COOKIE['PHPSESSID'])) {
            unset($_COOKIE['PHPSESSID']);
            setcookie('PHPSESSID', '', time() - 3600, '/');
        }
    }
}