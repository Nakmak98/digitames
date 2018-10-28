<?php
function dbconnect() {
    $db = "cy45195_gamesite";
    $host = "localhost";
    $login = "cy45195_gamesite";
    $password = "ps43WhAf";

    $conn = new mysqli($host, $login, $password, $db, 3307);
	
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function show_db_error($conn) {
    echo "Error: ".$conn->connect_error."\n";
}
?>