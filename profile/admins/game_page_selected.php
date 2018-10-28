<?php
session_start();

if (isset($_POST['state'])) {
    include $_SERVER['DOCUMENT_ROOT'] . "/gamesite/dbconnect_anon_user.php";
    $mysqli = dbconnect();

    $sql = "SELECT * FROM game_page WHERE proj_id='" . $_POST['state'] . "'";
    $results = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($results) > 0) {
        $game_page = mysqli_fetch_assoc($results);
    } else {
        $_SESSION['message_db'] = "SELECT GAME_PROJECT ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }
    $sql = "SELECT * FROM game_page_carousel WHERE proj_id='" . $_POST['state'] . "'";
    $results = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($results) > 0) {
        $game_page_carousel = mysqli_fetch_assoc($results);
    } else {
        $_SESSION['message_db'] = "SELECT GAME_PROJECT_CAROUSEL ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }

    $sql = "SELECT * FROM proj_platform WHERE proj_id='" . $_POST['state'] . "'";
    $results = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($results) > 0) {
        $proj_platform = mysqli_fetch_assoc($results);
    } else {
        $_SESSION['message_db'] = "SELECT PROJ_PLATFORM ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }

    $sql = "SELECT * FROM proj_service WHERE proj_id='" . $_POST['state'] . "'";
    $results = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($results) > 0) {
        $proj_service = mysqli_fetch_assoc($results);
    } else {
        $_SESSION['message_db'] = "SELECT PROJ_SERVICE ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }
}

if (isset($_POST['add_changes'])) {

    if (!isset($_POST['video'])) {
        $_POST['video'] = "NULL";
    }
    if (!isset($_POST['about'])) {
        $_POST['video'] = "NULL";
    }

    if (!isset($_FILES['img'])) {

    }
    if (isset($_FILES['img'])) {

    }
}
?>