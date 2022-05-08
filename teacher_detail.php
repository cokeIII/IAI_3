<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Teachers</title>
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

    .bg-name {
        background-color: #ba0a0a;
    }

    .text-name-size {
        font-size: 35px;
    }

    .text-content {
        font-size: 25px;
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
                <h1>Teachers</h1>
            </div>
        </div>

        <!-- Teachers -->

        <div class="teachers page_section">
            <div class="container">
                <div class="row">
                    <?php
                    require_once "admin/function.php";
                    $id_card = $_GET["id_card"];
                    $sqlTea = "select * from lecturer where id_card = '$id_card'";
                    $resTea = mysqli_query($conn, $sqlTea);
                    $rowTea = mysqli_fetch_array($resTea);
                    ?>

                    <div class="col-md-4">
                        <img class="border shadow rounded" src="file_uploads/lecturer/<?php echo $rowTea["pic"]; ?>" width="300" height="auto">
                    </div>
                    <div class="col-md-8">
                        <div class="bg-name text-white text-name-size p-3 rounded">
                            <?php echo $rowTea["prefix"] . $rowTea["first_name"] . " " . $rowTea["last_name"]; ?>
                        </div>
                        <div class="text-content">
                            <div class="mt-2"><strong>ตำแหน่ง</strong> : <?php echo $rowTea["current_position"]; ?></div>
                        </div>
                        <div class="text-content">
                            <div class="mt-2"><strong>ข้อมูลการติดต่อ</strong></div>
                            <div class="mt-2">- <?php echo $rowTea["easily_contacted"]; ?></div>
                            <div class="mt-2"><i class="fas fa-mobile-alt"></i> <?php echo $rowTea["phone"]; ?></div>
                            <div class="mt-2"><i class="fas fa-envelope"></i> <?php echo $rowTea["email"]; ?></div>
                        </div>
                        <div class="text-content">
                            <div class="mt-2"><strong>ประวัติการศึกษา / ฝึกอบรม</strong></div>
                            <div class="mt-2">- <?php echo $rowTea["edu_training_history"]; ?></div>
                        </div>
                        <div class="text-content">
                            <div class="mt-2"><strong>ประวัติการทำงาน</strong></div>
                            <div class="mt-2">- <?php echo $rowTea["work_history"]; ?></div>
                        </div>
                        <div class="text-content">
                            <div class="mt-2"><strong>ประสบการณ์</strong></div>
                            <div class="mt-2">- <?php echo $rowTea["experience"]; ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Milestones -->

        <div class="milestones">
            <div class="milestones_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),url(images/220224088495865_22041813131736.jpg);"></div>

            <div class="container">
                <div class="row">

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col bg-box-item">
                        <div class="milestone text-center">
                            <div class="milestone_icon mt-2"><img src="images/milestone_1.svg"></div>
                            <div class="milestone_counter"><?php echo  countUsers(); ?></div>
                            <div class="milestone_text text-dark">Current Users</div>
                        </div>
                    </div>

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col bg-box-item">
                        <div class="milestone text-center">
                            <div class="milestone_icon mt-2"><img src="images/milestone_2.svg"></div>
                            <div class="milestone_counter"><?php echo  countLecturer(); ?></div>
                            <div class="milestone_text text-dark">Certified Teachers</div>
                        </div>
                    </div>

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col bg-box-item">
                        <div class="milestone text-center">
                            <div class="milestone_icon mt-2"><img src="images/milestone_3.svg"></div>
                            <div class="milestone_counter"><?php echo  countCourse(); ?></div>
                            <div class="milestone_text text-dark">Approved Courses</div>
                        </div>
                    </div>

                    <!-- Milestone -->
                    <div class="col-lg-3 milestone_col bg-box-item">
                        <div class="milestone text-center">
                            <div class="milestone_icon mt-2"><img src="images/milestone_4.svg"></div>
                            <div class="milestone_counter"><?php echo  countPass(); ?></div>
                            <div class="milestone_text text-dark">Graduate Users</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer -->

        <?php require_once "footer.php"; ?>
    </div>
    <?php require_once "scripts.php" ?>
</body>

</html>