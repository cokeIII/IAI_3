<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - News</title>
    <?php require_once "header.php"; ?>
    <link rel="stylesheet" type="text/css" href="styles/news_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
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

    .text-content {
        font-size: 18px;
    }

    #newDetail:not(.show) {
        display: block;
        height: 8rem;
        overflow: hidden;
    }
</style>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <?php
            require_once "menu.php";
            require_once "admin/function.php";
            ?>
        </header>

        <!-- Menu -->
        <?php require_once "menu_mm.php"; ?>


        <!-- Home -->

        <div class="home">
            <div class="home_background_container prlx_parent">
                <div class="home_background prlx" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),url(images/220224088495865_22041813132131.jpg);"></div>
            </div>
            <div class="home_content">
                <h1>The News</h1>
            </div>
        </div>

        <div class="super_container">

            <!-- News -->

            <div class="news">
                <div class="container">
                    <div class="row">

                        <!-- News Column -->

                        <div class="col-lg-8">

                            <div class="news_posts">
                                <!-- News Post -->
                                <?php
                                $sql = "select * from public_relations";
                                $res = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($res)) {
                                    $pic_path = json_decode($row["pic_path"]);
                                    $dateNew = explode(" ", DateThai(explode(" ", $row["time_stamp"])[0]));

                                ?>
                                    <div class="news_post">
                                        <div class="news_post_image">
                                            <img src="file_uploads/bullhorn/<?php echo $pic_path[0]; ?>">
                                        </div>
                                        <div class="news_post_top d-flex flex-column flex-sm-row">
                                            <div class="news_post_date_container">
                                                <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                                    <div><?php echo $dateNew[0]; ?></div>
                                                    <div><?php echo $dateNew[1]; ?></div>
                                                    <div><?php echo $dateNew[2]; ?></div>
                                                </div>
                                            </div>
                                            <div class="news_post_title_container">
                                                <div class="news_post_title">
                                                    <a href="#"><?php echo $row["topic"]; ?></a>
                                                </div>
                                                <div class="news_post_meta">
                                                    <!-- <span class="news_post_author"><a href="#">By Christian Smith</a></span>
                                                <span>|</span> -->
                                                    <!-- <span class="news_post_comments"><a href="#">3 Comments</a></span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="news_post_text">
                                            <p id="newDetail"><?php echo $row["detail"]; ?></p>
                                        </div>
                                        <button class="news_post_button btn text-center trans_200 btnRead" topic="<?php echo $row["topic"]; ?>" pic_path='<?php echo $row["pic_path"]; ?>' detail="<?php echo $row["detail"]; ?>">
                                            <h3 class="text-white">Read More</h3>
                                        </button>
                                    </div>

                                <?php } ?>
                                <div class="news_post">
                                    <div class="news_post_image">
                                        <img src="images/5/S__83984468.jpg" alt="https://unsplash.com/@dsmacinnes">
                                    </div>
                                    <div class="news_post_top d-flex flex-column flex-sm-row">
                                        <div class="news_post_date_container">
                                            <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                                <div>30</div>
                                                <div>เมษายน</div>
                                            </div>
                                        </div>
                                        <div class="news_post_title_container">
                                            <div class="news_post_title">
                                                <a href="#">การอบรมหลักสูตรเทคโนโลยีปัญญาประดิษฐ์ในภาคอุตสาหกรรม AI อาชีวะ รุ่นที่ 5</a>
                                            </div>
                                            <div class="news_post_meta">
                                                <!-- <span class="news_post_author"><a href="#">By Christian Smith</a></span>
                                                <span>|</span> -->
                                                <!-- <span class="news_post_comments"><a href="#">3 Comments</a></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news_post_text">
                                        <p>จากที่สถาบันเทคโนโลยี ไทย-ญี่ปุ่น ร่วมกับ สำนักงานส่งเสริมเศรษฐกิจดิจิทัล (depa), สถาบันเทคโนโลยีการผลิตสุมิพล (SIMTEC), สถาบันการอาชีวศึกษาภาคตะวันออก, วิทยาลัยเทคนิคระยอง และวิทยาลัยเทคนิคชลบุรี จัดฝึกอบรม “หลักสูตรเทคโนโลยีปัญญาประดิษฐ์ในภาคอุตสาหกรรม (Industrial Artificial Intelligence Technology)”... </p>
                                    </div>
                                    <button class="news_post_button btn text-center trans_200" data-toggle="modal" data-target="#exampleModal1">
                                        <h3 class="text-white">Read More</h3>
                                    </button>
                                </div>
                            </div>

                            <!-- Page Nav -->

                            <!-- <div class="news_page_nav">
                                <ul>
                                    <li class="active text-center trans_200"><a href="#">01</a></li>
                                    <li class="text-center trans_200"><a href="#">02</a></li>
                                    <li class="text-center trans_200"><a href="#">03</a></li>
                                </ul>
                            </div> -->

                        </div>

                        <!-- Sidebar Column -->

                        <div class="col-lg-4">
                            <div class="sidebar">

                                <!-- Tags -->

                                <div class="sidebar_section">
                                    <div class="sidebar_section_title">
                                        <h3>Tags</h3>
                                    </div>
                                    <div class="tags d-flex flex-row flex-wrap">
                                        <div class="tag"><a href="#">อบรม</a></div>
                                        <div class="tag"><a href="#">AI อาชีวะ</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php require_once "footer.php"; ?>
    </div>
    <?php require_once "scripts.php" ?>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">การอบรมหลักสูตรเทคโนโลยีปัญญาประดิษฐ์ในภาคอุตสาหกรรม AI อาชีวะ รุ่นที่ 5</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="images/5/S__83984468.jpg" width="auto" height="250px">
                <div class="text-content"> เพื่อยกระดับขีดความสามารถของนักศึกษา ระดับอาชีวศึกษา ในเขต EEC พัฒนาทักษะให้เป็น “AI อาชีวะ” อย่างมืออาชีพ ผ่านการเรียนรู้อย่างเข้มข้นตลอดระยะเวลา 5 วันเต็ม โดยตลอด 5 วันนี้

                    นักศึกษารุ่นที่ 3 ได้รับความรู้ไปเต็มๆ กับการเรียนในเรื่องต่างๆ ไม่ว่าจะเป็น Manufacturing and Productivity, Controlling automation with a programmable controller, Data Collection and Middleware, Data analysis and visualization using Power BI, AI Vision and IoT for Smart Factory บอกเลยงานนี้นักศึกษา “มั่นคง มั่งคั่ง และยั่งยืน” แน่นอนจร้า
                </div>
                <hr>
                <img src="images/5/S__83984456.jpg" alt="" width="auto" height="150px" class="ml-1 mt-1">
                <img src="images/5/S__83984424.jpg" alt="" width="auto" height="150px" class="ml-1 mt-1">
                <img src="images/5/S__2195573.jpg" alt="" width="auto" height="150px" class="ml-1 mt-1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newsDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="newsDetailLabel">การอบรมหลักสูตรเทคโนโลยีปัญญาประดิษฐ์ในภาคอุตสาหกรรม AI อาชีวะ รุ่นที่ 5</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="img1" src="" width="auto" height="250px">
                <div class="text-content" id="newsContent">
                </div>
                <hr>
                <div id="pic_news_show" class="row">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btnRead', function() {
            let topic = $(this).attr("topic")
            let pic_path = JSON.parse($(this).attr("pic_path"))
            let detail = $(this).attr("detail")
            let res = ""
            $("#newsDetailLabel").html(topic)
            $("#img1").attr("src","file_uploads/bullhorn/"+pic_path[0])
            $("#newsContent").html(detail)
            pic_path.shift()
            pic_path.forEach(element => {
                res +=
                    '<div class="col-md-4">' +
                    '<img class="d-block w-100" src="file_uploads/bullhorn/' + element + '">' +
                    '</div>'
            });
            $("#pic_news_show").html(res)
            $("#newsDetail").modal("show")
        })
    })
</script>