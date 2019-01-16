<?php
/**
 * Created by PhpStorm.
 * User: artou
 * Date: 15.01.2019
 * Time: 23:48
 */

namespace Logic;


class ProfileController extends Controller
{
    function getProfile($request, $response, $args) {
        return $this->container['view']->render($response, 'profile.html', $this->context);
    }
}