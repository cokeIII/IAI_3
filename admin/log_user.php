<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
</head>

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
                    <?php
                    require_once "function.php";
                    $id_card = $_GET["id_card"];
                    $course_id = $_GET["course_id"];
                    $sql = "select * from time_table where course_id = '$course_id' order by days,time_start";
                    $res = mysqli_query($conn, $sql);
                    $dataTime = checkTime($id_card, $course_id);

                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo getNameCourse($course_id); ?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="float-right" data-toggle="modal" data-target="#detailColor">
                                ความหมายสี
                            </a>
                            <h3>ประวัติการเข้ากิจกรรมของ <span id="nameUser"><?php echo getNameUser($id_card); ?></span></h3>
                            <table id="log_user" class="table table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>วันเวลากิจกรรม</th>
                                        <th>ชื่อกิจกรรม</th>
                                        <th>วันเวลาที่เข้าดูเอกสาร</th>
                                        <th>วันเวลาที่เข้าดูวิดีโอ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?php echo "วัน " . DateThai($row["days"]) . "<br>เวลา " . $row["time_start"] . " ถึง " . $row["time_end"]; ?></td>
                                            <td><?php echo $row["activity"]; ?></td>
                                            <td class="<?php echo $dataTime[$row["time_id"]]['doc'];
                                                        ?>"><?php echo checkDoc($id_card, $row["time_id"]); ?></td>
                                            <td class="<?php echo $dataTime[$row["time_id"]]['video'];
                                                        ?>"><?php echo checkVideo($id_card, $row["time_id"]); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <div class="box-datail p-3">
                                <h4>ผ่านกิจกรรมไปแล้ว : <span><?php echo calPercent($id_card, $course_id); ?> %</span></h4>
                                <h4>สถานะปัจจุบัน : <?php echo (checkPass($id_card, $course_id) == "pass" ? "<span class='text-success'>ผ่าน</span>" : (checkPass($id_card, $course_id) == "confirmed" ? "เข้าร่วมการอบรม" : "<span class='text-danger'>ไม่ผ่าน</span>")); ?></h4>
                            </div>
                            <hr>
                            <button course_id="<?php echo $course_id; ?>" id_card="<?php echo $id_card; ?>" class="btnNotPass btn btn-danger float-right ml-2">ไม่ผ่านการอบรม</button>
                            <button course_id="<?php echo $course_id; ?>" id_card="<?php echo $id_card; ?>" class="btnPass btn btn-success float-right">ผ่านการอบรม</button>

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
<!-- Modal -->
<div class="modal fade" id="detailColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailColorModalLabel">ความหมายสี</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row border">
                    <div class="col-4 p-4 bg-red"></div>
                    <div class="col-8 p-3">สีแดง มีลิงค์เอกสารหรือวิดีโอแต่ไม่ได้กดลิงค์เข้าไปดู</div>
                </div>
                <div class="row border">
                    <div class="col-4 p-4 bg-yellow"></div>
                    <div class="col-8 p-3">สีเหลือง เวลาในการดูวิดีโอใกล้กันมากเกินไป</div>
                </div>
                <div class="row border">
                    <div class="col-4 p-4 bg-green"></div>
                    <div class="col-8 p-3">สีเขียว เข้ากิจกรรมปกติ</div>
                </div>
                <div class="row border">
                    <div class="col-4 p-4 bg-blue"></div>
                    <div class="col-8 p-3">สีน้ำเงิน ไม่มีลิงค์เอกสารหรือวิดีโอ</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#log_user").DataTable({
            "scrollX": true
        });
        $(".btnNotPass").click(function() {
            Swal.fire({
                title: 'คุณต้องการให้ <div>' + $("#nameUser").text() + '</div> <span class="text-danger">ไม่ผ่านการอบรม</span> ?',
                text: "ตอบ ตกลง เพื่อยืนยันให้ ไม่ผ่านการอบรม",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "update_status_course.php",
                        data: {
                            id_card: $(this).attr("id_card"),
                            course_id: $(this).attr("course_id"),
                            status: "nopass"
                        },
                        success: function(result) {
                            if (result == "OK") {
                                // Swal.fire({
                                //     // position: 'top-end',
                                //     icon: 'success',
                                //     title: 'บันทึกสำเร็จ',
                                //     showConfirmButton: false,
                                //     timer: 1500
                                // })
                                window.location.replace("log_user.php?id_card=<?php echo $id_card; ?>&course_id=<?php echo $course_id; ?>");
                            } else {
                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'error',
                                    title: 'บันทึกไม่สำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                }
            })
        })
        $(".btnPass").click(function() {
            Swal.fire({
                title: 'คุณต้องการให้ <div>' + $("#nameUser").text() + '</div> <span class="text-success">ผ่านการอบรม</span> ?',
                text: "ตอบ ตกลง เพื่อยืนยันให้ ผ่านการอบรม",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "update_status_course.php",
                        data: {
                            id_card: $(this).attr("id_card"),
                            course_id: $(this).attr("course_id"),
                            status: "pass"
                        },
                        success: function(result) {
                            if (result == "OK") {
                                // Swal.fire({
                                //     // position: 'top-end',
                                //     icon: 'success',
                                //     title: 'บันทึกสำเร็จ',
                                //     showConfirmButton: false,
                                //     timer: 1500
                                // })
                                window.location.replace("log_user.php?id_card=<?php echo $id_card; ?>&course_id=<?php echo $course_id; ?>");

                            } else {
                                Swal.fire({
                                    // position: 'top-end',
                                    icon: 'error',
                                    title: 'บันทึกไม่สำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                }
            })
        })
    });
</script>