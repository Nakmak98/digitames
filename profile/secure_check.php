<?php
include $_SERVER['DOCUMENT_ROOT']."dbconnect_anon_user.php";
$mysqli = dbconnect();
session_start();
$sql = "SELECT session_id FROM user_data WHERE user_id='".$_COOKIE['user_id']."'";  // check if email exists in db
$results = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($results) > 0) {
    $session = mysqli_fetch_assoc($results);
    if (strcmp($session['session_id'], $_COOKIE['s_id']) == 0) {
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