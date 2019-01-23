<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 02.12.2018
 * Time: 23:16
 */

namespace Logic;
require_once 'GamePageManager.php';


use Logic\Db\GamePageManager;

class GamePage {
    public $gameData;
    public $carousel;

    function __construct(string $proj_url) {
        $manager = new GamePageManager();
        $this->gameData = $manager->getData($proj_url);
        $this->carousel = $manager->getCarousel($this->gameData['proj_id']);
    }

    public function getNumRows(){
        return count($this->carousel)-1;
    }
}