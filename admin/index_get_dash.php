<?php 
require_once "connect.php";
function getCourse_dash() {
    global $conn;
    $sql = "select count(course_id) as numCourse from course";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["numCourse"];
}
function getUsers_dash() {
    global $conn;
    $sql = "select count(id_card) as numUsers from users";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["numUsers"];
}
function getUsers_regis_dash_per() {
    global $conn;
    $sql = "select * 
    from users u
    inner join course_regis cr on cr.id_card = u.id_card
    group by cr.id_card
    ";
    $res = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_array($res);
    $num = mysqli_num_rows($res);
    return $num*100/getUsers_dash();
}
function getUsers_regis_dash() {
    global $conn;
    $sql = "select * 
    from users u
    inner join course_regis cr on cr.id_card = u.id_card
    group by cr.id_card
    ";
    $res = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_array($res);
    $num = mysqli_num_rows($res);
    return $num;
}
function getUsers_success_dash() {
    global $conn;
    $sql = "select count(cr.id_card) as numUsersSucc 
    from users u
    inner join course_regis cr on cr.id_card = u.id_card
    where cr.status = 'pass' group by cr.id_card
    ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["numUsersSucc"];
}