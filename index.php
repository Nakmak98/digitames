<?php

if(isset($_GET['signout'])) {
    unset($_COOKIE['user_id']);
    unset($_COOKIE['user_role']);
    setcookie('user_id', null, -1);
    setcookie('user_role' ,null, -1);
}

if(isset($_GET['signup'])) {
    header('Location: account/registration.php');
    exit;
}

if(isset($_GET['login'])) { 
    //$template = 2;
    include $_SERVER['DOCUMENT_ROOT']."home.php";
    exit;
}

if(isset($_GET['profile'])) {
    //$template = 4;
    include $_SERVER['DOCUMENT_ROOT']."home.php";
    exit;
}

if(isset($_GET['search'])){
    include $_SERVER['DOCUMENT_ROOT']."/search.php";
    exit;
}

$template = 1;
include $_SERVER['DOCUMENT_ROOT']."/home.php";


?>