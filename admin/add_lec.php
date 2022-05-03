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
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">เลือกวิทยากร</h1>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <h4>รายชื่อวิทยากรปัจจุบัน</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ชื่อ-สกุล</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlInSub = "select lecturer from course where course_id='$course_id'";
                                    $resInSub = mysqli_query($conn, $sqlInSub);
                                    $rowInSub = mysqli_fetch_array($resInSub);

                                    $sqlIn = "select * from lecturer where id_card in (" . (!empty($rowInSub["lecturer"]) ? $rowInSub["lecturer"] : "''") . ")";
                                    $resIn = mysqli_query($conn, $sqlIn);
                                    $numIn = mysqli_num_rows($resIn);
                                    while ($rowIn = mysqli_fetch_array($resIn)) { ?>
                                        <tr>
                                            <td><a target="_blank" href="lecturer_profile.php?id_card=<?php echo $rowIn["id_card"]; ?>"><?php echo $rowIn["prefix"] . $rowIn["first_name"] . " " . $rowIn["last_name"]; ?></a></td>
                                            <td><button course_id="<?php echo $course_id; ?>" id_card="<?php echo $rowIn["id_card"]; ?>" class="btn btn-danger btnDelLec"><i class="fas fa-trash-alt"></i></button></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($numIn < 1) { ?>
                                        <tr>
                                            <td>ยังไม่มีวิทยากร</td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <form action="add_lec_SQL.php" method="post">
                                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                                <table class="table table-striped" id="list_lecturer" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ-สกุล</th>
                                            <th>ตำแน่งปัจจุบัน</th>
                                            <th>โทรศัพท์</th>
                                            <th>เลือก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "select * from lecturer where id_card not in (" . (!empty($rowInSub["lecturer"]) ? $rowInSub["lecturer"] : "''") . ")";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($res)) { ?>
                                            <tr>
                                                <td><a target="_blank" href="lecturer_profile.php?id_card=<?php echo $row["id_card"]; ?>"><?php echo $row["prefix"] . $row["first_name"] . " " . $row["last_name"]; ?></a></td>
                                                <td><?php echo $row["current_position"]; ?></td>
                                                <td><?php echo $row["phone"]; ?></td>
                                                <td><input value="<?php echo $row["id_card"]; ?>" type="checkbox" name="id_card[]" id="<?php echo $row["id_card"]; ?>"></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary mt-3 float-right btnAddLec">บันทึกที่เลือก</button>
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
        $('#list_lecturer').DataTable({
            "scrollX": true
        })
        $(".btnDelLec").click(function() {
            let id_card = $(this).attr("id_card")
            let course_id = $(this).attr("course_id")
            Swal.fire({
                title: 'ลบรายการ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('del_lec.php', {
                        'id_card': id_card,
                        'course_id': course_id,
                    }, "POST");
                }
            })
        })
    });
</script>