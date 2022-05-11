<?php
require_once "function.php";
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); //*** CSV ***//
header("Content-Disposition: attachment; filename=list_name.xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อผู้เข้าอบรม</title>
</head>
<?php
$course_id = $_GET["course_id"];
$sql = "select * from course_regis where course_id = '$course_id' and status ='pass'";
$res = mysqli_query($conn, $sql);
?>

<body>
    <table border="1">
        <tr>
            <td colspan="2">รายชื่อผู้เข้าอบรม <?php echo getNameCourse($course_id); ?></td>
        </tr>
        <tr>
            <td>ลำดับ</td>
            <td>รายชื่อ</td>
        </tr>
        <?php $i = 1;
        while ($row = mysqli_fetch_array($res)) { ?>
            <tr>
                <td><?php echo  $i++; ?></td>
                <td><?php echo  getNameUser($row["id_card"]); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>