<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IAI Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-4">ระบบบริหารจัดการศูนย์ปัญญาประดิษฐ์<div>เพื่ออุตสาหกรรม</div>
                                            <div>วิทยาลัยเทคนิคชลบุรี</div>
                                        </h1>
                                    </div>
                                    <form class="user" id="form-login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Username" id="username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" id="passwordLogin" name="passwordLogin" required>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<script>
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
                if (result == "admin") {
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
</script>