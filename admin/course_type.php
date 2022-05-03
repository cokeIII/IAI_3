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
                    $sql = "select * from course_type";
                    $res = mysqli_query($conn, $sql);

                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ประเภทการอบรม</h1>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <a href="course_type_add_form.php" class="btn btn-primary mb-5">เพิ่มรายการ</a>
                            <table id="list_type" class="table table-striped" width="100%">
                                <thead>
                                    <th>ลำดับ</th>
                                    <th>ชื่อรายการ</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <th><?php echo $row["type_id"] ?></th>
                                            <th><?php echo $row["type_name"] ?></th>
                                            <th><a href="course_type_edit_form.php" class="btn btn-warning"><i class="fas fa-edit"></i></a></th>
                                            <th><button type_id="<?php echo $row["type_id"] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></th>
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
        $("#list_type").DataTable({
            "scrollX": true
        });
    });
</script>