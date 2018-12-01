<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 27.11.2018
 * Time: 23:43
 */

namespace Logic;
require_once 'AnonymousUser.php';
require_once 'AuthUser.php';

abstract class User {
    protected $sessid;
    protected $user_id;
    public $nickname;
    public $age;
    public $region;
    public $role;

    static function getInstance($userIsAuth) {
        if ($userIsAuth) {
            return new AuthUser();
        }
        return new AnonymousUser();
    }

    abstract function shortName();
}
