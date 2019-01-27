<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 23.01.2019
 * Time: 20:18
 */

namespace Logic;
require_once "Manager.php";

class HomePageManager extends Manager {
    public function getFeatured(){
        $sql = "SELECT * FROM `game_project` WHERE is_featured = 1";
        return $this->getMultipleAssocResult($sql);
    }

    public function getTableView(){
        $sql = "SELECT * FROM `game_project`";;
        return $this->getMultipleAssocResult($sql);
    }

}