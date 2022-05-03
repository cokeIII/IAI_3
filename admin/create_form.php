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
                    $sql = "select * from create_form where course_id='$course_id'";
                    $res = mysqli_query($conn, $sql);
                    $count = 0;
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">สร้างฟอร์ม <?php echo getNameCourse($course_id); ?></h1>
                    </div>

                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <form action="create_form_SQL.php" method="post">
                                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                                <?php while ($row = mysqli_fetch_array($res)) {
                                    $count++ ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label><strong><?php echo $count; ?>. หัวข้อ/คำถาม</strong></label>
                                            <input class="form-control" type="text" name="topic[]" value="<?php echo $row["topic"]; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label><strong>ใส่ตัวเลือกแบบเลื่อนลงโดยใช้เครื่องหมาย , คั่นระหว่างตัวเลือก</strong></label>
                                            <input class="form-control" type="text" name="opt[]" value="<?php echo $row["opt"]; ?>" placeholder="ตัวเลือกที่1,ตัวเลือกที่2,ตัวเลือกที่3">
                                        </div>
                                        <div class="col-md-1">
                                            <a href="create_form_del.php?no=<?php echo $count; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-danger btnDelForm mt-4"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                                <?php for ($i = $count; $i < 5; $i++) { ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label><strong><?php echo $i + 1; ?>. หัวข้อ/คำถาม</strong></label>
                                            <input class="form-control" type="text" name="topic[]" value="<?php echo $row["topic"]; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label><strong>ใส่ตัวเลือกแบบเลื่อนลงโดยใช้เครื่องหมาย , คั่นระหว่างตัวเลือก</strong></label>
                                            <input class="form-control" type="text" name="opt[]" value="<?php echo $row["opt"]; ?>" placeholder="ตัวเลือกที่1,ตัวเลือกที่2,ตัวเลือกที่3">
                                        </div>
                                        <div class="col-md-1">
                                            <a href="create_form_del.php?no=<?php echo $i + 1; ?>&course_id=<?php echo $course_id; ?>" class="btn btn-danger btnDelForm mt-4"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>

                                <button type="submit" class="btn btn-primary mt-3 float-right">เพิ่มแบบฟอร์ม</button>
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