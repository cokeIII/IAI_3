<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
</head>
<style>
    html {
        overflow: auto;
    }

    html,
    body,
    div,
    iframe {
        margin: 0px;
        padding: 0px;
        height: 100%;
        border: none;
    }

    iframe {
        display: block;
        width: 100%;
        border: none;
        overflow-y: auto;
        overflow-x: hidden;
    }

    body {
        margin: 0;
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
                    <!-- Page Heading -->
                    <?php
                    require_once "connect.php";
                    $id_card = $_SESSION["id_card"];
                    $time_id = $_GET["time_id"];
                    $course_id = $_GET["course_id"];
                    $sql = "select * from time_table where time_id = '$time_id'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res);
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <?php echo $row["link_video"]; ?>
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