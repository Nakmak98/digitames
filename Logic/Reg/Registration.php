<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 11.11.2018
 * Time: 22:59
 */

class Registration
{
    public $dbconn;
    public $reg_email;
    public $reg_pass;
    public $reg_age;
    public $reg_region;

    function __construct($dbconn, $post){
        $this->dbconn = $dbconn;
        $this->reg_email = $post['new_email'];
        $this->reg_pass = $post['new_password'];
        $this->reg_age =$post['age'];
        $this->reg_region =$post['region'];
    }
//    TODO метод валидации приходящих данных на всякие атаки
    function email_exist(){
        $sql = "SELECT id FROM users WHERE email='$this->reg_email'";
        $results = $this->dbconn->getQuery($sql);
        if ($results->num_rows) {
            return true;
        }
        return false;
    }

    function sign_up(){
        $sql = "INSERT INTO users (email, password)
                VALUES ('$email', '$password')";
        $results = $this->query($sql);
    }

    function get_user_id(){
        $sql = "SELECT id FROM users WHERE email='$email'";
        $results = $this->getQuery($sql);
        return $results['id'];
    }
}