<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 02.12.2018
 * Time: 1:37
 */

namespace Logic;
use Logic\Locolizer\Locolizer;

require_once 'GamePage.php';
require_once 'Locolizer/GamePageLocolizer.php';

class GamePageController extends Controller {

    function getGamePage($request, $response, $args) {
        $locolizer = Locolizer::getInstance('GamePage');
        $game_page = new GamePage($args['project_name']);
        $this->context['game_data'] = $locolizer->getLocale(
            $game_page->getGameData()
        );
        if(!is_null($carousel = $game_page->getCarousel()))
            $this->context['featured'] = $carousel;
        $this->context['feature_num_rows'] = $game_page->getNumRows();
        return $this->container['view']->render($response, 'game_page.html', $this->context);
    }
}