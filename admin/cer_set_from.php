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
                    $course_id = $_GET["course_id"];
                    $sql = "select * from course where course_id='$course_id'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ตั้งค่าวุฒิบัตร</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <h3><?php echo $row["course_name"] ?></h3>
                            <hr>
                            <form action="cer_SQL.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cer_min">
                                                <h5>หมายเลขวุฒิบัตรเริ่มต้น</h5>
                                            </label>
                                            <input class="form-control" type="number" name="cer_min" id="cer_min" value="<?php echo $row["cer_min"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cer_max">
                                                <h5>หมายเลขวุฒิบัตรสิ้นสุด</h5>
                                            </label>
                                            <input class="form-control" type="number" name="cer_max" id="cer_max" value="<?php echo $row["cer_max"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cer_pic">
                                                <h5>ภาพวุฒิบัติ <?php echo (!empty($row["cer_pic"]) ? "<a target='_blank' href='../file_uploads/cer/" . $row["cer_pic"] . "'>ดูภาพ</a>" : ""); ?></h5>
                                            </label>
                                            <input class="form-control" type="file" name="cer_pic" id="cer_max" value="<?php echo $row["cer_max"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">บันทึก</button>
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