<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:21
 */
namespace Logic;
use Logic\Locolizer\Locolizer;

require_once 'HomePage.php';
require_once 'Locolizer/HomePageLocolizer.php';

class HomePageController extends Controller {
    function getHomePage($request, $response, $args) {
        $homePage = new HomePage();
        $locolizer = Locolizer::getInstance('HomePage');
        $this->context['featured'] = $locolizer->getLocale($homePage->featured);
        $this->context['feature_num_rows'] = $homePage->getNumRows();
        $this->context['tableview'] = $locolizer->getLocale($homePage->tableView);
        return $this->container['view']->render($response, 'home.html', $this->context);
    }
}