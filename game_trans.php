<?php
session_start();
// do any authentication first, then add POST variable to session
$_SESSION['game'] = $_POST['game'];
?>