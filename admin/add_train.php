<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "function.php";
    require_once "header.php"; ?>
</head>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">เพิ่มรายการอบรม</h1>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="add_train_SQL.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="course_name">ชื่อรายการอบรม <span class="text-danger">*</span></label>
                                            <input name="course_name" type="text" class="form-control" id="course_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="target">กลุ่มเป้าหมาย <span class="text-danger">*</span></label>
                                            <input name="target" type="text" class="form-control" id="target" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="number_trainees">จำนวนผู้อบรม</label>
                                            <input name="number_trainees" type="number" class="form-control" id="number_trainees">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="expenses">ค่าใช้จ่าย(บาท) <span class="text-danger">*</span></label>
                                            <input name="expenses" type="number" class="form-control" id="expenses" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="start_date">วันที่เริ่มการอบรม <span class="text-danger">*</span></label>
                                            <input name="start_date" type="datetime-local" class="form-control" id="start_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_date">วันที่สิ้นสุดการอบรม <span class="text-danger">*</span></label>
                                            <input name="end_date" type="datetime-local" class="form-control" id="end_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="location">สถานที่ฝึกอบรม <span class="text-danger">*</span></label>
                                            <input name="location" type="text" class="form-control" id="location" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="open_applications">กำหนดการเปิดรับสมัคร <span class="text-danger">*</span></label>
                                            <input name="open_applications" type="datetime-local" class="form-control" id="open_applications" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="close_applications">กำหนดการปิดรับสมัคร <span class="text-danger">*</span></label>
                                            <input name="close_applications" type="datetime-local" class="form-control" id="close_applications" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="payment_details">รายละเอียดการชำระเงิน </label>
                                            <input name="payment_details" class="form-control" id="payment_details" placeholder="รายละเอียดการชำระเงิน">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="principle">หลักการและเหตุผล <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="principle" id="principle" cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="objective">วัตถุประสงค์ (ใส่ , (ลูกน้ำ) คั่นโดยไม่ต้องใส่เลขข้อ) <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="objective" id="objective" cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="area_​​study">หัวข้อการอบรม (ใส่ , (ลูกน้ำ) คั่นโดยไม่ต้องใส่เลขข้อ) <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="area_​​study" id="area_​​study" cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="course_file">เอกสารที่เกี่ยวข้องกับการอบรม </label>
                                            <input name="course_file" type="file" class="form-control" id="course_file">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="course_type">หลักสูตร <span class="text-danger">*</span></label>
                                            <select name="course_type" id="course_type" class="form-control" required>
                                                <option value="">-- กรุเลือกหลักสูตร --</option>
                                                <?php echo get_CourseType_opt(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pic">รูปหน้าปก</label>
                                            <input name="pic" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="budget">งบประมาณที่ใช้ในการจัดอบรม <span class="text-danger">*</span></label>
                                            <input name="budget" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="period"><strong>ระยะเวลาในการอบรม</strong><span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        จำนวนวัน <input name="period_day" type="number" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        จำนวนชั่วโมง <input name="period_time" type="number" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-3">เพิ่มรายการอบรม</button>
                            </form>
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