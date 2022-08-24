<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "header.php"; ?>
</head>
<style>
    .bg-tag {
        background-color: #730b19;
        font-size: 24px;
        color: white;
    }
</style>

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
                    <?php
                    require_once "function.php";
                    $sql = "select * from pic_slide";
                    $res = mysqli_query($conn, $sql);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ตั้งค่าประชาสัมพันธ์</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>ตั้งค่ารูปสไลด์</h3>
                                    <hr>
                                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalSlide" id="insertPicSlide">เพิ่มข้อมูล</button>
                                    <table id="slide" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>วันที่ลง</th>
                                                <th>ข้อความ</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($res)) { ?>
                                                <tr>
                                                    <td><?php echo $row["time_stamp"]; ?></td>
                                                    <td><?php echo $row["pic_text"]; ?></td>
                                                    <td><a target="_blank" href="../file_uploads/img_slide/<?php echo $row["pic_path"]; ?>">ดูรูปภาพ</a></td>
                                                    <td><button pic_id="<?php echo $row["pic_id"]; ?>" class="btnDelSlide btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>ตั้งค่าข่าวประชาสัมพันธ์ (News)</h3>
                                    <hr>
                                    <button class="btn btn-primary mb-3" id="addBullhorn">เพิ่มข้อมูล</button>
                                    <table id="bullhorn" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>หัวข้อ</th>
                                                <th>รายละเอียด</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqlBull = "select * from public_relations";
                                            $resBull = mysqli_query($conn, $sqlBull);
                                            while ($rowBull = mysqli_fetch_array($resBull)) { ?>
                                                <tr>
                                                    <td><?php echo $rowBull["topic"]; ?></td>
                                                    <td><button class="btn btn-info btnPicPath" tag='<?php echo $rowBull["tag"]; ?>' topic="<?php echo $rowBull["topic"]; ?>" detail="<?php echo $rowBull["detail"]; ?>" pic_path='<?php echo $rowBull["pic_path"]; ?>'>รายละเอียด</button></td>
                                                    <td><button pub_id="<?php echo $rowBull["pub_id"]; ?>" class="btnDelBullhorn btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>ตั้งค่ารายการอบรมที่จะมาถึง (Upcoming Events)</h3>
                                    <hr>
                                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalUpcomingEvents">เพิ่มข้อมูล</button>
                                    <table id="tableUpcoming" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ชื่อรายการอบรม</th>
                                                <th>รายละเอียด</th>
                                                <th>รูปภาพ</th>
                                                <th>สถานะ</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqlUp = "select * from upcoming_events";
                                            $resUp = mysqli_query($conn, $sqlUp);
                                            while ($rowUp = mysqli_fetch_array($resUp)) { ?>
                                                <tr>
                                                    <td><?php echo $rowUp["course_name"]; ?></td>
                                                    <td><?php echo $rowUp["detail"]; ?></td>
                                                    <td> <a target="blank" href="../file_uploads/img_upcoming/<?php echo $rowUp["pic"]; ?>">รูปภาพ</a></td>
                                                    <td><?php echo $rowUp["status"]; ?></td>
                                                    <td><button id="<?php echo $rowUp["id"]; ?>" class="btnDelUpcoming btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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
<!-- Modal Slide-->
<div class="modal fade" id="modalSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSlideLabel">ตั้งค่ารูปสไลด์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pic_slide_add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">
                            <h4>เพิ่มรูปภาพ</h4>
                        </label>
                        <input class="form-control" type="file" name="pic_slide[]" multiple accept="image/*" />
                        <label class="mt-3">
                            <h4>ข้อความที่แสดง</h4>
                        </label>
                        <input type="text" name="pic_text" id="pic_text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">เพิ่มรูป</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal News-->
<div class="modal fade" id="modalBullhorn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBullhornLabel">ตั้งค่าประชาสัมพันธ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="bullhorn_SQL.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="topic">
                            <h4>หัวข้อ</h4>
                        </label>
                        <input class="form-control" type="text" name="topic" id="topic" required>
                    </div>
                    <div class="form-group">
                        <label for="pic_path">
                            <h4>
                                เพิ่มรูปภาพ(เลือกได้มากกว่า 1 รูป)
                            </h4>
                        </label>
                        <input class="form-control" type="file" name="pic_path[]" multiple accept="image/*" required />
                    </div>
                    <div class="form-group">
                        <label for="detail">
                            <h4>รายละเอียด</h4>
                        </label>
                        <textarea class="form-control" name="detail" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag">
                            <h4>tag</h4>
                        </label>
                        <input type="text" name="tag" id="tag" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">เพิ่มข้อมูล</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal picBull Show detail-->
<div class="modal fade " id="picBull" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="picBullLabel">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="picBullShow" class="p-2">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal UpEvent-->
<div class="modal fade " id="modalUpcomingEvents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="picBullLabel">เพิ่มข้อมูลรายการอบรมที่กำลังจะมาถึง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="upcoming_add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">
                            <h4>ชื่อรายการอบรม</h4>
                        </label>
                        <input class="form-control" type="text" name="name_event" required />
                    </div>
                    <div class="form-group">
                        <label for="">
                            <h4>รายละเอียด</h4>
                        </label>
                        <textarea class="form-control" name="detail_event" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">
                            <h4>เพิ่มรูปภาพ</h4>
                        </label>
                        <input class="form-control" type="file" name="pic_event" multiple accept="image/*" required />
                    </div>
                    <div class="form-group">
                        <label for="">
                            <h4>สถานะ</h4>
                        </label>
                        <input class="form-control" type="text" name="status_event" />
                    </div>
                    <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#addBullhorn").click(function() {
            // $.ajax({
            //     type: 'POST',
            //     url: 'getTag.php',
            //     data: {
            //         act: 'getTag'
            //     },
            //     dataType: 'json',
            //     success: function(data) {
            //         if (data.length != 0) {
            //             let tag = data.tagData
            //             // autocomplete(document.getElementById("tag"), tag)
            //         }

            //     }
            // });
            $("#modalBullhorn").modal('show')
        })
        $(".btnPicPath").click(function() {
            let pic_path = JSON.parse($(this).attr("pic_path"))
            let tag = JSON.parse($(this).attr("tag"))
            let detail = $(this).attr("detail")
            let topic = $(this).attr("topic")
            let res = '<h3>' + topic + '</h3>' + '<hr>' + detail + '<hr><div class="row">';
            pic_path.forEach(element => {
                res +=
                    '<div class="col-md-4">' +
                    '<img class="d-block w-100" src="../file_uploads/bullhorn/' + element + '">' +
                    '</div>'
            });
            res += '<hr><h4>Tag</h4>'
            tag.forEach(element => {
                res += '<div class="bg-tag ml-3">' + element + '</div>'
            });
            $("#picBullShow").html(res)
            $('#picBull').modal('show')
        })
        $("#slide").DataTable({
            "scrollX": true
        });
        $("#bullhorn").DataTable({
            "scrollX": true
        });
        $("#tableUpcoming").DataTable({
            "scrollX": true
        });
        $(".btnDelSlide").click(function() {
            let pic_id = $(this).attr("pic_id")
            Swal.fire({
                title: 'ลบรูปภาพ ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('pic_slide_del.php', {
                        'pic_id': pic_id,
                    });
                }
            })
        })
        $(".btnDelBullhorn").click(function() {
            let pub_id = $(this).attr("pub_id")
            Swal.fire({
                title: 'ลบข่าวประชาสัมพัธ์ ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('bullhorn_del.php', {
                        'pub_id': pub_id,
                    });
                }
            })
        })
        $(".btnDelUpcoming").click(function() {
            let id = $(this).attr("id")
            Swal.fire({
                title: 'ลบรายการอบรมที่กำลังจะมาถึง ?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('upcoming_del.php', {
                        'id': id,
                    });
                }
            })
        })
    });
</script>