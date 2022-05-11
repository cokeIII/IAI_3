<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Detail</title>
    <?php require_once "header.php"; ?>
    <link rel="stylesheet" type="text/css" href="styles/teachers_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/teachers_responsive.css">
</head>
<style>
    img {
        object-fit: contain;
    }

    .box {
        width: 100%;
        height: auto;
        background-color: #eef1f7;
        color: rgb(36, 36, 71);
        border-radius: 10px;
        font-size: 24px;
        padding: 10%;
    }

    .box-header {
        height: 60px;
        font-size: 24px;
        color: white;
        line-height: 2.5;
    }

    .small-font {
        font-size: 6px;
    }

    .mt-custom {
        margin-top: 10%;
    }

    .bg-main {
        background-color: #ba0a0a;
    }

    .font-size-cus {
        font-size: 30px;
        color: black;
    }

    .font-size-cus2 {
        font-size: 20px;
        color: #454647;
    }

    strong {
        color: black;
    }
</style>


<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <?php require_once "menu.php"; ?>
        </header>

        <!-- Menu -->
        <?php require_once "menu_mm.php"; ?>


        <!-- Home -->

        <?php
        require_once "admin/function.php";
        $id_card = "";
        $status = "";
        $course_id = $_GET["course_id"];
        $sql = "select * from course where course_id ='$course_id'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        $dateArrStrat = explode(" ", $row["start_date"]);
        $dateArrEnd = explode(" ", $row["end_date"]);
        $dateArrOpen = explode(" ", $row["open_applications"]);
        $dateArrClose = explode(" ", $row["close_applications"]);

        ?>
        <!-- Teachers -->

        <div class="teachers page_section">
            <div class="container">
                <div class="card mb-5 mt-custom">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 bg-main box-header">
                                <div><?php echo $row["course_name"]; ?></div>
                            </div>
                        </div>

                        <div class="row mt-3 font-size-cus2">
                            <div class="col-md-9">
                                <img src="file_uploads/img/<?php echo $row["pic"] ?>" alt="" class="img-fluid" height="450">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="color-detail"><strong>กลุ่มเป้าหมาย</strong> : <?php echo $row["target"] ?></div>
                                        <div><strong>จำนวนผู้อบรม</strong> :
                                            <?php echo ($row["number_trainees"] < 1 ? "ไม่ได้ระบุ" : $row["number_trainees"]) ?>
                                        </div>
                                        <div class="color-detail"><strong>ค่าใช้จ่าย(บาท)</strong> : <?php echo $row["expenses"] ?></div>
                                        <div><strong>วันที่เริ่มการอบรม</strong> : <br> <?php echo DateThai($dateArrStrat[0]) . " " . $dateArrStrat[1]; ?></div>
                                        <div class="color-detail"><strong>วันที่สิ้นสุดการอบรม</strong> : <br> <?php echo DateThai($dateArrEnd[0]) . " " . $dateArrEnd[1]; ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="color-detail"><strong>สถานที่ฝึกอบรม</strong> : <?php echo $row["location"] ?></div>
                                        <div><strong>กำหนดการเปิดรับสมัคร</strong> : <br> <?php echo DateThai($dateArrOpen[0]) . " " . $dateArrOpen[1]; ?></div>
                                        <div class="color-detail"><strong>กำหนดการปิดรับสมัคร</strong> : <br> <?php echo DateThai($dateArrClose[0]) . " " . $dateArrClose[1]; ?></div>
                                        <div><strong>รายละเอียดการชำระเงิน</strong> : <br> <?php echo $row["payment_details"] ?></div>
                                        <div class="color-detail"><strong>เอกสารที่เกี่ยวข้องกับการอบรม</strong> : <u><?php echo (empty($row["course_file"]) ? "" : "<a href='file_uploads/" . $row["course_file"] . "' target='_blank'>ดูเอกสาร</a>") ?></u></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <?php if (!empty($_SESSION["id_card"])) {
                                    if ($_SESSION["status"] == "user") {
                                ?>
                                        <form action="course_regis.php" method="post" class="col-md-4">
                                            <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                                            <button class="btn bg-main btn-lg text-white" type="submit" course_id="<?php echo $row["course_id"]; ?>">ลงทะเบียน</button>
                                        </form>
                                    <?php }
                                } else { ?>
                                    <form action="login.php" method="post" class="col-md-4">
                                        <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                                        <button class="btn bg-main btn-lg text-white" type="submit" course_id="<?php echo $row["course_id"]; ?>">ลงทะเบียน</button>
                                    </form>
                                <?php } ?>
                                <div class="box mt-3">
                                    <?php echo "" . $row["period_day"] . " วัน" . $row["period_time"] . " ชั่วโมง"; ?><i class="fa-solid fa-clock-rotate-left float-right"></i>
                                    <hr>
                                    ผู้ลงทะเบียน <?php echo countPerson($row["course_id"]); ?><i class="fa-solid fa-user-pen float-right"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="font-size-cus">วิทยากร</div>
                                    <?php
                                    if (!empty($row["lecturer"])) {
                                        $lecturerAarr = explode(",", $row["lecturer"]);
                                        foreach ($lecturerAarr as $key => $value) {
                                            $dataArr = getDataLecturer($value);
                                            $imgLec = $dataArr["img"];
                                            $nameLec = $dataArr["name"];
                                            echo '
                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <a href="teacher_detail.php?id_card=' . $value . '"><img src="file_uploads/lecturer/' . $imgLec . '?t=' . time() . '" width="80" height="80" class="rounded border border-white shadow" style="  background-repeat: no-repeat; background-size: cover;"></a>
                                                    </div>
                                                    <div class="col-md-9">
                                                    <a href="teacher_detail.php?id_card=' . $value . '"><p class="ml-1">' . $nameLec . '</p></a>
                                                    </div>
                                                </div>
                                                ';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row font-size-cus2">
                            <div class="col-md-12 border">
                                <strong>หลักการและเหตุผล</strong><br>
                                <?php echo $row["principle"]; ?>
                                <br>
                                <br>
                                <strong>วัตถุประสงค์</strong><br>
                                <?php
                                $objectiveArr =  explode(",", $row["objective"]);
                                foreach ($objectiveArr as $key => $value) {
                                    echo ($key + 1) . ". " . $value . "<br>";
                                }
                                ?>
                                <br>
                                <strong>หัวข้อการอบรม</strong><br>
                                <?php
                                $objectiveArr =  explode(",", $row["area_​​study"]);
                                foreach ($objectiveArr as $key => $value) {
                                    echo '<i class="fas fa-square-full small-font"></i>' . " " . $value . "<br>";
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <storng class="font-size-cus2">ตารางเวลา</storng>
                        <?php
                        $sqlTable = "select * from time_table where course_id='$course_id'";
                        $resTable = mysqli_query($conn, $sqlTable);

                        ?>
                        <table id="timeTable" class=" table table-striped table-bordered font-size-cus2" width="100%">
                            <thead>
                                <tr>
                                    <th>วัน</th>
                                    <th>เวลาเริ่ม</th>
                                    <th>เวลาจบ</th>
                                    <th>กิจกรรม</th>
                                    <th>Link เอกสาร</th>
                                    <th>Link วิดีโอ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rowTable = mysqli_fetch_array($resTable)) {  ?>
                                    <tr>
                                        <td><?php echo DateThai($rowTable["days"]); ?></td>
                                        <td><?php echo $rowTable["time_start"]; ?></td>
                                        <td><?php echo $rowTable["time_end"]; ?></td>
                                        <td><?php echo $rowTable["activity"]; ?></td>
                                        <td><?php if (!empty($rowTable["link_doc"])) {
                                                if (checkPass($id_card, $course_id) == "confirmed" || checkPass($id_card, $course_id) == "pass" || checkPass($id_card, $course_id) == "nopass" || $status == "admin") { ?>
                                                    <a class="linkDoc" target="_blank" time_id="<?php echo $rowTable["time_id"]; ?>" href="<?php echo $rowTable["link_doc"]; ?>">เอกสาร</a>
                                            <?php }
                                            } ?>
                                        </td>
                                        <td><?php if (!empty($rowTable["link_video"])) {
                                                if (checkPass($id_card, $course_id) == "confirmed" || checkPass($id_card, $course_id) == "pass" || checkPass($id_card, $course_id) == "nopass" || $status == "admin") { ?>
                                                    <a target="_blank" href="video.php?time_id=<?php echo $rowTable["time_id"]; ?>&course_id=<?php echo $course_id; ?>">วิดีโอ</a>
                                            <?php }
                                            } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <?php require_once "footer.php"; ?>
    </div>
    <?php require_once "scripts.php" ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#timeTable").DataTable({
            "scrollX": true
        });
        $(".linkDoc").click(function() {
            $.ajax({
                type: "POST",
                url: "log_user_SQL.php",
                data: {
                    time_id: $(this).attr('time_id'),
                    id_card: '<?php echo $id_card; ?>',
                    status: '<?php echo checkPass($id_card, $course_id); ?>',
                    detail: 'เปิดเอกสาร',
                },
                success: function(result) {

                }
            });
        })
    });
</script>