<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Courses</title>
    <?php require_once "header.php"; ?>
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>
<style>
    .img-ta {
        background-size: cover !important;
        background-position: center !important;
        width: 50px;
        height: auto;
    }

    .cut-text {
        text-overflow: ellipsis;
        overflow: hidden;
        display: -webkit-box !important;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        white-space: normal;
        height: 50px;
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
                <div class="home_background prlx" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),url(images/220224088495865_22041813131733.jpg); background-size:cover; background-position: bottom;"></div>
            </div>
            <div class="home_content">
                <h1>Courses</h1>
            </div>
        </div>

        <!-- Popular -->

        <div class="popular page_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Courses</h1>
                        </div>
                    </div>
                </div>

                <div class="row course_boxes">
                    <?php
                    require_once "admin/function.php";
                    $sqlCou = "select * from course where status = 'on'";
                    $resCou = mysqli_query($conn, $sqlCou);
                    while ($rowCou = mysqli_fetch_array($resCou)) {
                        if ($rowCou["lecturer"]) {
                            $lecturer = explode(",", $rowCou["lecturer"]);
                        } else {
                            $lecturer[0] = "";
                        }
                        $lecturerArr = getDataLecturer($lecturer[0]);
                    ?>
                        <!-- Popular Course Item -->
                        <div class="col-lg-4 course_box ">
                            <div class="card">
                                <img class="card-img-top" src="file_uploads/img/<?php echo $rowCou["pic"]; ?>" width="auto" height="260">
                                <div class="card-body text-center">
                                    <div class="card-title cut-text"><a href="course_detail.php?course_id=<?php echo $rowCou["course_id"]; ?>"><?php echo $rowCou["course_name"]; ?></a></div>
                                    <!-- <div class="card-text"><?php //echo $rowCou["principle"]; 
                                                                ?></div> -->
                                </div>
                                <div class="price_box d-flex flex-row align-items-center">
                                    <div class="course_author_image">
                                        <?php if (empty($lecturerArr["img"])) { ?>
                                            <img src="images/person.png" class="img-ta">
                                        <?php } else { ?>
                                            <img src="file_uploads/lecturer/<?php echo $lecturerArr["img"]; ?>" class="img-ta">
                                        <?php } ?>
                                    </div>
                                    <div class="course_author_name"><a href="teacher_detail.php?id_card=<?php echo $lecturer[0]; ?>"><?php echo $lecturerArr["name"]; ?></a></div>
                                    <div class="course_price d-flex flex-column align-items-center justify-content-center"><span><?php echo ($rowCou["expenses"] > 0 ? $rowCou["expenses"] . " บาท" : "FREE"); ?></span></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once "footer.php"; ?>
    </div>
    <?php require_once "scripts.php" ?>
</body>

</html>