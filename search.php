<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/dbconnect_anon_user.php";
$mysqli = dbconnect();

$sql = "SELECT * FROM game_project WHERE proj_name = '".$_GET['search']."'";
if ($results = mysqli_query($mysqli, $sql)) {
    $result = mysqli_fetch_assoc($results);
}
else {
    $_SESSION['message_db'] = "SELECT GAME_PAGE ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}
if(!empty($result)) {
    //include $_SERVER['DOCUMENT_ROOT']."/index.php";
    header("Location: ../templates/game_page.php?game=$result[id]");
    //include $_SERVER['DOCUMENT_ROOT']."/templates/game_page.php?game=$result[id]";

}
else
    echo 'Такой игры нет';
?>