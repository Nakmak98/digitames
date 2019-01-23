<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:42
 */

namespace Logic;
require_once 'Manager.php';

class BasicAuth extends AuthenticateUser {

    protected $manager;
    protected $login;
    protected $password;
    protected $user;

    function __construct($params) {
        parent::__construct();
        $this->manager = new Manager();
        $this->login = $params['email'];
        $this->password = $params['password'];
    }

    public function authenticate() {
        $sql = "SELECT id, password FROM users WHERE email = ?";
        $param_arr[] = "s";
        $param_arr[] = &$this->login;
        $this->user = $this->manager->getPreparedAssocResult($sql, $param_arr);
        if (password_verify($this->password, $this->user['password'])) {
            return true;
        }
        return false;
    }

    public function login() {
        session_start();
        $sessid = session_id();
        $sql = "UPDATE user_data SET session_id=? WHERE user_id = ?";
        $param_arr[] = "si";
        $param_arr[] = &$sessid;
        $param_arr[] = &$this->user['id'];
        $this->manager->getPreparedResult($sql, $param_arr);
        setcookie("sessid", $sessid, time() + (86400 * 30), "/");
    }
}