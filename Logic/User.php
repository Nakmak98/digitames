<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 27.11.2018
 * Time: 23:43
 */

namespace Logic\Db;


abstract class User
{
    protected $sessid;
    protected $user_id;
    protected $nickname;
    protected $age;
    protected $region;
    protected $role;

    static function getInstance($userIsAuth){
        if($userIsAuth){
            return new AuthUser();
        }
        return new AnonymousUser();
    }

    abstract function shortName();
}

class AnonymousUser extends User{
    function shortName()
    {
        // TODO: Implement shortName() method.
    }
}

class AuthUser extends User{
    function shortName()
    {
        // TODO: Implement shortName() method.
    }
}