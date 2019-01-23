<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 11.11.2018
 * Time: 22:59
 */
namespace Logic;
require_once 'Manager.php';

class SignUp
{
    protected $manager;
    protected $email;
    protected $password;
    protected $age;
    protected $region;
    public $registration_error = "This user already exist";

    function __construct($post)
    {
        $this->manager = new Manager();
        $this->email = $post['new_email'];
        $this->password = $post['new_password'];
        $this->age = $post['age'];
        $this->region = $post['region'];
    }

    function sign_up()
    {
        if($this->email_exist()){
            throw new \Exception($this->registration_error);
        }
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password)
                VALUES (?, ?)";
        $param_arr[] = "ss";
        $param_arr[] = &$this->email;
        $param_arr[] = &$this->password;
        $this->manager->getPreparedResult($sql, $param_arr);
    }

    function insert_user_data()
    {
        $id = $this->get_user_id();
        if($this->user_data_exist($id)){
            throw new \Exception("Data Base connection failure");
        }
        $sql = "INSERT INTO user_data (user_id, age, region) VALUES ('$id', '$this->age ', '$this->region')";
        $this->manager->getResult($sql);
        $sql = "INSERT INTO user_role (user_id, role) VALUES ('$id', 'subscriber')";
        $this->manager->getResult($sql);
    }

    protected function email_exist()
    {
        $sql = "SELECT id FROM users WHERE email=?";
        $param_arr[] = "s";
        $param_arr[] = &$this->email;
        $results = $this->manager->getPreparedResult($sql, $param_arr);
        if ($results->num_rows) {
            return true;
        }
        return false;
    }
    protected function get_user_id()
    {
        $sql = "SELECT id FROM users WHERE email='$this->email'";
        $results = $this->manager->getAssocResult($sql);
        return $results['id'];
    }

    protected function user_data_exist($id){
        $sql = "SELECT id FROM user_data WHERE user_id='$id'";
        $this->manager->getResult($sql) ? True : False;
    }

}