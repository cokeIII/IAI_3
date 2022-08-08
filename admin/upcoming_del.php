<?php
require_once "connect.php";
header('Content-Type: text/html; charset=UTF-8');
$id = $_POST["id"];
$sql ="delete from upcoming_events where id = '$id'";
$res = mysqli_query($conn,$sql);
if($res){
    header("location: bullhorn.php");
}