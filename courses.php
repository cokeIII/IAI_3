<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Courses</title>
    <?php require_once "header.php"; ?>
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <?php require_once "menu.php"; ?>
        </header>

        <!-- Menu -->
        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="index.html">Home</a></li>
                        <li class="menu_item menu_mm"><a href="#">About us</a></li>
                        <li class="menu_item menu_mm"><a href="#">Courses</a></li>
                        <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
                        <li class="menu_item menu_mm"><a href="news.html">News</a></li>
                        <li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
                    </ul>

                    <!-- Menu Social -->

                    <div class="menu_social_container menu_mm">
                        <ul class="menu_social menu_mm">
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>

                    <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
                </div>

            </div>

        </div>

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
                            <h1>Popular Courses</h1>
                        </div>
                    </div>
                </div>

                <div class="row course_boxes">

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_1.jpg" alt="https://unsplash.com/@kellybrito">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">A complete guide to design</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_2.jpg" alt="https://unsplash.com/@cikstefan">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">Beginners guide to HTML</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_3.jpg" alt="https://unsplash.com/@dsmacinnes">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">Advanced Photoshop</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_4.jpg" alt="https://unsplash.com/@kellitungay">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">A complete guide to design</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_5.jpg" alt="https://unsplash.com/@claybanks1989">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">Beginners guide to HTML</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_6.jpg" alt="https://unsplash.com/@element5digital">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">Advanced Photoshop</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_7.jpg" alt="https://unsplash.com/@gaellemm">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">A complete guide to design</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_8.jpg" alt="https://unsplash.com/@juanmramosjr">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">Beginners guide to HTML</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="images/course_9.jpg" alt="https://unsplash.com/@kimberlyfarmer">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">Advanced Photoshop</a></div>
                                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
                            </div>
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