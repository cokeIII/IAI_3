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
                    $sql = "select * from course";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ตั้งค่าวุฒิบัตร</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <table id="course_all" class="table table-striped" width="100%">
                                <thead>
                                    <th>ชื่อรายการอบรม</th>
                                    <th>รายละเอียด</th>
                                    <th>วันเวลา</th>
                                    <th>รายชื่อผู้เข้าอบรม</th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) {
                                        $dateArrStrat = explode(" ", $row["start_date"]);
                                        $dateArrEnd = explode(" ", $row["end_date"]);
                                               
                                    ?>
                                        <tr>
                                            <td width="45%"><?php echo $row["course_name"]; ?></td>
                                            <td><a href="detail_course.php?course_id=<?php echo $row["course_id"]; ?>" class="">รายละเอียด</a></td>
                                            <td><?php echo "เรื่ม " . DateThai($dateArrStrat[0]) . "<br>เวลา " . $dateArrStrat[1]; ?><?php echo "<br>จบ " . DateThai($dateArrEnd[0]) . "<br>เวลา " . $dateArrEnd[1]; ?></td>
                                            <td><a href="cer_set_from.php?course_id=<?php echo $row["course_id"]; ?>">ตั้งค่าวุฒิบัตร</a></td>
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
        $("#course_all").DataTable({
            "scrollX": true
        });
    });
</script>