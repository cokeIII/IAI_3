<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Contact</title>
    <?php require_once "header.php"; ?>
    <link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
                <h1>Contact</h1>
            </div>
        </div>


        <!-- Contact -->

        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <!-- Contact Form -->
                        <div class="contact_form">
                            <div class="contact_title">Get in touch</div>

                            <div class="contact_form_container">
                                <form action="post">
                                    <input id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
                                    <input id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
                                    <textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                                    <button id="contact_send_btn" type="button" class="contact_send_btn trans_200" value="Submit">send message</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="about">
                            <!-- <div class="about_title">Join Courses</div>
                            <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p> -->

                            <div class="contact_info">
                                <ul>
                                    <li class="contact_info_item">
                                        <div class="contact_info_icon">
                                            <img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
                                        </div>
                                        207 ถนนบ้านบึง-แกลง ต.หนองชาก อ.บ้านบึง จ.ชลบุรี 20170
                                    </li>
                                    <li class="contact_info_item">
                                        <div class="contact_info_icon">
                                            <img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
                                        </div>
                                        038-485202
                                    </li>
                                    <li class="contact_info_item">
                                        <div class="contact_info_icon">
                                            <img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
                                        </div>iaicenter@chontech.ac.th
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Google Map -->

                <div class="row">
                    <div class="col">
                        <div id="google_map">
                            <div class="map_container">
                                <div id="map"></div>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/contact_custom.js"></script>