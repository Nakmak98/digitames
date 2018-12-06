<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 05.12.2018
 * Time: 12:26
 */

namespace Logic\Locolizer;


class GamePageLocolizer extends Locolizer {
    function getLocale(array $array){
            foreach ($array as  $key => $value){
                $array[$key] = gettext($value);
            }
        return $array;
    }
}