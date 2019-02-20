<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 24.01.2019
 * Time: 1:22
 */

namespace Logic;
require_once "Manager.php";

class PasswordRecovery {
    protected $manager;
    protected $email;
    protected $md5email;
    public $recoveryToken;

    public function __construct() {
        $this->manager = new Manager();
    }

    public function isEmailExist($email) {
        $this->email = $email;
        $sql = "select email from users where email = ?";
        $param_arr[] = "s";
        $param_arr[] = &$email;
        return $this->manager->getPreparedAssocResult($sql, $param_arr);
    }

    public function createEncryptedKey(){
        $this->md5email = md5($this->email); // encrypted email is a unique user key
        $ttl = date("Y-m-d H:i:s");
        $sql = "insert into forget_password(email,md5email, TTL) values (?,?,?)";
        $param_arr[] = "sss";
        $param_arr[] = &$this->email;
        $param_arr[] = &$this->md5email;
        $param_arr[] = &$ttl;
        $this->manager->getPreparedResult($sql, $param_arr);
    }

    public function sendEmail(){
        $forget_password_email = new Email();
        $forget_password_email->SendForgetPasswordEmail($this->email, $this->md5email);
    }


    public function checkForgetPasswordToken($md5email) {
        $this->getRecoveryToken($md5email);
        $ttl = strtotime($this->recoveryToken['TTL']);
        $real_time = strtotime(date("Y-m-d H:i:s"));
        if (($ttl - $real_time > 24 * 3600) or (is_null($this->recoveryToken))) {
            throw new \Exception('ttl of forget password token has expired');
        }
    }

    /**
     * @param $new_password
     * @param array $param_arr
     */
    public function changePassword($email, $new_password) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "update users set password = ? where email = ?";
        $param_arr[] = "ss";
        $param_arr[] = &$new_password;
        $param_arr[] = &$email;
        $this->manager->getPreparedResult($sql, $param_arr);
        unset($param_arr);
        $sql = "DELETE FROM forget_password WHERE email=?";
        $param_arr[] = "s";
        $param_arr[] = &$email;
        $this->manager->getPreparedResult($sql, $param_arr);
    }

    protected function getRecoveryToken($md5email) {
        $sql = "select email, TTL from forget_password where md5email = ?";
        $param_arr[] = "s";
        $param_arr[] = &$md5email;
        $this->recoveryToken = $this->manager->getPreparedAssocResult($sql, $param_arr);
    }
}