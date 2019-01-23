<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 23.01.2019
 * Time: 20:23
 */

namespace Logic;
require_once "HomePageManager.php";

class HomePage {
    public $featured;
    public $tableView;

    function __construct() {
        $manager = new HomePageManager();
        $this->featured = $manager->getFeatured();
        $this->tableView = $manager->getTableView();
    }

    public function getNumRows(){
        return count($this->featured);
    }
}