<?php
session_start();
if ($_SESSION['user_type'] == 'user' && $_SESSION['status'] == 'logged_in') {
	include 'layout/header.php';
?>
	<style>
		.selectize-input {
			padding: 13px 10px !important;
			height: 45px !important;
		}

		input[type="select-one"] {
			height: 24px !important;
		}

		.fields-ul>li {
			border-bottom: none !important;
		}

		.toggle-password {
			position: absolute;
			top: 45%;
			right: 25px;
			cursor: pointer;
			color: #2a41e8;
		}

		.toggle-password i {
			font-size: 18px;
			color: #888;
			transition: color 0.3s;
		}

		.toggle-password:hover i {
			color: #333;
			/* Change color on hover for better visibility */
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
								<li><a href="add-skill.php"><i class="icon-material-outline-assessment"></i>Add Skills</a></li>
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
														<h5>Email</h5>
														<input id="email" name="email" type="email" class="with-border">
													</div>
												</div>
												<div class="col-xl-4">
													<div class="submit-field">
														<h5>Whatsapp Number</h5>
														<input type="tel" class="input-text with-border" id="phone" placeholder="e.g. 3152389052" />
														<input type="hidden" id="country-code" name="country_code" value="" />
													</div>
												</div>

												<div class="col-xl-4">
													<!-- Account Type -->
													<div class="submit-field">
														<h5>Account Type</h5>
														<div class="account-type">
															<div>
																<input type="radio" name="freelancer" id="freelancer" class="account-type-radio" />
																<label for="freelancer" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-4">
													<div class="submit-field">
														<h5>Phone Number</h5>
														<input type="tel" class="input-text with-border" id="mphone" placeholder="e.g. 3152389052" required />
														<input type="hidden" id="mcountry-code" name="mcountry_code" value="" />
													</div>
												</div>



											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

						<!-- Dashboard Box -->
						<div class="col-xl-12" id="add-skill">
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
												<span class="toggle-password" id="show-password1">
													Show
												</span>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>New Password</h5>
												<input id="new-password" name="new-password" type="password" class="with-border">
												<span class="toggle-password" id="show-password2">
													Show
												</span>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Repeat New Password</h5>
												<input id="r-new-password" name="r-new-password" type="password" class="with-border">
												<span class="toggle-password" id="show-password3">
													Show
												</span>
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

				<div class="dashboard-footer-spacer"></div>
				<div class="small-footer margin-top-15">
					<div class="small-footer-copyrights">
						© 2023 <strong><a href="mailto:m.maazfaisal0301@gmail.com"> Developed by Muhammad Maaz Faisal</a></strong>. All Rights Reserved.
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- Footer / End -->

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/intlTelInput.min.js"></script>

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

		$('#show-password1').on('click', function() {
			var passwordField = $('#old-password');
			var passwordFieldType = passwordField.attr('type');

			if (passwordFieldType === 'password') {
				passwordField.attr('type', 'text');
				$(this).text('Hide');
			} else {
				passwordField.attr('type', 'password');
				$(this).text('Show');
			}
		});

		$('#show-password2').on('click', function() {
			var passwordField = $('#new-password');
			var passwordFieldType = passwordField.attr('type');

			if (passwordFieldType === 'password') {
				passwordField.attr('type', 'text');
				$(this).text('Hide');
			} else {
				passwordField.attr('type', 'password');
				$(this).text('Show');
			}
		});

		$('#show-password3').on('click', function() {
			var passwordField = $('#r-new-password');
			var passwordFieldType = passwordField.attr('type');

			if (passwordFieldType === 'password') {
				passwordField.attr('type', 'text');
				$(this).text('Hide');
			} else {
				passwordField.attr('type', 'password');
				$(this).text('Show');
			}
		});

		$(document).ready(function() {

			$('.custom-select').selectize({
				sortField: 'text'
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
					var phoneNumber = data.data.phone;
					var countryCodeInput = document.querySelector("#country-code");

					// Set the phone input field with the extracted phone number
					var phoneInput = document.querySelector("#phone");
					phoneInput.value = "+" + phoneNumber;

					// Initialize intl-tel-input without specifying an initial country
					var iti = window.intlTelInput(phoneInput, {
						separateDialCode: true,
						utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js", // Include the utils.js file
					});

					// Listen for country change event and update the hidden input
					iti.promise.then(function() {
						phoneInput.addEventListener("countrychange", function(e) {
							var selectedCountry = iti.getSelectedCountryData();
							countryCodeInput.value = "+" + selectedCountry.dialCode;
						});
					});

					var selectedCountry = iti.getSelectedCountryData();
					countryCodeInput.value = "+" + selectedCountry.dialCode;
					phoneInput.value = phoneNumber.substring((selectedCountry.dialCode).length);


					var mphoneNumber = data.data.mobile;
					var mcountryCodeInput = document.querySelector("#mcountry-code");

					// Set the phone input field with the extracted phone number
					var mphoneInput = document.querySelector("#mphone");
					if (data.data.mobile != '') {
						mphoneInput.value = "+" + mphoneNumber;
					}

					// Initialize intl-tel-input without specifying an initial country
					var miti = window.intlTelInput(mphoneInput, {
						separateDialCode: true,
						utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js", // Include the utils.js file
					});

					// Listen for country change event and update the hidden input
					miti.promise.then(function() {
						phoneInput.addEventListener("countrychange", function(e) {
							var mselectedCountry = miti.getSelectedCountryData();
							mcountryCodeInput.value = "+" + mselectedCountry.dialCode;
						});
					});
					if (data.data.mobile != '') {
						var mselectedCountry = miti.getSelectedCountryData();
						mcountryCodeInput.value = "+" + mselectedCountry.dialCode;
						mphoneInput.value = mphoneNumber.substring((mselectedCountry.dialCode).length);
					}
					$('#description').val(data.data.description);
					if (data.skills.length > 0) {
						data.skills.forEach(function(skill) {
							$('#skills-container').append('<div class="keyword"><span class="keyword-text">' + skill.name + '</span><span class="keyword-remove"></span></div>');
						});
					}
					if (data.data.type == 'user') {
						$('#freelancer').prop('checked', true);
					}
					if (window.location.hash === "#add-skill") {
						$('html, body').animate({
							scrollTop: $('#add-skill').offset().top
						}, 1000);
					}


				}
			});
		});

		$(document).on('submit', '#profile', function(e) {
			e.preventDefault();
			var form = new FormData(this);
			phone = $('#phone').val();
			var countryCode = $('#country-code').val();
			var phoneNumber = countryCode + phone;
			var sanitizedPhoneNumber = phoneNumber.replace(/\+/g, '');
			form.set('phone', sanitizedPhoneNumber);
			mphone = $('#mphone').val();
			var mcountryCode = $('#mcountry-code').val();
			var mphoneNumber = mcountryCode + mphone;
			var msanitizedPhoneNumber = mphoneNumber.replace(/\+/g, '');
			form.set('mphone', msanitizedPhoneNumber);
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