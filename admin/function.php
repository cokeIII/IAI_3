<?php
require_once "connect.php";
function countUsers(){
    global $conn;
    $sql = "select count(id_card) as currentUsers from users where id_card != 'admin'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["currentUsers"];
}
function countLecturer(){
    global $conn;
    $sql = "select count(id_card) as certifiedTeachers from lecturer";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["certifiedTeachers"];
}
function countCourse(){
    global $conn;
    $sql = "select count(course_id) as approvedCourses from course where status = 'on'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["approvedCourses"];
}
function countPass(){
    global $conn;
    $sql = "select count(id_card) as graduateUsers from course_regis where status = 'pass'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    return $row["graduateUsers"];
}
function getDataLecturer($id_card)
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from lecturer where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $numRow = mysqli_num_rows($res);
    $data = array();

    if ($numRow > 0) {
        $data["name"]  = $row["prefix"] . $row["first_name"] . " " . $row["last_name"];
        $data["img"] = $row["pic"];
    } else {
        $data["name"] = "";
        $data["img"] = "";
    }

    return $data;
}
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    // return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    return "$strDay $strMonthThai $strYear";
}
function get_industry_opt()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from industry";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }

    return $data;
}
function get_industrial_area()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from industrial_area";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . 'เขต ' . $row["county"] . ' ' . $row["province"] . ' ' . $row["area"] . '</option>';
    }
    $data .= '<option value="0">อื่นๆ</option>';

    return $data;
}
function get_job_position_opt()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from job_position";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }
    return $data;
}

function get_department_opt()
{
    global $conn;
    $data = '<option value="">กรุณาเลือก</option>';
    $sql = "select * from department";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $data .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }

    return $data;
}

function get_CourseType_opt()
{
    global $conn;
    $opt = "";
    $sql = "select * from course_type";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["type_id"] . '">' . $row["type_name"] . '</option>';
    }
    return $opt;
}

function DateDiff($strDate1, $strDate2)
{
    return (strtotime($strDate2) - strtotime($strDate1)) /  (60 * 60 * 24);  // 1 day = 60*60*24
}
function TimeDiff($strTime1, $strTime2)
{
    return (strtotime($strTime2) - strtotime($strTime1)) /  (60 * 60); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1, $strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1)) /  (60 * 60); // 1 Hour =  60*60
}

function countPerson($course_id)
{
    global $conn;
    $sql = "select count(id_card) as countPerson from course_regis where course_id='$course_id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["countPerson"];
}

function checkPass($id_card, $course_id)
{
    global $conn;
    $sql = "select * from course_regis where id_card = '$id_card' and course_id='$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["status"];
}

function getNameCourse($course_id)
{
    global $conn;
    $sql = "select course_name from course where course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["course_name"];
}
function getNameUser($id_card)
{
    global $conn;
    $sql = "select * from users where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"];
}

function calPercent($id_card, $course_id)
{
    global $conn;
    $ret = 0;
    $sqlTable = "select * from time_table where course_id = '$course_id'";
    $resTable = mysqli_query($conn, $sqlTable);
    $numTable = 0;
    while ($rowTable = mysqli_fetch_array($resTable)) {
        if (!empty($rowTable["link_doc"])) {
            $numTable++;
        }
        if (!empty($rowTable["link_video"])) {
            $numTable++;
        }
    }
    $sqlLog = "select * from log_user l
    inner join time_table t on t.time_id = l.time_id
    where l.id_card = '$id_card' 
    and t.course_id='$course_id'
    group by l.time_id,detail
    ";
    $resLog = mysqli_query($conn, $sqlLog);
    $numLog = 0;
    while ($rowLog = mysqli_fetch_array($resLog)) {
        if ($rowLog["detail"] == "เปิดเอกสาร") {
            $numLog++;
        }
        if ($rowLog["detail"] == "ดูวิดีโอ") {
            $numLog++;
        }
    }
    if($ret > 0) {
        $ret = number_format((float)($numLog * 100 / $numTable), 2, '.', '');
    }
    return $ret;
}

function checkDoc($id_card, $time_id)
{
    $ret = "";
    global $conn;
    $sql = "select * from log_user 
        where id_card='$id_card' 
        and time_id='$time_id' 
        and detail='เปิดเอกสาร'
        order by time_stamp desc limit 1
        ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $ret = $row["time_stamp"];
    return $ret;
}

function checkVideo($id_card, $time_id)
{
    $ret = "";
    global $conn;
    $sql = "select * from log_user 
        where id_card='$id_card' 
        and time_id='$time_id' 
        and detail='ดูวิดีโอ'
        order by time_stamp desc limit 1
        ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $ret = $row["time_stamp"];
    return $ret;
}
function checkBank($id_card, $course_id)
{
    $ret = "";
    global $conn;
    $sql = "select * from bank where id_card='$id_card' and course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if(!empty($row["evidence"]) && empty($row["receipt"])){
        $ret = "ส่งหลักฐานแล้ว";
    } else if(!empty($row["evidence"]) && !empty($row["receipt"])){
        $ret = $row["receipt"];
    }
    return $ret;
}
function checkTime($id_card, $course_id)
{
    global $conn;
    $i = 0;
    $dataTime = array();
    $sql = "select * from time_table where course_id = '$course_id' order by days,time_start";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $dataTime[$i]['time_id'] = $row["time_id"];
        $dataTime[$i]['start'] = $row["time_start"];
        $dataTime[$i]['link_doc'] = $row["link_doc"];
        $dataTime[$i]['link_video'] = $row["link_video"];
        $dataTime[$i]['end'] = $row["time_end"];
        $dataTime[$i]['doc'] = checkDoc($id_card, $row["time_id"]);
        $dataTime[$i]['video'] = checkVideo($id_card, $row["time_id"]);
        $i++;
    }
    $ret = array();
    for ($i = 0; $i < count($dataTime); $i++) {
        if (!empty($dataTime[$i]['link_doc'])) {
            if (!empty($dataTime[$i]['doc'])) {
                $ret[$dataTime[$i]['time_id']]['doc'] = 'bg-green';
            } else {
                $ret[$dataTime[$i]['time_id']]['doc'] = 'bg-red';
            }
        } else {
            $ret[$dataTime[$i]['time_id']]['doc'] = 'bg-blue';
        }

        if (!empty($dataTime[$i]['link_video'])) {

            if (!empty($dataTime[$i]['video'])) {
                if (empty($ret[$dataTime[$i]['time_id']]['video'])) {
                    $ret[$dataTime[$i]['time_id']]['video'] = 'bg-green';
                }
                if ($i + 1 < count($dataTime)) {
                    if (number_format((float)TimeDiff($dataTime[$i]['video'], $dataTime[$i + 1]['video']), 2, '.', '') < 0.1) {
                        $ret[$dataTime[$i + 1]['time_id']]['video'] = 'bg-yellow';
                    }
                }
            } else {
                $ret[$dataTime[$i]['time_id']]['video'] = 'bg-red';
            }
        } else {
            $ret[$dataTime[$i]['time_id']]['video'] = 'bg-blue';
        }
    }
    return $ret;
}
