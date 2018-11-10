<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 10.11.2018
 * Time: 15:26
 */

class Db
{
    public $db;
    public $host;
    private $login;
    private $password;
    public $conn;
    function __construct() {
        $this->db = "gamesite";
        $this->host = "localhost";
        $this->login = "gamesite";
        $this->password = "1qaz2wsx3edc";
        try {
            $this->conn = new mysqli($this->host, $this->login, $this->password, $this->db, 3306);
        } catch (mysqli_sql_exception $e) {
            echo $e;
        }
    }
}