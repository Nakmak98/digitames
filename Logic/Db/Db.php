<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 10.11.2018
 * Time: 15:26
 */

class Db {
    static function getConnection() {
        $db = "gamesite";
        $host = "5.23.54.233";
        $login = "gamesite";
        $password = "1qaz2wsx3edc";
        static $conn = null;
        if ($conn == null) {
            try {
                $conn = new mysqli($host, $login, $password, $db, 3306);
                return $conn;
            } catch (mysqli_sql_exception $e) {
                echo $e;
                exit;
            }
        }
        return $conn;
    }
}