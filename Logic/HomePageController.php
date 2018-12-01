<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:21
 */
namespace Logic;
require_once 'Manager.php';

class HomePageController extends Controller {
    static $getFeatured = "SELECT * FROM `game_project` WHERE is_featured = 1";
    static $getTableView = "SELECT * FROM `game_project`";

    function getHomePage($request, $response, $args) {
        $manager = new Manager();
        $feature_result = $manager->getResult(self::$getFeatured);
        $tableview_result = $manager->getResult(self::$getTableView);
        $feature_list = $feature_result->fetch_all(MYSQLI_ASSOC);
        $this->context['featured'] = $feature_list;
        $this->context['featured_num_rows'] = $feature_result->num_rows - 1;
        $this->context['tableview'] = $tableview_result;
        return $this->container['view']->render($response, 'home.html', $this->context);
    }
}