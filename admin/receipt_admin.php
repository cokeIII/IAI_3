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
                    $sql = "select *,b.time_stamp as tb from bank b
                    inner join users u on b.id_card = u.id_card
                    ";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">รับใบเสร็จ</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <h3>รับใบเสร็จ</h3>
                            <hr>
                            <table id="bank" class="table table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>ชื่อผู้ส่งหลักฐาน</th>
                                        <th>ชื่อหลักสูตรอบรม</th>
                                        <th>วันเวลาส่งหลักฐาน</th>
                                        <th>หลักฐาน</th>
                                        <th>ใบเสร็จ</th>
                                        <th>อัพโหลดใบเสร็จ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"]; ?></td>
                                            <td><?php echo getNameCourse($row["course_id"]); ?></td>
                                            <td><?php echo $row["tb"]; ?></td>
                                            <td><a target="_blank" href="../file_uploads/bank/<?php echo $row["evidence"]; ?>" alt="">ดูหลักฐาน</a></td>
                                            <td><?php echo (empty($row["receipt"]) ? "ยังไม่ได้รับใบเสร็จ" : '<a target="_blank" href="../file_uploads/receipt/' . $row["receipt"] . '" alt="">ดูใบเสร็จ</a>'); ?></td>
                                            <td>
                                                <form action="receipt_admin_SQL.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id_card" value="<?php echo $row["id_card"]; ?>">
                                                    <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                                                    <input class="form-control" type="file" name="receipt">
                                                    <button type="submit" class="btn btn-primary mt-1 float-right">อัพโหลดใบเสร็จ</button>
                                                </form>
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
        $("#bank").DataTable({
            "scrollX": true
        });
    });
</script>