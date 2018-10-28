<?php
include $_SERVER['DOCUMENT_ROOT']."dbconnect_anon_user.php";
$mysqli = dbconnect();
session_start();
$sql = "SELECT session_id FROM user_data WHERE user_id='".$_COOKIE['user_id']."'";  // check if email exists in db
    $results = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($results) > 0) {
        $session = mysqli_fetch_assoc($results);
        if (strcmp($session['session_id'], $_COOKIE['s_id']) == 0) {
            if (isset($_POST['profile_tab'])) {
                $sql = "SELECT * FROM users WHERE email='".$_COOKIE['email']."'";
                $results = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($results) > 0) {
                    $sql = "SELECT * FROM user_data WHERE user_id='".$_COOKIE['user_id']."'";
                    $results_data = mysqli_query($mysqli, $sql);
                    if (mysqli_num_rows($results_data) > 0) {
                        $user = mysqli_fetch_assoc($results);
                        $user_data = mysqli_fetch_assoc($results_data);
                    }  else {
                        $_SESSION['message_db'] = "SELECT USER_DATA 2 ERROR" . mysqli_error($mysqli);
                        header('Location: templates/error.php');
                    }
                } else {
                    $_SESSION['message_db'] = "SELECT USERS 1 ERROR" . mysqli_error($mysqli);
                    header('Location: templates/error.php');
                }
            }
            if(isset($_POST['game_page_tab'])) {
                //$sql = "SELECT * FROM game_page WHERE email='".$_COOKIE['email']."'";
            }
            if(isset($_POST['home_page_tab'])) {
                $sql = "SELECT * FROM game_project";
                if (mysqli_num_rows($results_gp) > 0) {
                    $game_project = mysqli_fetch_assoc($results_gp);
                } else {
                    $_SESSION['message_db'] = "SELECT GAME_PROJECTS ERROR" . mysqli_error($mysqli);
                    header('Location: templates/error.php');
                }
            }
        }
        else {
            $_SESSION['message_db'] = "Your session id is wrong";
            header('Location: templates/error.php');
        }
    }
    else {
        $_SESSION['message_db'] = "SELECT USER_DATA 1 ERROR" . mysqli_error($mysqli);
        header('Location: templates/error.php');
    }
?>