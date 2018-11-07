<?php
function dbconnect() {
    $db = "gamesite";
    $host = "localhost";
    $login = "gamesite";
    $password = "1qaz2wsx3edc";

    $conn = new mysqli($host, $login, $password, $db, 3306);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function show_db_error($conn) {
    echo "Error: ".$conn->connect_error."\n";
}
