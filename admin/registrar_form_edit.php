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

                    $id_card = $_GET["id_card"];
                    $sql = "select * from registrar where id_card = '$id_card'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res);
                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">แก้ไขข้อมูลเจ้าหน้าที่</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-thumbnail shadow mb-2" width="250" height="250" src="../file_uploads/registrar/<?php echo $row["pic"]; ?>" alt="">
                            </div>
                            <form action="registrar_edit_SQL.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>รหัสบัตรประชาชน</strong></label>
                                        <input class="form-control" type="text" name="id_card" id="id_card" required readonly value="<?php echo $row["id_card"]; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>คำนำหน้า</strong></label>
                                        <select id="prefix" class="form-control" name="prefix" id="prefix" required>
                                            <option value="">-</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>ชื่อ</strong></label>
                                        <input class="form-control" name="first_name" id="first_name" required value="<?php echo $row["first_name"]; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>สกุล</strong></label>
                                        <input class="form-control" name="last_name" id="last_name" required value="<?php echo $row["last_name"]; ?>">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label><strong>สถานที่ที่สามารถติดต่อได้สะดวก</strong></label>
                                        <input class="form-control" type="text" name="easily_contacted" id="easily_contacted" required value="<?php echo $row["easily_contacted"]; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>โทรศัพท์มือถือ</strong></label>
                                        <input class="form-control" type="text" name="phone" id="phone" required value="<?php echo $row["phone"]; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>E-mail</strong></label>
                                        <input class="form-control" type="text" name="email" id="email" required value="<?php echo $row["email"]; ?>">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <label><strong>รูปประจำตัว</strong></label>
                                        <input class="form-control" type="file" name="pic" id="pic">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>รหัสผ่าน</strong></label>
                                        <input class="form-control" type="password" name="password" id="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning float-right mt-2">แก้ไขรายการ</button>
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
    $(document).ready(function() {
        let prefix = '<?php echo $row["prefix"]; ?>'
        $("#prefix").val(prefix)
    });
</script>