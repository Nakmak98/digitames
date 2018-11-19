<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 11.11.2018
 * Time: 22:59
 */

class Registration
{
    public $db;
    public $email;
    public $password;
    public $age;
    public $region;

    function __construct($dbconn, $post){
        $this->db = $dbconn;
        $this->email = $post['new_email'];
        $this->password = $post['new_password'];
        $this->age = $post['age'];
        $this->region =$post['region'];
    }
//    TODO метод валидации приходящих данных на всякие атаки
    function email_exist(){
        $sql = "SELECT id FROM users WHERE email='$this->email'";
        $results = $this->db->conn->query($sql);
        if ($results->num_rows) {
            return true;
        }
        return false;
    }

    function sign_up(){
        $sql = "INSERT INTO users (email, password)
                VALUES ('$this->email', '$this->password')";
        $this->db->conn->query($sql);
    }

    function get_user_id(){
        $sql = "SELECT id FROM users WHERE email='$this->email'";
        $results = $this->db->getQuery($sql);
        return $results['id'];
    }

    function insert_user_data(){
        $id = $this->get_user_id();
        $sql = "INSERT INTO user_data (user_id, age, region, role) VALUES ('$id', '$this->age ', '$this->region')";
        $this->db->conn->query($sql);
        $sql = "INSERT INTO user_role (user_id, role) VALUES ('$id', 'subscriber')";
        $this->db->conn->query($sql);
    }

    function __destruct()
    {
        unset($this->email);
        unset($this->password);
        unset($this->region);
        unset($this->age);
        unset($this->region);
    }
}