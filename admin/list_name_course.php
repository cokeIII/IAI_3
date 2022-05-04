<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
</head>
<style>
    .box-datail {
        background-color: #ebebeb;
    }

    .bg-red {
        background-color: #fc6d6d;
    }

    .bg-yellow {
        background-color: #fcdb6d;
    }

    .bg-green {
        background-color: #8dfcad;
    }

    .bg-blue {
        background-color: #5d72e8;
    }
</style>

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
                    $sql = "select * from course_regis r
    inner join users u on u.id_card = r.id_card
    where r.course_id = '$course_id' and r.status != 'wait'";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo getNameCourse($course_id); ?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <table id="list_name" class="table" width="100%">
                                <thead>
                                    <tr>
                                        <th>รหัสบัตรประชาชน</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ชื่อบริษัท/องค์กร</th>
                                        <th>เปอร์เซ็นการเข้าร่วม</th>
                                        <th>สถานะ</th>
                                        <th>ประวัติการเข้าอบรม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($res)) {
                                        $dataTime = checkTime($row["id_card"], $course_id);

                                    ?>
                                        <tr>
                                            <td><?php echo $row["id_card"]; ?></td>
                                            <td><?php echo $row["prefix"] . $row["first_name_th"] . " " . $row["last_name_th"]; ?></td>
                                            <td><?php echo $row["organization"]; ?></td>
                                            <td class="<?php echo checkColor($dataTime); ?>"><?php echo calPercent($row["id_card"], $row["course_id"]) . ' %'; ?></td>
                                            <td><?php echo (checkPass($row["id_card"], $course_id) == "pass" ? "<span class='text-success'>ผ่าน</span>" : (checkPass($row["id_card"], $course_id) == "confirmed" ? "เข้าร่วมการอบรม" : "<span class='text-danger'>ไม่ผ่าน</span>")); ?></td>
                                            <td><a href="log_user.php?id_card=<?php echo $row["id_card"]; ?>&course_id=<?php echo $course_id; ?>">ดูประวัติ</a></td>
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
<?php
function checkColor($dataTime)
{
    foreach ($dataTime as $key => $value) {
        if ($dataTime[$key]['doc'] == 'bg-red') {
            return 'bg-red';
        } else if ($dataTime[$key]['video'] == 'bg-yellow') {
            return 'bg-red';
        } else if ($dataTime[$key]['video'] == 'bg-red') {
            return 'bg-red';
        }
    }
    return "";
}
?>