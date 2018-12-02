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
    protected $gameData;
    protected $carousel;

    function __construct(string $proj_name) {
        $manager = new GamePageManager();
        $this->gameData = $manager->getData($proj_name);
        $this->carousel = $manager->getCarousel($this->gameData['proj_id']);
    }

    /**
     * @return array|null
     */
    public function getGameData() {
        return $this->gameData;
    }

    /**
     * @return array|null
     */
    public function getCarousel() {
        return $this->carousel;
    }

    public function getNumRows(){
        return count($this->carousel)-2;
    }
}