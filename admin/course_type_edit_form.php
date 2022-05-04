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
                    $type_id = $_GET["type_id"];
                    $sql = "select * from course_type where type_id = '$type_id'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">แก้ไขประเภทการอบรม</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <form action="course_type_edit_SQL.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <h4>ชื่อประเภท</h4>
                                        </label>
                                        <input type="hidden" name="type_id" value="<?php echo $row["type_id"]; ?>">
                                        <input class="form-control" type="text" name="type_name" id="type_name" value="<?php echo $row["type_name"]; ?>">
                                        <button class="btn btn-primary mt-3">แก้ไขประเภท</button>
                                    </div>
                                </div>
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