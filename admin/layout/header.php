<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

	<!-- Basic Page Needs
==================================== ============== -->
	<title>Hireo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
================================================== -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/colors/blue.css">
	<link href="../css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

</head>

<body class="gray">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header Container
================================================== -->
		<header id="header-container" class="fullwidth dashboard-header not-sticky">

			<!-- Header -->
			<div id="header">
				<div class="container">

					<!-- Left Side Content -->
					<div class="left-side">

						<!-- Logo -->
						<div id="logo">
							<a href="index.html"><img src="../images/logo.png" alt=""></a>
						</div>

					</div>
					<!-- Left Side Content / End -->

					<!-- Right Side Content / End -->
					<div class="right-side">


						<!--  User Notifications / End -->

						<!-- User Menu -->
						<div class="header-widget">

							<!-- Messages -->
							<div class="header-notifications user-menu">
								<div class="header-notifications-trigger">
									<a href="#">
										<div class="user-avatar status-online"><img src="../images/user-avatar-small-01.jpg" alt=""></div>
									</a>
								</div>

								<!-- Dropdown -->
								<div class="header-notifications-dropdown">

									<!-- User Status -->
									<div class="user-status">

										<!-- User Name / Avatar -->
										<div class="user-details">
											<div class="user-avatar status-online"><img src="images/user-avatar-small-01.jpg" alt=""></div>
											<div class="user-name">
												<?php echo $_SESSION['user_name']; ?> <span>Administrator</span>
											</div>
										</div>
									
									</div>

									<ul class="user-menu-small-nav">
										<li><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
										<li><a href="dashboard-settings.php"><i class="icon-material-outline-settings"></i> Settings</a></li>
										<li><button onclick="Logout()"><i class="icon-material-outline-power-settings-new"></i> Logout</button></li>
									</ul>

								</div>
							</div>

						</div>
						<!-- User Menu / End -->

						<!-- Mobile Navigation Button -->
						<span class="mmenu-trigger">
							<button class="hamburger hamburger--collapse" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</span>

					</div>
					<!-- Right Side Content / End -->

				</div>
			</div>
			<!-- Header / End -->

		</header>
		<div class="clearfix"></div>
		<!-- Header Container / End -->