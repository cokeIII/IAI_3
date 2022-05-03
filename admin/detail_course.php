<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
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
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">รายละเอียด</h1>
                    </div>
                    <?php
                    require_once "function.php";
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
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 bg-primary box-header">
                                    <div><?php echo $row["course_name"]; ?></div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <img src="../file_uploads/img/<?php echo $row["pic"] ?>" alt="" class="img-fluid" height="450">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="color-detail"><strong>กลุ่มเป้าหมาย</strong> : <?php echo $row["target"] ?></h5>
                                            <h5><strong>จำนวนผู้อบรม</strong> :
                                                <?php echo ($row["number_trainees"] < 1 ? "ไม่ได้ระบุ" : $row["number_trainees"]) ?>
                                            </h5>
                                            <h5 class="color-detail"><strong>ค่าใช้จ่าย(บาท)</strong> : <?php echo $row["expenses"] ?></h5>
                                            <h5><strong>วันที่เริ่มการอบรม</strong> : <br> <?php echo DateThai($dateArrStrat[0]) . " " . $dateArrStrat[1]; ?></h5>
                                            <h5 class="color-detail"><strong>วันที่สิ้นสุดการอบรม</strong> : <br> <?php echo DateThai($dateArrEnd[0]) . " " . $dateArrEnd[1]; ?></h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="color-detail"><strong>สถานที่ฝึกอบรม</strong> : <?php echo $row["location"] ?></h5>
                                            <h5><strong>กำหนดการเปิดรับสมัคร</strong> : <br> <?php echo DateThai($dateArrOpen[0]) . " " . $dateArrOpen[1]; ?></h5>
                                            <h5 class="color-detail"><strong>กำหนดการปิดรับสมัคร</strong> : <br> <?php echo DateThai($dateArrClose[0]) . " " . $dateArrClose[1]; ?></h5>
                                            <h5><strong>รายละเอียดการชำระเงิน</strong> : <br> <?php echo $row["payment_details"] ?></h5>
                                            <h5 class="color-detail"><strong>เอกสารที่เกี่ยวข้องกับการอบรม</strong> : <u><?php echo (empty($row["course_file"]) ? "" : "<a href='file_uploads/" . $row["course_file"] . "' target='_blank'>ดูเอกสาร</a>") ?></u></h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="box mt-3">
                                        <?php echo "" . $row["period_day"] . " วัน" . $row["period_time"] . " ชั่วโมง"; ?><i class="fa-solid fa-clock-rotate-left float-right"></i>
                                        <hr>
                                        ผู้ลงทะเบียน <?php echo countPerson($row["course_id"]); ?><i class="fa-solid fa-user-pen float-right"></i>
                                    </div>
                                    <div class="mt-3">
                                        <h4>วิทยากร</h4>
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
                                                        <img src="../file_uploads/lecturer/' . $imgLec . '?t=' . time() . '" width="80" height="80" class="rounded border border-white shadow" style="  background-repeat: no-repeat; background-size: cover;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="ml-1">' . $nameLec . '</p>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 border">
                                    <h5><strong>หลักการและเหตุผล</strong></h5>
                                    <?php echo $row["principle"]; ?>
                                    <br>
                                    <br>
                                    <h5><strong>วัตถุประสงค์</strong></h5>
                                    <?php
                                    $objectiveArr =  explode(",", $row["objective"]);
                                    foreach ($objectiveArr as $key => $value) {
                                        echo ($key + 1) . ". " . $value . "<br>";
                                    }
                                    ?>
                                    <br>
                                    <h5><strong>หัวข้อการอบรม</strong></h5>
                                    <?php
                                    $objectiveArr =  explode(",", $row["area_​​study"]);
                                    foreach ($objectiveArr as $key => $value) {
                                        echo '<i class="fas fa-square-full small-font"></i>' . " " . $value . "<br>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <h3>ตารางเวลา</h3>
                            <?php
                            $sqlTable = "select * from time_table where course_id='$course_id'";
                            $resTable = mysqli_query($conn, $sqlTable);

                            ?>
                            <table id="timeTable" class=" table table-striped table-bordered" width="100%">
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
                                            <td><?php echo $rowTable["days"]; ?></td>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once "footer_content.php"; ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once "footer.php"; ?>
</body>

</html>