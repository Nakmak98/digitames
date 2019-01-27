<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 02.12.2018
 * Time: 23:26
 */

namespace Logic;
require_once "Manager.php";

class GamePageManager extends Manager {

    function getData(string &$proj_url){
        $getGameData = "SELECT proj_id, proj_name, img, video, about FROM game_project JOIN game_page gp ON game_project.id = gp.proj_id WHERE proj_url = ?";
        $param_arr[] = "s";
        $param_arr[] = &$proj_url;
        return $this->getPreparedAssocResult($getGameData, $param_arr);
    }

    function getCarousel($project_id){
        $getCarousel = "SELECT *
                        FROM gamesite.game_page_carousel
                        WHERE proj_id = ?";
        $param_arr[] = "i";
        $param_arr[] = &$project_id;
        return $this->getPreparedMultipleAssocResult($getCarousel, $param_arr);
    }
}