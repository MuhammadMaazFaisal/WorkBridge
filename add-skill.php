<?php
session_start();
if ($_SESSION['user_type'] == 'user' && $_SESSION['status'] == 'logged_in') {
	include 'layout/header.php';
?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link href=" https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/css/jquery.dataTables.min.css " rel="stylesheet">
	<style>
		.selectize-input {
			padding: 13px 10px !important;
			height: 45px !important;
		}

		input[type="select-one"] {
			height: 24px !important;
		}

		a {
			text-decoration: none;
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
					<h3>Add Skills</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Add Skills</li>
						</ul>
					</nav>
				</div>

				<!-- Row -->
				<div class="row">
					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline row" style="display: flex !important;">

								<div class="col-6">
									<h3><i class="icon-feather-folder-plus"></i> All Skills</h3>
								</div>
								<div class="col-6 d-flex justify-content-end"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkillModal">
										Add Skill
									</button></div>
							</div>

							<div class="content with-padding padding-bottom-10">

								<div class="row">

									<div class="col-xl-12">
										<table id="skillsTable" class="table responsive table table-striped">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Name</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- Row / End -->
				<?php include 'layout/footer.php'; ?>
			</div>
		</div>
		<!-- Dashboard Content / End -->

	</div>
	<!-- Dashboard Container / End -->

	</div>
	<!-- Wrapper / End -->

	<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addSkillModalLabel">Add New Skill</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="addSkillForm">
						<div class="mb-3">
							<label for="skillCategory" class="form-label">Skills</label>
							<select class="form-select" id="skillCategory" name="skillCategory" required>

							</select>
						</div>
						<div class="d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Scripts
================================================== -->


	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

	<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
	<script src="../js/chart.min.js"></script>
	<script>
		function DeleteSkill(id) {
			Swal.fire({
				title: 'Are you sure?',
				text: "You want to delete this skill?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, keep it'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '../include/functions.php',
						type: 'POST',
						data: {
							function: 'DeleteUserSkill',
							id: id
						},
						success: function(data) {
							console.log(data);
							data = JSON.parse(data);
							if (data.status == 'success') {
								Swal.fire(
									'Deleted!',
									data.message,
									'success'
								).then((result) => {
									if (result.isConfirmed) {
										location.reload();
									}
								})
							} else {
								Swal.fire(
									'Error!',
									data.message,
									'error'
								)
							}
						}
					});
				}
			})
		}
		$(document).ready(function() {

			var categories = document.getElementById('skillCategory');
			$.ajax({
				url: '../include/functions.php',
				type: 'POST',
				data: {
					function: 'GetAllSkills'
				},
				success: function(data) {
					console.log(data);
					data = JSON.parse(data);
					if (data.status == 'success') {
						data.data.forEach(function(skill) {
							var option = document.createElement('option');
							option.value = skill.skill_id;
							option.text = skill.skill_name;
							categories.appendChild(option);
						});
					}
				}
			});

			$('#skillsTable').DataTable({
				"ajax": {
					url: "../include/functions.php",
					type: "POST",
					data: {
						function: 'GetAllUserSkills',
						u_id: <?php echo $_SESSION['user_id']; ?>
					},
				},
				"columns": [{
						"data": null, // null because we are not getting data from the dataset
						"render": function(data, type, row, meta) {
							return meta.row + 1; // meta.row is the row index, starts from 0
						}
					},
					{
						"data": "name"
					},
					{
						"data": "id",
						"render": function(data, type, row, meta) {
							return `<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="DeleteSkill(${data})"><i class="fa fa-trash"></i></a>`;
						}
					}
				]
			});
		});


		$('#addSkillForm').on('submit', function(e) {
			e.preventDefault();
			var skillCategory = $('#skillCategory').val();

			$.ajax({
				url: '../include/functions.php',
				type: 'POST',
				data: {
					function: 'AddUserSkill',
					s_id: skillCategory,
					u_id: <?php echo $_SESSION['user_id']; ?>
				},
				success: function(data) {
					console.log(data);
					data = JSON.parse(data);
					if (data.status === 'success') {
						$('#addSkillModal').modal('hide');
						Swal.fire('Success', data.message, 'success').then((result) => {
							if (result.isConfirmed) {
								location.reload();
							}
						})
					} else {
						Swal.fire('Error', data.message, 'error').then((result) => {
							if (result.isConfirmed) {
								location.reload();
							}
						})
					}
				}
			});
		});


		$(document).on('submit', '#add-task', function(e) {
			e.preventDefault();
			var form = new FormData(this);
			var skills = document.querySelectorAll('#skills-container .keyword-text');
			if (skills.length > 0) {
				skills.forEach(function(skill) {
					form.append('skills[]', skill.textContent.trim());
					console.log(skill.textContent.trim());
				});
				form.append('function', 'add-task');
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
						if (data.status == 'success') {
							SendEmail(data);
							Swal.fire({
								title: 'Success!',
								text: data.message,
								icon: 'success',
								confirmButtonText: 'Ok'
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.href = 'dashboard.php';
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
	header("Location: ../login.php");
	exit();
}
?>