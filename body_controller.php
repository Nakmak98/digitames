<?php
session_start();
function get_navbar() {
    if(isset($_COOKIE['user_id']))
        include $_SERVER['DOCUMENT_ROOT']."templates/header.php";
    else
        include $_SERVER['DOCUMENT_ROOT'] . "templates/header_default.php";


    //$header_template = $_SERVER['DOCUMENT_ROOT']."/templates/header_default.php";

//    if(is_user_logged_in()) {
//        $header_template = $_SERVER['DOCUMENT_ROOT']."/templates/header/header_logged_in.php";
//    }

}

function get_carousel() {
//    include "dbconnect.php";
//    $mysqli = dbconnect();
    include $_SERVER['DOCUMENT_ROOT']."templates/carousel.php";
}

function get_container() {
    include $_SERVER['DOCUMENT_ROOT']."templates/container.php";
}

function get_main($template) {
    if($template == 1) {
        include $_SERVER['DOCUMENT_ROOT']."templates/container.php";
    }
    if($template == 2) {
        include $_SERVER['DOCUMENT_ROOT']."templates/login.php";
        include $_SERVER['DOCUMENT_ROOT']."account/login_session.php";
    }
    if($template == 3) {
        include $_SERVER['DOCUMENT_ROOT']."templates/signup.php";
        //include $_SERVER['DOCUMENT_ROOT']."account/sign_up.php";
    }
    if($template == 4) {
        /*if($_SESSION['user_role'] == "admin") {
            include $_SERVER['DOCUMENT_ROOT'] . "templates/profile_admin.php";
        }
        if($_SESSION['user_role'] == "subscriber"){
            include $_SERVER['DOCUMENT_ROOT'] . "templates/profile.php";
        }*/
        include $_SERVER['DOCUMENT_ROOT'] . "templates/profile.php";
    }
}
?>