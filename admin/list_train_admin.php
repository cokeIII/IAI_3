<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
</head>
<style>

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
                        <h1 class="h3 mb-0 text-gray-800">รายการอบรม</h1>
                    </div>
                    <?php
                    require_once "function.php";
                    // if (empty($_SESSION["id_card"])) {
                    //     header("location: logout.php");
                    // }
                    $sql = "select * from course";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <div class="card shadow wrap mb-5">
                        <div class="card-body">
                            <a href="add_train.php"><button class="btn btn-primary mb-3">เพิ่มรายการ</button></a>

                            <table id="list_course" class="" width="100%">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อรายการ</th>
                                        <th>กำหนดการ</th>
                                        <th>สถานที่ฝึกอบรม</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    while ($row = mysqli_fetch_array($res)) {
                                        $dateArrStrat = explode(" ", $row["start_date"]);
                                        $dateArrEnd = explode(" ", $row["end_date"]);
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row["course_name"]; ?></td>
                                            <td><?php echo "เรื่ม " . DateThai($dateArrStrat[0]) . "<br>เวลา " . $dateArrStrat[1]; ?><?php echo "<br>จบ " . DateThai($dateArrEnd[0]) . "<br>เวลา " . $dateArrEnd[1]; ?></td>
                                            <td><?php echo $row["location"]; ?></td>
                                            <td><a href="detail_course.php?course_id=<?php echo $row["course_id"]; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                                            <td><a href="edit_train.php?course_id=<?php echo $row["course_id"]; ?>" class="btn btn-warning">แก้ไข</a></td>
                                            <td><button type="button" course_id="<?php echo $row["course_id"]; ?>" class="btn btn-danger btnDelCourse">ลบ</button></td>
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
        $('#list_course').DataTable({
            scrollX: true,
            columnDefs: [{
                render: function(data, type, full, meta) {
                    return "<div class='text-nowrap'>" + data + "</div>";
                },
                targets: 2
            }]
        });
        $(".btnDelCourse").click(function() {
            let course_id = $(this).attr("course_id")
            Swal.fire({
                title: 'ต้องการลบรายการใช่หรือไม่ ?',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('del_train.php', {
                        'course_id': course_id
                    });
                }
            })
        })
    });
</script>