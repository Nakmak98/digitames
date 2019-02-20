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

    public function acceptMailing($request, $response, $args) {
        $manager = new Manager();
        $sess_id = $_COOKIE['sessid'];
        if(isset($_GET['mailing_checkbox'])){
            $sql = "update user_data set mailing = 1 where session_id = '$sess_id'";
        }
        else {
            $sql = "update user_data set mailing = 0 where session_id = '$sess_id'";
        }
        $manager->getResult($sql);
        return $response->withRedirect('/profile/');
    }

    public function updateMailingList($request, $response, $args) {
        $manager = new Manager();
        $sql = "select email from users join user_data u on users.id = u.user_id where mailing = 1";
        $emails = $manager->getResult($sql);

        $file = 'email_list.csv';
        //Clear file
        file_put_contents($file, '');
        //Open file
        $current = file_get_contents($file);
        foreach ($emails as $email)
            $current .= $email['email'].";".PHP_EOL;
        //Write to file
        file_put_contents($file, $current);
        return $response->withRedirect('/profile/');
    }
}