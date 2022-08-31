<?php
require_once "connect.php";
function getCourse_dash()
{
    global $conn;
    $sql = "select count(course_id) as numCourse from course";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["numCourse"];
}
function getUsers_dash()
{
    global $conn;
    $sql = "select count(id_card) as numUsers from users";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["numUsers"];
}
function getUsers_regis_dash_per()
{
    global $conn;
    $sql = "select * 
    from users u
    inner join course_regis cr on cr.id_card = u.id_card
    group by cr.id_card
    ";
    $res = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($res);
    $num = mysqli_num_rows($res);
    return $num * 100 / getUsers_dash();
}
function getUsers_regis_dash()
{
    global $conn;
    $sql = "select * 
    from users u
    inner join course_regis cr on cr.id_card = u.id_card
    group by cr.id_card
    ";
    $res = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($res);
    $num = mysqli_num_rows($res);
    return $num;
}
function getUsers_success_dash()
{
    global $conn;
    $sql = "select count(cr.id_card) as numUsersSucc 
    from users u
    inner join course_regis cr on cr.id_card = u.id_card
    where cr.status = 'pass' group by cr.id_card
    ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["numUsersSucc"];
}
if (!empty($_POST)) {
    if ($_POST["act"] == "getAreaChart") {
        $sql = "select count(id_card) as numMonth, EXTRACT(MONTH FROM time_stamp) as mounts from course_regis
        GROUP BY  EXTRACT(MONTH FROM time_stamp)
        ";
        $data = array();
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($res)) {
            $data[$row["mounts"]] = $row["numMonth"];
        }
        echo json_encode($data);
    } else if ($_POST["act"] == "getPieChart") {
        $sql = "select * from industry order by id";
        $res = mysqli_query($conn, $sql);
        $data = array();
        while ($row = mysqli_fetch_array($res)) {
            $data["label"][] = $row["name"];
        }

        $sql2 = "select i.name as iName,count(u.id_card) as numUsers, i.name 
        from users u
        inner join industry i on i.id = u.industry order by i.id
        ";
        $res2 = mysqli_query($conn,$sql2);
        while($row2 = mysqli_fetch_array($res2)){
            $data["val"][$row2["iName"]] = $row2["numUsers"];
        }

        echo json_encode($data);
    }
}
