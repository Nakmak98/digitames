<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 03.12.2018
 * Time: 15:43
 */

namespace Logic\Locolizer;


class HomePageLocolizer extends Locolizer {

    function getLocale(array $arrays){
        foreach ($arrays as $array){
            foreach ($array as  $key => $value){
                $array[$key] = gettext($value);
            }
            $loc_arrays[] = $array;
        }
        return $loc_arrays;
    }
}