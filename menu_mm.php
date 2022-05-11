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

						<li class="menu_item menu_mm"><a href="index.php">Home</a></li>
						<li class="menu_item menu_mm"><a href="#">About us</a></li>
						<li class="menu_item menu_mm"><a href="courses.php">Courses</a></li>
						<!-- <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li> -->
						<li class="menu_item menu_mm"><a href="news.php">News</a></li>
						<li class="menu_item menu_mm"><a href="contact.php">Contact</a></li>
						<?php if (empty($_SESSION["id_card"])) { ?>
							<li class="menu_item menu_mm"><a href="login.php">Login</a></li>

						<?php } else { ?>
							<li class="menu_item menu_mm">
								<a href="profile.php?id_card=<?php echo $_SESSION["id_card"]; ?>">
									<?php echo $_SESSION["username"]; ?>
								</a>
							</li>
							<li class="menu_item menu_mm">
								<a href="logout.php" class="text-center">
									Logout
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>

			</div>

		</div>