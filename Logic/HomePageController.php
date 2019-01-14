<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:21
 */
namespace Logic;
use Logic\Locolizer\Locolizer;

require_once 'Manager.php';
require_once 'Locolizer/HomePageLocolizer.php';

class HomePageController extends Controller {
    static $getFeatured = "SELECT * FROM `game_project` WHERE is_featured = 1";
    static $getTableView = "SELECT * FROM `game_project`";

    function getHomePage($request, $response, $args) {
        $manager = new Manager();
        $locolizer = Locolizer::getInstance('HomePage');
        $feature_result = $manager->getResult(self::$getFeatured);
        $tableview_result = $manager->getMultipleAssocResult(self::$getTableView);
        $feature_list = $feature_result->fetch_all(MYSQLI_ASSOC);
        $this->context['featured'] = $locolizer->getLocale($feature_list);  
        $this->context['feature_num_rows'] = $feature_result->num_rows-1;
        $this->context['tableview'] = $locolizer->getLocale($tableview_result);
        return $this->container['view']->render($response, 'home.html', $this->context);
    }
}