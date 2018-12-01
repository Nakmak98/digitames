<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 30.11.2018
 * Time: 19:12
 */

class Manager {
    protected $dbconn;

    function __construct() {
        $this->dbconn = Db::getConnection();
    }

    function getAssocResult($sql){
        $result = $this->dbconn->query($sql);
        return $result->fetch_assoc();
    }

    function getResult($sql){
        return $this->dbconn->query($sql);
    }
}