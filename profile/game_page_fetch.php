<?php
include $_SERVER['DOCUMENT_ROOT']." dbconnect_anon_user.php";

$mysqli = dbconnect();

$sql ="SELECT id, proj_name FROM game_project ORDER BY proj_name";
$query=mysqli_query($mysqli,$sql);
$totalData=mysqli_num_rows($query);

if($totalData != 0) {
    while ($row = mysqli_fetch_array($query)) {
        $json_data[] = array('id' => $row[0], 'text' => $row[1]);
    }
} else {
    $json_data = array(
        "id" => "0",
        "text" => "No results found!",
    );
}


echo json_encode($json_data);
?>