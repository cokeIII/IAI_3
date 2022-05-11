<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Bank</title>
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
    .heights{
        height: 800px;
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

        <div class="row justify-content-md-center mt-5 mb-5 heights">
            <div class="col-md-8 align-self-center">
                <form action="bank_SQL.php" method="post" enctype="multipart/form-data">
                    <div class="row text-size">
                        <div class="col-md-6">
                            <label>รหัสบัตรประชาชนที่สมัคร</label>
                            <input class="form-control" type="text" name="id_card" id="id_card" value="<?php echo $_SESSION["id_card"];?>" required readonly>
                        </div>
                        <div class="col-md-6">
                            <label>เลือกหลักสูตรอบรมที่สมัคร</label>
                            <select class="form-control" name="course_id" id="course_id" required>
                                <option value="">-</option>
                                <?php
                                $course_id = $_GET["course_id"];
                                require_once "admin/connect.php";
                                $sql = "select * from course";
                                $res = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($res)) {
                                ?>
                                    <option value="<?php echo $row["course_id"] ?>"><?php echo $row["course_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row text-size">
                        <div class="col-md-6">
                            <label>หลักฐานการชำระเงิน</label>
                            <input class="form-control" type="file" name="evidence" id="evidence">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 float-right">แจ้งการชำระเงิน</button>
                </form>
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
        course_id = '<?php echo $course_id;?>'
        $("#course_id").val(course_id)
    })
</script>