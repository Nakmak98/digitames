<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 03.12.2018
 * Time: 15:36
 */

namespace Logic\Locolizer;

class Locolizer {
    static function getBaseContext(){
        $baseContext['blog'] = gettext("BLOG");
        $baseContext['signin/signup'] = gettext("Signin/Signup");
        $baseContext['search'] = gettext("Search...");
        return $baseContext;
    }
}

// Попробовать сделать класс абстрактным.
// Отдавать нужный объект подкласса в зависимости от вызывающего контекста
// м.б. имя функции или входной параметр
