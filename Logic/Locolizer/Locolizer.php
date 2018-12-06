<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 03.12.2018
 * Time: 15:36
 */

namespace Logic\Locolizer;

abstract class Locolizer {
    static function getInstance(string $controller){
        static $locolizer;
        switch ($controller){
            case 'HomePage': $locolizer = new HomePageLocolizer();
                break;
            case 'GamePage': $locolizer = new GamePageLocolizer();
                break;
        }
        return $locolizer;
    }
}

