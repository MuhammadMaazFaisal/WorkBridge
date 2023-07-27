<?php include 'layout/header.php'; ?>

<!-- Dashboard Container -->
<div class="dashboard-container">

	<?php include 'layout/sidebar.php'; ?>


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
						<li><a href="#">Dashboard</a></li>
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
											<input class="file-upload" type="file" accept="image/*" />
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
															<input id="add-skills" type="text" class="keyword-input with-border" placeholder="e.g. Angular, Laravel" />
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

			<?php include 'layout/footer-content.php'; ?>

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="../js/chart.min.js"></script>



<?php include 'layout/footer.php'; ?>
<script>
	$(document).ready(function() {
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
			form.append('function', 'UpdateProfile');
			form.append('id', <?php echo $_SESSION['user_id']; ?>);
			$.ajax({
				url: '../include/functions.php',
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