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
                                <div class="news_post">
                                    <div class="news_post_image">
                                        <img src="images/news_1.jpg" alt="https://unsplash.com/@dsmacinnes">
                                    </div>
                                    <div class="news_post_top d-flex flex-column flex-sm-row">
                                        <div class="news_post_date_container">
                                            <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                                <div>18</div>
                                                <div>dec</div>
                                            </div>
                                        </div>
                                        <div class="news_post_title_container">
                                            <div class="news_post_title">
                                                <a href="news_post.html">Why do you need a qualification?</a>
                                            </div>
                                            <div class="news_post_meta">
                                                <span class="news_post_author"><a href="#">By Christian Smith</a></span>
                                                <span>|</span>
                                                <span class="news_post_comments"><a href="#">3 Comments</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news_post_text">
                                        <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies.</p>
                                    </div>
                                    <div class="news_post_button text-center trans_200">
                                        <a href="news_post.html">Read More</a>
                                    </div>
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
                                        <div class="tag"><a href="#">Course</a></div>
                                        <div class="tag"><a href="#">Design</a></div>
                                        <div class="tag"><a href="#">FAQ</a></div>
                                        <div class="tag"><a href="#">Teachers</a></div>
                                        <div class="tag"><a href="#">School</a></div>
                                        <div class="tag"><a href="#">Graduate</a></div>
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