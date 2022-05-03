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
                    $search = "";
                    if (!empty($_POST["id_card"])) {
                        $search = $_POST["id_card"];
                    }
                    $sql = "select * from users where status!= 'admin'";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">รายชื่อสมาชิก</h1>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <a href="add_user.php"><button class="btn btn-primary mb-3">เพิ่มสมาชิก</button></a>

                            <h3>รายชื่อสมาชิก</h3>
                            <table id="list_user" class="table table-striped" width="100%">
                                <thead>
                                    <th>รหัสบัตรประชาชน</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>ชื่อบริษัท/องค์กร</th>
                                    <th>วันเวลาที่สมัคร</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?php echo $row["id_card"]; ?></td>
                                            <td><?php echo $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"]; ?></td>
                                            <td><?php echo $row["organization"]; ?></td>
                                            <td><?php echo $row["time_stamp"]; ?></td>
                                            <td><a class="btn btn-warning" href="profile_admin.php?id_card=<?php echo $row["id_card"]; ?>"><i class="fas fa-edit"></i></a></td>
                                            <td><button id_card="<?php echo $row["id_card"]; ?>" class="btn btn-danger btnDelUser"><i class="fas fa-trash-alt"></i></button></td>
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
        $("#list_user").DataTable({
            "scrollX": true,
            "oSearch": {
                "sSearch": '<?php echo $search; ?>'
            }
        });

        $(".btnDelUser").click(function() {
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ต้องการลบรายการ ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('user_del.php', {
                        'id_card': id_card,
                    });
                }
            })
        })
    });
</script>