<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 02.12.2018
 * Time: 0:53
 */

namespace Logic;


class SignUpController extends Controller {

    function getSignUpForm($request, $response, $args){
        return $this->container['view']->render($response, 'sign_up.html');
    }
    function signUp($request, $response, $args){
        $reg = new Registration($_POST);
        try{
            $reg->sign_up();
            $reg->insert_user_data();
        }catch (\Exception $e){
            return $this->container['view']->render($response, 'error.html', [
                'error' => $e,
            ]);
        }
        return $this->container['view']->render($response, 'welcome.html');
    }
}