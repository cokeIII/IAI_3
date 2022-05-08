<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course - Teachers</title>
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
				<h1>Teachers</h1>
			</div>
		</div>

		<!-- Teachers -->

		<div class="teachers page_section">
			<div class="container">
				<div class="row">
					<?php
					require_once "admin/function.php";
					$sqlTea = "select * from lecturer";
					$resTea = mysqli_query($conn, $sqlTea);
					while ($rowTea = mysqli_fetch_array($resTea)) {
					?>
						<!-- Teacher -->
						<div class="col-lg-4 teacher">
							<div class="card">
								<div class="card_img">
									<!-- <div class="card_plus trans_200 text-center"><a href="#">+</a></div> -->
									<img class="card-img-top trans_200" src="file_uploads/lecturer/<?php echo $rowTea["pic"]; ?>" width="auto" height="355">
								</div>
								<div class="card-body text-center">
									<div class="card-title"><a href="teacher_detail.php?id_card=<?php echo $rowTea["id_card"];?>"><?php echo $rowTea["prefix"] . $rowTea["first_name"] . " " . $rowTea["last_name"]; ?></a></div>
									<div class="card-text"><?php echo $rowTea["current_position"]; ?></div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- Milestones -->

		<div class="milestones">
			<div class="milestones_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)),url(images/220224088495865_22041813131736.jpg);"></div>

			<div class="container">
				<div class="row">

					<!-- Milestone -->
					<div class="col-lg-3 milestone_col bg-box-item">
						<div class="milestone text-center">
							<div class="milestone_icon mt-2"><img src="images/milestone_1.svg"></div>
							<div class="milestone_counter"><?php echo  countUsers(); ?></div>
							<div class="milestone_text text-dark">Current Users</div>
						</div>
					</div>

					<!-- Milestone -->
					<div class="col-lg-3 milestone_col bg-box-item">
						<div class="milestone text-center">
							<div class="milestone_icon mt-2"><img src="images/milestone_2.svg"></div>
							<div class="milestone_counter"><?php echo  countLecturer(); ?></div>
							<div class="milestone_text text-dark">Certified Teachers</div>
						</div>
					</div>

					<!-- Milestone -->
					<div class="col-lg-3 milestone_col bg-box-item">
						<div class="milestone text-center">
							<div class="milestone_icon mt-2"><img src="images/milestone_3.svg"></div>
							<div class="milestone_counter"><?php echo  countCourse(); ?></div>
							<div class="milestone_text text-dark">Approved Courses</div>
						</div>
					</div>

					<!-- Milestone -->
					<div class="col-lg-3 milestone_col bg-box-item">
						<div class="milestone text-center">
							<div class="milestone_icon mt-2"><img src="images/milestone_4.svg"></div>
							<div class="milestone_counter"><?php echo  countPass(); ?></div>
							<div class="milestone_text text-dark">Graduate Users</div>
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