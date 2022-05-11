<?php
require_once "connect.php";
session_start();
$username = $_POST["username"];
$password = md5($_POST["passwordLogin"]);
// if ($status == "user" || $status == "admin") {
$sql = "select * from users where id_card = '$username' and password = '$password'";
$res = mysqli_query($conn, $sql);
$numrow = mysqli_num_rows($res);
if ($numrow > 0) {
    $row = mysqli_fetch_array($res);
    if ($row["status"] == "admin") {
        $_SESSION["id_card_admin"] = $row["id_card"];
        $_SESSION["username_admin"] = $row["first_name_th"] . " " . $row["last_name_th"];
        $_SESSION["status_admin"] = $row["status"];
    }
    echo "admin";
} else {
    echo "";
}
