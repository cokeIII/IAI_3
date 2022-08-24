<?php
require_once "connect.php";
$sql = "select tag from public_relations";
$res =mysqli_query($conn,$sql);
$data = array();
while($row = mysqli_fetch_array($res)){
    $data["tagData"] = $row["tag"];
}
echo json_encode($data);