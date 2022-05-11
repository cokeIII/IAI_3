<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Registered course</title>
    <?php require_once "header.php"; ?>
    <link rel="stylesheet" type="text/css" href="styles/teachers_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/teachers_responsive.css">
</head>
<style>
    .bg-box-item {
        background: rgba(255, 255, 255, 0.47);
        /* border-radius: 16px; */
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(4.3px);
        -webkit-backdrop-filter: blur(4.3px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .text-size {
        font-size: 18px;
        color: black;
    }
</style>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <?php require_once "menu.php"; ?>
        </header>

        <!-- Menu -->
        <?php require_once "menu_mm.php"; ?>


        <!-- Home -->

        <div class="home">
            <div class="home_background_container prlx_parent">
                <div class="home_background prlx" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),url(images/220224088495865_22041813132131.jpg);"></div>
            </div>
            <div class="home_content">
                <h1>Registered</h1>
            </div>
        </div>
        <?php
        require_once "admin/function.php";
        $id_card = $_SESSION["id_card"];
        $sql = "select *,cr.status as crstatus from course_regis cr
    inner join course c on c.course_id = cr.course_id
    where  cr.id_card = '$id_card'";
        $res = mysqli_query($conn, $sql);
        ?>
        <div class="row justify-content-md-center mt-5 mb-5">
            <div class="col-md-8 align-self-center">
                <table id="course_regis" class="table table-striped text-size" width="100%">
                    <thead>
                        <tr>
                            <th>ชื่อรายการอบรม</th>
                            <th>รายละเอียด</th>
                            <th>วันที่</th>
                            <th>ชำระเงิน</th>
                            <th>สถานะ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td width="45%"><?php echo $row["course_name"]; ?></td>
                                <td><a href="course_detail.php?course_id=<?php echo $row["course_id"]; ?>" class="">รายละเอียด</a></td>
                                <td><?php echo $row["time_stamp"]; ?></td>
                                <td>
                                    <?php if ($row["expenses"] > 0) {
                                        if (empty(checkBank($id_card, $row["course_id"]))) { ?>
                                            <a href="bank.php?course_id=<?php echo $row["course_id"]; ?>">ชำระเงิน</a>
                                        <?php } else if (checkBank($id_card, $row["course_id"]) == "ส่งหลักฐานแล้ว") { ?>
                                            ส่งหลักฐานแล้ว
                                        <?php } else { ?>
                                            <a target="_blank" href="file_uploads/receipt/<?php echo checkBank($id_card, $row["course_id"]); ?>">ใบเสร็จ</a>
                                        <?php }
                                    } else { ?>
                                        FREE
                                    <?php } ?>
                                </td>
                                <td><?php echo (checkPass($id_card, $row["course_id"]) == "pass" ? "<span class='text-success'>ผ่าน</span>" : (checkPass($id_card, $row["course_id"]) == "confirmed" ? "เข้าร่วมการอบรม" : (checkPass($id_card, $row["course_id"]) == "wait" ? "<span class='text-warning'>รอการยืนยัน</span>" : "<span class='text-danger'>ไม่ผ่าน</span>"))); ?></td>
                                <td>
                                    <?php if ($row["crstatus"] == "wait") {
                                        echo '<button class="btn btn-danger btnCanCourse" course_id="' . $row["course_id"] . '">ยกเลิก</button>';
                                    } else if ($row["crstatus"] == "pass" && !empty($row["cer_pic"])) {
                                        echo '<a target="_blank" href="report_cer.php?id_card=' . $_SESSION["id_card"] . '&course_id=' . $row["course_id"] . '" class="btn btn-success btnCer" course_id="' . $row["course_id"] . '">ใบประกาศ</a>';
                                    } ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Footer -->

        <?php require_once "footer.php"; ?>
    </div>
    <?php require_once "scripts.php" ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#course_regis").DataTable({
            "scrollX": true
        });
        $(".btnCanCourse").click(function() {
            let course_id = $(this).attr("course_id")
            Swal.fire({
                title: 'ต้องการยกเลิกรายการใช่หรือไม่ ?',
                showCancelButton: true,
                confirmButtonText: 'ยกเลิก',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('course_cancle.php', {
                        'course_id': course_id
                    });
                }
            })
        })
    });
</script>