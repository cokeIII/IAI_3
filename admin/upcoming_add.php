<?php
require_once "connect.php";
header('Content-Type: text/html; charset=UTF-8');

$name_event = $_POST["name_event"];
$detail_event = $_POST["detail_event"];
$pic_event = $_FILES["pic_event"];
print_r($pic_event);
$status_event = $_POST["status_event"];
$targetDir = "../file_uploads/img_upcoming/";
$fileNames = $pic_event['name'];
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
if (!empty($fileNames)) {

    // File upload path 
    $fileName = basename($fileNames);
    $targetFilePath = $targetDir . $fileName;

    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server 
        if (move_uploaded_file($pic_event["tmp_name"], $targetFilePath)) {
            // Image db insert sql 
            if(empty($status_event)){
                $status_event = "coming soon";
            }
            $sql = "insert into upcoming_events (status,course_name,detail,pic) value('$status_event','$name_event','$detail_event','$fileName')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo header("location: bullhorn.php");
            } else {
                echo $sql;
            }
        } else {
            $errorUpload .= $fileNames . ' | ';
        }
    } else {
        $errorUploadType .= $fileNames . ' | ';
    }
}
