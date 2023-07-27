<?php
include 'layout/header.php';
?>

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="index.html"><img src="images/logo.png" alt=""></a>
				</div>
			</div>
			<!-- Left Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Register</h2>

			</div>
		</div>
	</div>
</div>

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">

			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="login.php">Log In!</a></span>
				</div>

				<!-- Form -->
				<form id="register-account-form" enctype="multipart/form-data">

					<div class="input-with-icon-left">
						<i class="icon-material-outline-person-pin"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="Full Name" required />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-feather-phone"></i>
						<input type="text" title="919876543210" class="input-text with-border" name="phone" id="phone" value="" placeholder="e.g. 913152389052" required />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" required />
					</div>
					<div class="input-with-icon-left" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required />
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password-repeat" id="password-repeat" placeholder="Repeat Password" required />
					</div>


					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->



<?php
include 'layout/footer.php';
?>
<script>
	$(document).on('submit', '#register-account-form', function(e) {
		e.preventDefault();
		var form = new FormData(this);
		form.append('function', 'register');
		password = $('#password').val();
		password_repeat = $('#password-repeat').val();
		phone = $('#phone').val();
		pattern = /^\d{12}$/;
		if (!pattern.test(phone)) {
			Swal.fire({
				title: 'Registration failed!',
				text: 'Phone number is not valid',
				icon: 'error',
				timer: 5000 // set the timer to 1 second
			});
		} else {
			if (password != password_repeat) {
				Swal.fire({
					title: 'Registration failed!',
					text: 'Password does not match',
					icon: 'error',
					timer: 5000 // set the timer to 1 second
				}).then((result) => {
					if (result.isConfirmed) {
						password = '';
						password_repeat = '';
					}
				});
			} else {
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
						if (data.status == 'success') {
							Swal.fire({
								title: 'Registration successful!',
								icon: 'success',
								timer: 2000 // set the timer to 1 second
							}).then(function() {
								window.location.href = 'login.php';
							});
						} else {
							Swal.fire({
								title: 'Registration failed!',
								text: data.message,
								icon: 'error',
								timer: 2000 // set the timer to 1 second
							}).then(function() {
								window.location.reload();
							});
						}
					}
				});
			}
		}
	});
</script>