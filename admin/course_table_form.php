<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
</head>

<body id="page-top">
    <?php
    require_once "function.php";
    $course_id = $_GET["course_id"];
    $sql = "select * from course where course_id='$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $sqlTable = "select * from time_table where course_id='$course_id' order by days asc";
    $resTable = mysqli_query($conn, $sqlTable);
    ?>

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
                        <h1 class="h3 mb-0 text-gray-800">จัดตาราง <?php echo $row["course_name"]; ?></h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="timeTable" class="table table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>วัน</th>
                                        <th>เวลาเริ่ม</th>
                                        <th>เวลาจบ</th>
                                        <th>กิจกรรม</th>
                                        <th>Link เอกสาร</th>
                                        <th>Link วิดีโอ (iframe)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($rowTable = mysqli_fetch_array($resTable)) {  ?>
                                        <tr>
                                            <td><?php echo DateThai($rowTable["days"]); ?></td>
                                            <td><?php echo $rowTable["time_start"]; ?></td>
                                            <td><?php echo $rowTable["time_end"]; ?></td>
                                            <td><?php echo $rowTable["activity"]; ?></td>
                                            <td>
                                                <?php if (!empty($rowTable["link_doc"])) { ?>
                                                    <a target="_blank" href="<?php echo $rowTable["link_doc"]; ?>">เอกสาร</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($rowTable["link_video"])) { ?>
                                                    <a target="_blank" href="video.php?time_id=<?php echo $rowTable["time_id"]; ?>&course_id=<?php echo $course_id; ?>">วิดีโอ</a>
                                                <?php } ?>
                                            </td>
                                            <td><a class="btn btn-danger" href="del_time.php?time_id=<?php echo $rowTable["time_id"]; ?>&course_id=<?php echo $rowTable["course_id"]; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card shadow mt-3 mb-5">
                        <div class="card-body">
                            <button class="btn btn-primary btnAddList"><i class="fas fa-plus"></i> เพิ่มรายการ</button>
                            <form action="course_table_sql.php" method="post">
                                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                                <div class="box-table-time mt-3 p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="time_course">วัน</label>
                                            <input type="date" class="form-control" name="days[]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="time_course">เวลา</label>
                                            <input type="time" class="form-control" name="time_course_s[]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="time_course">ถึง เวลา</label>
                                            <input type="time" class="form-control" name="time_course_e[]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="time_course">กิจกกรรม</label>
                                            <input type="text" class="form-control" name="activity[]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="time_course">Link เอกสาร</label>
                                            <input type="text" class="form-control" name="link_doc[]">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="time_course">Link วิดีโอ (iframe)</label>
                                            <input type="text" class="form-control" name="link_video[]">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-4 float-right"> เพิ่มตาราง </button>
                            </form>
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
<script>
    $("#timeTable").DataTable({
        "scrollX": true,
        "ordering": false,
    });
    $(".btnAddList").click(function() {
        $(".box-table-time").append(
            '<div class="row mt-2">' +
            '<div class="col-md-2">' +
            '<label for="time_course">วัน</label>' +
            '<input type="date" class="form-control" name="days[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">เวลา</label>' +
            '<input type="time" class="form-control" name="time_course_s[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">ถึง เวลา</label>' +
            '<input type="time" class="form-control" name="time_course_e[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">กิจกกรรม</label>' +
            '<input type="text" class="form-control" name="activity[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">Link เอกสาร</label>' +
            '<input type="text" class="form-control" name="link_doc[]" >' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="time_course">Link วิดีโอ</label>' +
            '<input type="text" class="form-control" name="link_video[]" >' +
            '</div>' +
            '</div>'
        )
    })
</script>