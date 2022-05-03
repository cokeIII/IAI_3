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
            <?php
            require_once "function.php";
            $sql = "select * from registrar";
            $res = mysqli_query($conn, $sql);
            ?>

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">เจ้าหน้าที่</h1>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <a href="registrar_form_add.php" class="btn btn-primary mb-3">เพิ่มรายการ</a>
                            <table id="registrar_all" class="table table-striped" width="100%">
                                <thead>
                                    <th>ชื่อ-สกุล</th>
                                    <th>โทรศัพท์</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?php echo $row["prefix"] . $row["first_name"] . " " . $row["last_name"]; ?></td>
                                            <td><?php echo $row["phone"]; ?></td>
                                            <td><a class="btn btn-warning" href="registrar_form_edit.php?id_card=<?php echo $row["id_card"]; ?>"><i class="fas fa-edit"></i></a></td>
                                            <td><button id_card="<?php echo $row["id_card"]; ?>" class="btn btn-danger btnDelLec"><i class="fas fa-trash-alt"></i></button></td>
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
        $("#registrar_all").DataTable({
            "scrollX": true
        });
        $(".btnDelLec").click(function() {
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ลบรายการ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('registrar_del.php', {
                        'id_card': id_card,
                    });
                }
            })
        })
    });
</script>