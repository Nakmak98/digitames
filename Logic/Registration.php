<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 11.11.2018
 * Time: 22:59
 */
namespace Logic;

require_once 'Db/Db.php';
class Registration
{
    protected $db;
    protected $email;
    protected $password;
    protected $age;
    protected $region;
    public $registration_error = "This user already exist";

    //TODO метод валидации приходящих данных на всякие атаки
    function __construct($post)
    {
        $this->db = \Db::getConnection();
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
                VALUES ('$this->email', '$this->password')";
        $this->db->query($sql);
    }

    function insert_user_data()
    {
        $id = $this->get_user_id();
        if($this->user_data_exist($id)){
            throw new \Exception("Data Base connection failure");
        }
        $sql = "INSERT INTO user_data (user_id, age, region) VALUES ('$id', '$this->age ', '$this->region')";
        $this->db->query($sql);
        $sql = "INSERT INTO user_role (user_id, role) VALUES ('$id', 'subscriber')";
        $this->db->query($sql);
    }

    protected function email_exist()
    {
        $sql = "SELECT id FROM users WHERE email='$this->email'";
        $results = $this->db->query($sql);
        if ($results->num_rows) {
            return true;
        }
        return false;
    }
    protected function get_user_id()
    {
        $sql = "SELECT id FROM users WHERE email='$this->email'";
        $results = $this->db->query($sql);
        $results = $results->fetch_assoc();
        return $results['id'];
    }

    protected function user_data_exist($id){
        $sql = "SELECT id FROM user_data WHERE user_id='$id'";
        $this->db->query($sql) ? True : False;
    }

}