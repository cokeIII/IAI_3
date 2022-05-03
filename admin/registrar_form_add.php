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
                        <h1 class="h3 mb-0 text-gray-800">เพิ่มเจ้าหน้าที่</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <h3>เจ้าหน้าที่</h3>
                            <hr>
                            <form action="registrar_add_SQL.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>รหัสบัตรประชาชน</strong></label>
                                        <input class="form-control" type="text" name="id_card" id="id_card" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>คำนำหน้า</strong></label>
                                        <select class="form-control" name="prefix" id="prefix" required>
                                            <option value="">-</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>ชื่อ</strong></label>
                                        <input class="form-control" name="first_name" id="first_name" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>สกุล</strong></label>
                                        <input class="form-control" name="last_name" id="last_name" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label><strong>สถานที่ที่สามารถติดต่อได้สะดวก</strong></label>
                                        <input class="form-control" type="text" name="easily_contacted" id="easily_contacted" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>โทรศัพท์มือถือ</strong></label>
                                        <input class="form-control" type="text" name="phone" id="phone" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>E-mail</strong></label>
                                        <input class="form-control" type="text" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <label><strong>รูปประจำตัว</strong></label>
                                        <input class="form-control" type="file" name="pic" id="pic">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>รหัสผ่าน</strong></label>
                                        <input class="form-control" type="password" name="password" id="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">เพิ่มรายการ</button>
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