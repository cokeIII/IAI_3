
<?php
require_once "connect.php";

$type_name = $_POST["type_name"];
$type_id = $_POST["type_id"];
$sql = "update course_type set type_name='$type_name' where type_id = '$type_id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    // echo $sql;
    header("location: course_type.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มรายการ กรุณาลองใหม่อีกครั้ง");
}
