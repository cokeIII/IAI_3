<?php session_start(); ?>
<style>
    .text-name {
        font-size: 20px;
        color: white;
    }
</style>
<div class="header_content d-flex flex-row align-items-center">
    <!-- Logo -->
    <div class="logo_container">
        <div class="logo">
            <img src="images/logo2.png" alt="" width="50" height="auto">
            <span>IAI</span>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main_nav_container">
        <div class="main_nav">
            <ul class="main_nav_list">
                <li class="main_nav_item"><a href="index.php">home</a></li>
                <li class="main_nav_item"><a href="#">about us</a></li>
                <li class="main_nav_item"><a href="courses.php">courses</a></li>
                <!-- <li class="main_nav_item"><a href="elements.html">elements</a></li> -->
                <li class="main_nav_item"><a href="news.html">news</a></li>
                <li class="main_nav_item"><a href="contact.html">contact</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="header_side d-flex flex-row justify-content-center align-items-center">
    <?php if (empty($_SESSION["id_card"])) { ?>
        <a class="text-white" href="login.php">
            <h3>LOGIN</h3>
        </a>
    <?php } else { ?>
        <a href="profile.php?id_card=<?php echo $_SESSION["id_card"]; ?>">
            <div class="text-name"><?php echo $_SESSION["username"]; ?></div>
        </a>
    <?php } ?>

</div>

<!-- Hamburger -->
<div class="hamburger_container">
    <i class="fas fa-bars" aria-hidden="true"></i>
</div>