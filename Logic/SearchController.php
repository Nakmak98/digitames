<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 10.01.2019
 * Time: 22:01
 */

namespace Logic;
use Logic\Locolizer\Locolizer;

require_once "Search.php";
require_once 'Locolizer/HomePageLocolizer.php';

class SearchController extends Controller
{
    function search($request, $response, $args){
        $locolizer = Locolizer::getInstance('HomePage');
        $search = new Search($_POST['search']);
        try{
            $result = $search->find();
        }catch (\Exception $e){
            $this->context['error'] = $e;
            return $this->container['view']->render($response, 'error.html', $this->context);
        }
        $result=$locolizer->getLocale($result);
        $this->context['search_results'] = $result;
        $this->context['request'] = $search->request;
        return $this->container['view']->render($response, 'search_results.html', $this->context);
    }
}
