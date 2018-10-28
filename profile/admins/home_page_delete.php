<?php
if(isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "select proj_img from game_project where id=$id";
    if ($results = mysqli_query($mysqli, $sql)) {
        $path = mysqli_fetch_assoc($results);
        $sql = "DELETE FROM game_project where id=$id";
        if ($results = mysqli_query($mysqli, $sql)) {
            unlink($path['proj_img']);
        }
    } else {
        $_SESSION['message_db'] = "DELETE game_project ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }

    $sql = "select img from game_page where proj_id=$id";
    if ($results = mysqli_query($mysqli, $sql)) {
        $path_1 = mysqli_fetch_assoc($results);
        $sql = "DELETE FROM game_page where proj_id=$id";
        if ($results = mysqli_query($mysqli, $sql)) {
            unlink($path_1['img']);
        }
    } else {
        $_SESSION['message_db'] = "DELETE game_page ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }
    $sql = "select carousel from game_page_carousel where id=$id";
    if ($results = mysqli_query($mysqli, $sql)) {
        $path_2 = mysqli_fetch_assoc($results);
        $sql = "DELETE FROM game_page_carousel where proj_id=$id";
        if ($results = mysqli_query($mysqli, $sql)) {
            while (mysqli_fetch_row($results)) {
                unlink($path_2['carousel']);
            }
        }
    } else {
        $_SESSION['message_db'] = "DELETE game_page_carousel ERROR" . mysqli_error($mysqli);
        header('Location: /gamesite/templates/error.php');
    }
    $sql = "DELETE FROM proj_platform where id=$id";
    $result = mysqli_query($mysqli, $sql);
    $sql = "DELETE FROM proj_service where id=$id";
    $result = mysqli_query($mysqli, $sql);
    unset($results);
    unset($result);
    unset($path);
    unset($path_1);
    unset($path_2);
}
?>