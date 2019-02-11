<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 11.02.2019
 * Time: 20:45
 */

namespace Logic;
require_once 'Manager.php';

class MailingController extends Controller
{
    public function acceptMailing($request, $response, $args) {
        $manager = new Manager();
        $sql = "update user_data set mailing = 1 where session_id=";
        $param_arr[] = "s";
        $param_arr[] = $_COOKIE['sessid'];
        return $manager->getPreparedAssocResult($sql,$param_arr);
    }
}