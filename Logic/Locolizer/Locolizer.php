<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 03.12.2018
 * Time: 15:36
 */

namespace Logic\Locolizer;

abstract class Locolizer {
    static function getInstance($controller){
        static $locolizer;
        switch ($controller){
            case 'HomePage': $locolizer = new HomePageLocolizer();
                                            break;
        }
        return $locolizer;
    }

    static function getBaseContext(){
        $baseContext['blog'] = gettext("Blog");
        $baseContext['login'] = gettext("Login");
        $baseContext['search'] = gettext("Search");
        $baseContext['lang_pref'] = gettext("Language Preferences");

        return $baseContext;
    }
}

