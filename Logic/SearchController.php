<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 10.01.2019
 * Time: 22:01
 */

namespace Logic;

require_once "Search.php";

class SearchController extends Controller
{
    function search($request, $response, $args){
        $srch = new Search($_GET);
        try{
            $srch->find();
            $result=$srch->getResult();
        }catch (\Exception $e){
            $this->context['error'] = $e;
            return $this->container['view']->render($response, 'error.html', $this->context);
        }
        $this->context = array(
            'search_results'=>$result,
            'request'=>$srch->getRequest()
        );
        return $this->container['view']->render($response, 'search_results.html', $this->context);
    }



}