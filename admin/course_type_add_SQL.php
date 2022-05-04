
<?php
require_once "connect.php";

$type_name = $_POST["type_name"];

$sql = "insert into course_type (type_name) value('$type_name')";
$res = mysqli_query($conn, $sql);
if ($res) {
    // echo $sql;
    header("location: course_type.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มรายการ กรุณาลองใหม่อีกครั้ง");
}
