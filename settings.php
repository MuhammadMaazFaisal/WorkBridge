<?php
session_start();
if ($_SESSION['user_type'] == 'user' && $_SESSION['status'] == 'logged_in') {
	include 'layout/header.php';
?>
	<style>
		#wrapper {
			padding-top: 28px !important;
		}
		.selectize-input {
			padding: 13px 10px !important;
			height: 45px !important;
		}

		input[type="select-one"] {
			height: 24px !important;
		}
		.fields-ul > li{
			border-bottom: none !important;
		}
	</style>

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
						<a href="browse-tasks.php"><img src="images/logo.png" alt=""></a>
					</div>

					<!-- Main Navigation -->
					<nav id="navigation" class="justify-content-center">
						<ul id="responsive">
							<li><a href="browse-tasks.php">Browse Tasks</a>
							</li>
							<li><a href="#">About us</a>
							</li>
							<li><a href="#">FAQs </a>
							</li>
							<li><a href="#">Contact us</a>
							</li>

						</ul>
					</nav>
					<div class="clearfix"></div>
					<!-- Main Navigation / End -->

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
									<div class="user-avatar status-online"><img src="images/user.png" alt=""></div>
								</a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-online"><img src="images/user.png" alt=""></div>
										<div class="user-name">
											<?php echo $_SESSION['user_name']; ?> <span>Freelancer</span>
										</div>
									</div>

								</div>

								<ul class="user-menu-small-nav">
									<li><a href="settings.php"><i class="icon-material-outline-settings"></i> Settings</a></li>
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


	<!-- Dashboard Container -->
	<div class="dashboard-container">

		<div class="dashboard-sidebar">
			<div class="dashboard-sidebar-inner" data-simplebar>
				<div class="dashboard-nav-container">

					<!-- Responsive Navigation Trigger -->
					<a href="#" class="dashboard-responsive-nav-trigger">
						<span class="hamburger hamburger--collapse">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</span>
						<span class="trigger-title">Dashboard Navigation</span>
					</a>

					<!-- Navigation -->
					<div class="dashboard-nav">
						<div class="dashboard-nav-inner">
							<ul data-submenu-title="Account">
								<li><a href="settings.php"><i class="icon-material-outline-settings"></i> Settings</a></li>
								<li><a onclick="Logout()"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
							</ul>

						</div>
					</div>
					<!-- Navigation / End -->

				</div>
			</div>
		</div>


		<!-- Dashboard Content
	================================================== -->
		<div class="dashboard-content-container" data-simplebar>
			<div class="dashboard-content-inner">

				<!-- Dashboard Headline -->
				<div class="dashboard-headline">
					<h3>Settings</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Settings</li>
						</ul>
					</nav>
				</div>

				<!-- Row -->
				<div class="row">
					<form id="profile" enctype="multipart/form-data">
						<!-- Dashboard Box -->
						<div class="col-xl-12">
							<div class="dashboard-box margin-top-0">

								<!-- Headline -->
								<div class="headline">
									<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
								</div>

								<div class="content with-padding padding-bottom-0">

									<div class="row">

										<div class="col-auto">
											<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
												<img class="profile-pic" src="images/user-avatar-placeholder.png" alt="" />
												<div class="upload-button"></div>
											</div>
										</div>

										<div class="col">
											<div class="row">

												<div class="col-xl-6">
													<div class="submit-field">
														<h5>Full Name</h5>
														<input id="name" name="name" type="text" class="with-border">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="submit-field">
														<h5>Phone Number</h5>
														<input id="phone" name="phone" type="text" class="with-border" value="" placeholder="e.g. 913152389052">
													</div>
												</div>

												<div class="col-xl-6">
													<!-- Account Type -->
													<div class="submit-field">
														<h5>Account Type</h5>
														<div class="account-type">
															<div>
																<input type="radio" name="freelancer" id="freelancer" class="account-type-radio" />
																<label for="freelancer" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
															</div>

															<div>
																<input type="radio" name="employer" id="employer" class="account-type-radio" />
																<label for="employer" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
															</div>
														</div>
													</div>
												</div>

												<div class="col-xl-6">
													<div class="submit-field">
														<h5>Email</h5>
														<input id="email" name="email" type="email" class="with-border">
													</div>
												</div>

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

						<!-- Dashboard Box -->
						<div class="col-xl-12">
							<div class="dashboard-box">

								<!-- Headline -->
								<div class="headline">
									<h3><i class="icon-material-outline-face"></i> My Profile</h3>
								</div>

								<div class="content">
									<ul class="fields-ul">
										<li>
											<div class="row">

												<div class="col-xl-12">
													<div class="submit-field">
														<h5>Add Skills <i class="help-icon" data-tippy-placement="right" title="Add up to 10 skills"></i></h5>

														<!-- Skills List -->
														<div class="keywords-container">
															<div class="col-6 keyword-input-container">
																<select id="add-skills" class="keyword-input with-border custom-select">
																	<option value="">Select a skill...</option>
																</select>
																<button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
															</div>
															<div class="keywords-list" id="skills-container">
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="row">
												<div class="col-xl-12">
													<div class="submit-field">
														<h5>Introduce Yourself</h5>
														<textarea id="description" name="description" cols="30" rows="5" class="with-border" placeholder="Your Introduction.."></textarea>
													</div>
												</div>

											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Dashboard Box -->
						<div class="col-xl-12">
							<div id="test1" class="dashboard-box">

								<!-- Headline -->
								<div class="headline">
									<h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
								</div>

								<div class="content with-padding">
									<div class="row">
										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Current Password</h5>
												<input id="old-password" name="old-password" type="password" class="with-border">
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>New Password</h5>
												<input id="new-password" name="new-password" type="password" class="with-border">
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Repeat New Password</h5>
												<input id="r-new-password" name="r-new-password" type="password" class="with-border">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Button -->
						<div class="col-xl-12">
							<button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
						</div>
					</form>
				</div>

				<!-- Row / End -->

			</div>
		</div>
		<!-- Dashboard Content / End -->

	</div>
	<!-- Dashboard Container / End -->

	</div>
	<!-- Wrapper / End -->


	<!-- Scripts
================================================== -->

	<!-- Scripts
================================================== -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-migrate-3.0.0.min.js"></script>
	<script src="js/mmenu.min.js"></script>
	<script src="js/tippy.all.min.js"></script>
	<script src="js/simplebar.min.js"></script>
	<script src="js/bootstrap-slider.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/snackbar.js"></script>
	<script src="js/clipboard.min.js"></script>
	<script src="js/counterup.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/sweetalert2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

	<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
	<script src="js/chart.min.js"></script>
	<script>
		function Logout() {
			console.log('logout');
			$.ajax({
				url: 'include/functions.php',
				type: 'POST',
				data: {
					function: 'Logout'
				},
				success: function(data) {
					window.location.href = 'login.php';
				}
			});
		}
		$(document).ready(function() {
			$('.custom-select').selectize({
				sortField: 'text'
			});
			const myInput = document.getElementById("add-skills");
			myInput.addEventListener("keydown", function(event) {
				if (event.key === "Enter") {
					event.preventDefault();
				}
			});

			$.ajax({
				url: '../include/functions.php',
				type: 'POST',
				data: {
					function: 'GetAllSkills'
				},
				success: function(data) {
					data = JSON.parse(data);
					console.log(data);
					if (data.status == 'success') {
						var add_skill = $('#add-skills')[0].selectize;
						for (let i = 0; i < data.data.length; i++) {
							var newOption = {
								value: data.data[i]['name'],
								text: data.data[i]['name']
							};
							add_skill.addOption(newOption);
						}
					}
				}
			});

			$.ajax({
				url: 'include/functions.php',
				type: 'POST',
				data: {
					function: 'GetUserDetails',
					id: <?php echo $_SESSION['user_id']; ?>
				},
				success: function(data) {
					data = JSON.parse(data);
					console.log(data);
					$('#name').val(data.data.name);
					$('#email').val(data.data.email);
					$('#phone').val(data.data.phone);
					$('#description').val(data.data.description);
					if (data.skills.length > 0) {
						data.skills.forEach(function(skill) {
							$('#skills-container').append('<div class="keyword"><span class="keyword-text">' + skill.name + '</span><span class="keyword-remove"></span></div>');
						});
					}
					if (data.data.type == 'user') {
						$('#freelancer').prop('checked', true);
						document.getElementById('employer').disabled = true;
					} else {
						$('#employer').prop('checked', true);
						document.getElementById('freelancer').disabled = true;
					}


				}
			});
		});
		$(document).on('submit', '#profile', function(e) {
			e.preventDefault();
			var form = new FormData(this);
			var skills = document.querySelectorAll('#skills-container .keyword-text');
			if (skills.length > 0) {
				skills.forEach(function(skill) {
					form.append('skills[]', skill.textContent.trim());
					console.log(skill.textContent.trim());
				});
				form.append('function', 'UpdateUserProfile');
				form.append('id', <?php echo $_SESSION['user_id']; ?>);
				$.ajax({
					url: 'include/functions.php',
					type: 'POST',
					data: form,
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						console.log(data);
						data = JSON.parse(data);
						console.log(data);
						if (data.status == 'success') {
							Swal.fire({
								title: 'Success!',
								text: data.message,
								icon: 'success',
								confirmButtonText: 'Ok'
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.reload();
								}
							})
						} else {
							Swal.fire({
								title: 'Error!',
								text: data.message,
								icon: 'error',
								confirmButtonText: 'Ok'
							})
						}
					}
				});
			} else {
				Swal.fire({
					title: 'Error!',
					text: 'Please add skills',
					icon: 'error',
					confirmButtonText: 'Ok'
				})
				return false;
			}

		});
	</script>

	</body>

	</html>

<?php
} else {
	header("Location: login.php");
	exit();
}
?>