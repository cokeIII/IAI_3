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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">รายการที่ลงทะเบียนอบรม</h1>
                    </div>
                    <?php
                    require_once "function.php";
                    $sql = "select *,cr.status as crstatus from course_regis cr
    inner join course c on c.course_id = cr.course_id
    ";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <!-- Content Row -->
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <table id="course_regis" class="table table-striped">
                                <thead>
                                    <th>รหัสบัตรประชาชน</th>
                                    <th>ชื่อรายการอบรม</th>
                                    <th>รายละเอียด</th>
                                    <th>วันที่</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?php echo '<a target="_blank" href="profile_admin.php?id_card=' . $row["id_card"] . '">' . $row["id_card"] . ''; ?></td>
                                            <td width="30%"><?php echo $row["course_name"]; ?></td>
                                            <td><a href="detail_course.php?course_id=<?php echo $row["course_id"]; ?>" class="">รายละเอียด</a></td>
                                            <td><?php echo $row["time_stamp"]; ?></td>
                                            <td><?php echo $row["crstatus"]; ?></td>
                                            <td>
                                                <?php if ($row["crstatus"] == "wait") {
                                                    echo '<button class="btn btn-success btnConCourse" course_id="' . $row["course_id"] . '" id_card="' . $row["id_card"] . '">ยืนยัน</button>';
                                                    echo '<button class="btn btn-danger btnCanCourse ml-1" course_id="' . $row["course_id"] . '" id_card="' . $row["id_card"] . '">ยกเลิก</button>';
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
<script>
    $(document).ready(function() {
        $("#course_regis").DataTable({
            "scrollX": true
        });
        $(".btnCanCourse").click(function() {
            let course_id = $(this).attr("course_id")
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ต้องการยกเลิกรายการใช่หรือไม่ ?',
                showCancelButton: true,
                confirmButtonText: 'ยกเลิก',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('course_cancle.php', {
                        'course_id': course_id,
                        'id_card': id_card
                    });
                }
            })
        })
        $(".btnConCourse").click(function() {
            let course_id = $(this).attr("course_id")
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ยืนยันการลงทะเบียน ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('course_confirm.php', {
                        'id_card': id_card,
                        'course_id': course_id
                    });
                }
            })
        })
    });
</script>