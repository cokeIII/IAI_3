<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course - Login</title>
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

    .bg-main {
        background-color: #ba0a0a;
    }

    .mt-login-box {
        margin-top: 15%;
    }

    .text-head {
        font-size: 25px;
        font-weight: bold;
        color: white;
    }

    .text-content {
        font-size: 20px;
    }

    .bg-darks {
        background-color: #1a1a1a;
    }

    .mt-center {
        margin-top: 10%;
    }

    .text-l-login{
        font-size: 16px;
        color: white !important;
        font-weight: bold;
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
        <?php require_once "admin/function.php"; ?>


        <div class="teachers page_section">
            <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card  border-0 shadow-lg mt-login-box">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-md-6 text-center text-l-login p-5 rounded bg-darks">
                                        <img src="images/IAIlogo.png" alt="" width="100%" height="auto" class="mt-center">
                                        <div>ระบบบริหารจัดการศูนย์ปัญญาประดิษฐ์เพื่ออุตสาหกรรม</div>
                                        <div>วิทยาลัยเทคนิคชลบุรี</div>
                                    </div>
                                    <div class="col-md-6 bg-main p-5 rounded">
                                        <div class="text-head">Log in</div>
                                        <form id="form-login" action="login_SQL.php" method="post">
                                            <div class="color-primary p-1 mt-3 shadow text-content">
                                                <div class="row text-white">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="username">รหัสบัตรประชาชน </label>
                                                            <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="passwordLogin">รหัสผ่าน </label>
                                                            <input name="passwordLogin" type="password" class="form-control" id="passwordLogin" placeholder="Enter password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn  float-right ml-2 mt-2">เข้าสู่ระบบ</button>
                                                <a href="register.php" class="btn  float-right btn-secondary text-white mt-2">สมัครสมาชิก</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Become -->

        <!-- <div class="become">
			<div class="container">
				<div class="row row-eq-height">

					<div class="col-lg-6 order-2 order-lg-1">
						<div class="become_title">
							<h1>Become a teacher</h1>
						</div>
						<p class="become_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque.</p>
						<div class="become_button text-center trans_200">
							<a href="#">Read More</a>
						</div>
					</div>

					<div class="col-lg-6 order-1 order-lg-2">
						<div class="become_image">
							<img src="images/become.jpg" alt="">
						</div>
					</div>

				</div>
			</div>
		</div> -->

        <!-- Footer -->

        <?php require_once "footer.php"; ?>
    </div>
    <?php require_once "scripts.php" ?>
</body>

</html>
<script>
    $(document).ready(
        $(document).on('submit', '#form-login', function() {
            event.preventDefault()
            $.ajax({
                type: "POST",
                url: "login_SQL.php",
                data: {
                    username: $("#username").val(),
                    passwordLogin: $("#passwordLogin").val(),
                },
                success: function(result) {
                    if (result == "user") {
                        window.location.href = 'index.php'
                    } else {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'เข้าสู่ระบบไม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        })
    )
</script>