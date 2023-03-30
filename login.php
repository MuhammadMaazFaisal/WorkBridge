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

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Log In</h2>

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
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="register.php">Sign Up!</a></span>
				</div>

				<!-- Form -->
				<form id="login-form" enctype="multipart/form-data">
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="email" placeholder="Email Address" required />
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required />
					</div>


					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
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
	$(document).on('submit', '#login-form', function(e) {
		e.preventDefault();
		var form = new FormData(this);
		form.append('function', 'login');
		$.ajax({
			url: 'include/functions.php',
			type: 'POST',
			data: form,
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				data=JSON.parse(data);
				if (data.status == 'success') {
					Swal.fire({
						icon: 'success',
						title: 'Login Success',
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						if (data.type == 'admin') {
							window.location.href = 'admin/dashboard.php';
						} else {
							window.location.href = 'browse-tasks.php';
						}
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Login Failed',
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						window.location.reload();
					});
				}
			}
		});

	})
</script>