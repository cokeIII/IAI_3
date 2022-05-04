
<?php
require_once "connect.php";
$type_id = $_POST["type_id"];
$sql = "delete from course_type where type_id = '$type_id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    // echo $sql;
    header("location: course_type.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=ลบรายการ กรุณาลองใหม่อีกครั้ง");
}
