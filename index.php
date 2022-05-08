<!DOCTYPE html>
<html lang="en">


<head>
	<?php require_once "header.php"; ?>
</head>
<style>
	.h1-slide {
		color: #c53100 !important;
		text-shadow: 0.1vh 0.1vh white;
	}

	.bt-50 {
		margin-bottom: 50%;
	}

	.bg-slide {
		background-color: rgba(128, 128, 128, 0.3);
		border-radius: 5%;
	}

	.range-slider-track {
		touch-action: none;
	}

	.img-ta {
		background-size: cover !important;
		background-position: center !important;
		width: 50px;
		height: auto;
	}
</style>

<body>

	<div class="super_container">
		<!-- Header -->

		<header class="header d-flex flex-row">
			<?php require_once "menu.php"; ?>
		</header>

		<?php require_once "menu_mm.php"; ?>

		<!-- Home -->

		<div class="home">

			<!-- Hero Slider -->
			<div class="hero_slider_container range-slider-track">
				<div class="hero_slider owl-carousel">
					<?php
					require_once "admin/function.php";
					$sqlSlide = "select * from pic_slide";
					$resSlide = mysqli_query($conn, $sqlSlide);
					while ($rowSlide = mysqli_fetch_array($resSlide)) {
					?>
						<!-- Hero Slide -->
						<div class="hero_slide">
							<div class="hero_slide_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),url(file_uploads/img_slide/<?php echo $rowSlide["pic_path"]; ?>);"></div>
							<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
								<div class="hero_slide_content text-center">
									<h1 class="h1-slide bg-slide" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><?php echo $rowSlide["pic_text"]; ?></h1>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
				<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
			</div>

		</div>

		<div class="hero_boxes">
			<div class="hero_boxes_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 hero_box_col">
							<div class="hero_box d-flex flex-row align-items-center justify-content-start">
								<img src="images/books.svg" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Courses</h2>
									<a href="courses.php" class="hero_box_link">view more</a>
								</div>
							</div>
						</div>

						<div class="col-lg-4 hero_box_col">
							<div class="hero_box d-flex flex-row align-items-center justify-content-start">
								<img src="images/earth-globe.svg" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">News</h2>
									<a href="courses.html" class="hero_box_link">view more</a>
								</div>
							</div>
						</div>

						<div class="col-lg-4 hero_box_col">
							<div class="hero_box d-flex flex-row align-items-center justify-content-start">
								<img src="images/professor.svg" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Our Teachers</h2>
									<a href="teachers.php" class="hero_box_link">view more</a>
								</div>
							</div>
						</div>

					</div>
				</div>
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
					<?php
					$sqlPop = "select course_id
						from course_regis 
						group by course_id
						order by count(id_card)
						limit 3
						";
					$resPop = mysqli_query($conn, $sqlPop);
					while ($rowPop = mysqli_fetch_array($resPop)) {
						$course_id = $rowPop["course_id"];
						$sqlCou = "select * from course where course_id = '$course_id'";
						$resCou = mysqli_query($conn, $sqlCou);
						$rowCou = mysqli_fetch_array($resCou);
						if ($rowCou["lecturer"]) {
							$lecturer = explode(",", $rowCou["lecturer"]);
						} else {
							$lecturer[1] = "";
						}
						$lecturerArr = getDataLecturer($lecturer[0]);
					?>
						<!-- Popular Course Item -->
						<div class="col-lg-4 course_box">
							<div class="card">
								<img class="card-img-top" src="file_uploads/img/<?php echo $rowCou["pic"]; ?>" width="auto" height="260">
								<div class="card-body text-center">
									<div class="card-title"><a href="courses.html"><?php echo $rowCou["course_name"]; ?></a></div>
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

		<!-- Register -->

		<div class="register">

			<div class="container-fluid">

				<div class="row row-eq-height">
					<div class="col-lg-6 nopadding">

						<!-- Register -->

						<div class="register_section d-flex flex-column align-items-center justify-content-center">
							<div class="register_content text-center">
								<h1 class="register_title">สิ่งที่คุณจะได้เรียนรู้</h1>
								<p class="register_text">1. <strong>System Design for Industrial AI Technology</strong><br> มุ่งเน้นการออกแบบระบบและการเชื่อมโยงข้อมูลเพื่อพัฒนาการผลิตและดิจิทัล
									<br>
									2. <strong>Data Collect and Data management for AI</strong><br> มุ่งเน้นการจัดการเก็บและคัดเลือกข้อมูลในการแสดงผลและวิเคราะห์
									<br>
									3. <strong>Apply AI Technology for Industrials</strong><br> มุ่งเน้นความรู้การส่งผ่านข้อมูลด้วยเทคโนโลยีสารสนเทศและการประมวลผล
								</p>
								<div class="button button_1 register_button mx-auto trans_200"><a href="#">register now</a></div>
							</div>
						</div>

					</div>

					<div class="col-lg-6 nopadding">

						<!-- Search -->

						<div class="search_section d-flex flex-column align-items-center justify-content-center">
							<div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
							<div class="search_content text-center">
								<h1 class="search_title">Search for your course</h1>
								<form id="search_form" class="search_form" action="post">
									<input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Course Name" required="required" data-error="Course name is required.">
									<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
									<input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">
									<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">search course</button>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Services -->

		<!-- <div class="services page_section">

			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Our Services</h1>
						</div>
					</div>
				</div>

				<div class="row services_row">

					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/earth-globe.svg" alt="">
						</div>
						<h3>Online Courses</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/exam.svg" alt="">
						</div>
						<h3>Indoor Courses</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/books.svg" alt="">
						</div>
						<h3>Amazing Library</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/professor.svg" alt="">
						</div>
						<h3>Exceptional Professors</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/blackboard.svg" alt="">
						</div>
						<h3>Top Programs</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/mortarboard.svg" alt="">
						</div>
						<h3>Graduate Diploma</h3>
						<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
					</div>

				</div>
			</div>
		</div> -->

		<!-- Testimonials -->

		<div class="testimonials page_section">
			<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
			<div class="testimonials_background_container prlx_parent">
				<div class="testimonials_background prlx" style="background-image:url(images/220224088495865_22040616165554.jpg)"></div>
			</div>
			<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>What our students say</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-10 offset-lg-1">

						<div class="testimonials_slider_container">

							<!-- Testimonials Slider -->
							<div class="owl-carousel owl-theme testimonials_slider">

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">ได้รู้ถึงเทคนิคการเก็บข้อมูลจากสัญญานพื้นฐานต่างๆโดยการเลือกใช้อุปกรณ์ที่เหมาะสม, การส่งข้อมูล, การเชื่อมต่อไปจนถึงการจัดการข้อมูล (Data Management) และการนำข้อมูลที่ได้มาวิเคราะห์พฤติกรรมการทำงานของเครื่องจักร เพื่อตรวจสอบหาลักษณะการทำงานที่ผิดปกติ, การเปลี่ยนแปลงของค่าพารามิเตอร์ต่างๆที่เกิดขึ้นระหว่างการทำงาน หลังจากนั้นนำข้อมูลมาประยุกต์เพื่อสร้าง Algorithm เพื่อใช้ในการแก้ไขปัญหา </p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="images/Capture1.png" alt="">
											</div>
											<div class="testimonial_name">แพรวา เทียนขจร</div>
											<div class="testimonial_title">นักเรียน</div>
										</div>
									</div>
								</div>

								<!-- Testimonials Item -->
								<!-- <div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="images/testimonials_user.jpg" alt="">
											</div>
											<div class="testimonial_name">james cooper</div>
											<div class="testimonial_title">Graduate Student</div>
										</div>
									</div>
								</div> -->

								<!-- Testimonials Item -->
								<!-- <div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="images/testimonials_user.jpg" alt="">
											</div>
											<div class="testimonial_name">james cooper</div>
											<div class="testimonial_title">Graduate Student</div>
										</div>
									</div>
								</div> -->

							</div>

						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Events -->

		<div class="events page_section">
			<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Upcoming Events</h1>
						</div>
					</div>
				</div>

				<div class="event_items">

					<!-- Event Item -->
					<div class="row event_item">
						<div class="col">
							<div class="row d-flex flex-row align-items-end">

								<div class="col-lg-2 order-lg-1 order-2">
									<div class="event_date d-flex flex-column align-items-center justify-content-center">
										<div class="event_day">18-22</div>
										<div class="event_month">เมษายน</div>
									</div>
								</div>

								<div class="col-lg-6 order-lg-2 order-3">
									<div class="event_content">
										<div class="event_name"><a class="trans_200" href="#">AI อาชีวะ รุ่นที่ 4</a></div>
										<div class="event_location">เทคโนโลยีปัญญาประดิษฐ์ในภาคอุตสาหกรรม AI อาชีวะ รุ่นที่ 4</div>
										<p>Industrial AI Technology, Data Collect and Management for AI Technology, Apply AI Technology for Industrials...</p>
									</div>
								</div>

								<div class="col-lg-4 order-lg-3 order-1">
									<div class="event_image">
										<img src="images/20220225065751pm.jpg" alt="https://unsplash.com/@theunsteady5">
									</div>
								</div>

							</div>
						</div>
					</div>

					<!-- Event Item -->
					<!-- <div class="row event_item">
						<div class="col">
							<div class="row d-flex flex-row align-items-end">

								<div class="col-lg-2 order-lg-1 order-2">
									<div class="event_date d-flex flex-column align-items-center justify-content-center">
										<div class="event_day">07</div>
										<div class="event_month">January</div>
									</div>
								</div>

								<div class="col-lg-6 order-lg-2 order-3">
									<div class="event_content">
										<div class="event_name"><a class="trans_200" href="#">Open day in the Univesrsity campus</a></div>
										<div class="event_location">Grand Central Park</div>
										<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
									</div>
								</div>

								<div class="col-lg-4 order-lg-3 order-1">
									<div class="event_image">
										<img src="images/event_2.jpg" alt="https://unsplash.com/@claybanks1989">
									</div>
								</div>

							</div>
						</div>
					</div> -->

					<!-- Event Item -->
					<!-- <div class="row event_item">
						<div class="col">
							<div class="row d-flex flex-row align-items-end">

								<div class="col-lg-2 order-lg-1 order-2">
									<div class="event_date d-flex flex-column align-items-center justify-content-center">
										<div class="event_day">07</div>
										<div class="event_month">January</div>
									</div>
								</div>

								<div class="col-lg-6 order-lg-2 order-3">
									<div class="event_content">
										<div class="event_name"><a class="trans_200" href="#">Student Graduation Ceremony</a></div>
										<div class="event_location">Grand Central Park</div>
										<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
									</div>
								</div>

								<div class="col-lg-4 order-lg-3 order-1">
									<div class="event_image">
										<img src="images/event_3.jpg" alt="https://unsplash.com/@juanmramosjr">
									</div>
								</div>

							</div>
						</div>
					</div> -->

				</div>

			</div>
		</div>

		<!-- Footer -->
		<?php require_once "footer.php"; ?>

	</div>

	<?php require_once "scripts.php" ?>

</body>

</html>
<script>
</script>