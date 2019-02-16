<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 15.01.2019
 * Time: 23:48
 */

namespace Logic;
require_once 'Manager.php';

class ProfileController extends Controller
{
    function getProfile($request, $response, $args) {
        $manager = new Manager();
        $sess_id = $_COOKIE['sessid'];

        $sql = "select mailing from gamesite.user_data where session_id = ?";
        $param_arr[] = "s";
        $param_arr[] = &$sess_id;
        $result = $manager->getPreparedAssocResult($sql,$param_arr);
        $this->context['mailing'] = $result['mailing'];

        $sql = "select role from gamesite.user_role where user_id = (select user_id from gamesite.user_data where session_id = ?)";
        $result = $manager->getPreparedAssocResult($sql,$param_arr);
        $this->context['role'] = $result['role'];

        return $this->container['view']->render($response, 'profile.html', $this->context);
    }
}