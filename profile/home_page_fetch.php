<?php
include $_SERVER['DOCUMENT_ROOT']."dbconnect_anon_user.php";
$mysqli = dbconnect();

$request=$_REQUEST;
$col =array(
    0   =>  'id',
    1   =>  'proj_name',
    2   =>  'proj_url',
    3   =>  'proj_img',
    4   =>  'proj_desc',
    5   =>  'is_featured'
);  //create column like table in database

$sql ="SELECT * FROM game_project";
$query=mysqli_query($mysqli,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM game_project WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (proj_name Like '".$request['search']['value']."%' ";
    $sql.=" OR proj_url Like '".$request['search']['value']."%' ";
    $sql.=" OR proj_img Like '".$request['search']['value']."%' ";
    $sql.=" OR proj_desc Like '".$request['search']['value']."%' ";
    $sql.=" OR is_featured Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($mysqli,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($mysqli,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //name
    $subdata[]=$row[2]; //url
    $subdata[]=$row[3]; //img           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    $subdata[]=$row[4]; //desc
    $subdata[]=$row[5]; //is_featured
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="fas fa-pen-square text-white">&nbsp;</i></button><br>
<button onclick="return confirm(\'Delete?\')" type="button" id="getDelete" class="btn btn-danger btn-xs" data-id="'.$row[0].'"><i class="fas fa-trash text-white">&nbsp;</i></button>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>