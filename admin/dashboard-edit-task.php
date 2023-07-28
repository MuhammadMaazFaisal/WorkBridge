<?php
session_start();
if ($_SESSION['user_type'] == 'admin' && $_SESSION['status'] == 'logged_in') {
include 'layout/header.php';
?>
<!-- Dashboard Container -->
<div class="dashboard-container">

	<?php include 'layout/sidebar.php'; ?>


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner">

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Edit Task</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Edit Task</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">
				<form id="edit-task" enctype="multipart/form-data">
					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Task Submission Form</h3>
							</div>

							<div class="content with-padding padding-bottom-10">

								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Project Name</h5>
											<input id="p_name" name="p_name" type="text" class="with-border" placeholder="e.g. build me a website" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Category</h5>
											<select class="selectpicker with-border" id="category" name="category" data-size="7" title="Select Category" required>
												<option>Admin Support</option>
												<option>Customer Service</option>
												<option>Data Analytics</option>
												<option>Design & Creative</option>
												<option>Legal</option>
												<option>Software Developing</option>
												<option>IT & Networking</option>
												<option>Writing</option>
												<option>Translation</option>
												<option>Sales & Marketing</option>
											</select>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Date</h5>
											<div class="input-with-icon">
												<div id="autocomplete-container">
													<input id="date" name="date" class="with-border" type="date" placeholder="Anywhere">
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>What is your estimated budget?</h5>
											<div class="row">
												<div class="col-xl-12">
													<div class="input-with-icon">
														<input class="with-border" id="budget" name="budget" type="text" placeholder="Budget" required>
														<i class="currency">USD</i>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Skills <i class="help-icon" data-tippy-placement="right" title="Add up to 10 skills"></i></h5>

											<!-- Skills List -->
											<div class="keywords-container">
												<div class="keyword-input-container">
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

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Describe Your Project</h5>
											<textarea cols="30" rows="5" id="description" name="description" class="with-border"></textarea>
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" name="upload" multiple />
												<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
												<span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Update Task</button>
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

<style>
	.selectize-input {
		padding: 13px 10px !important;
		height: 45px !important;
	}

	input[type="select-one"] {
		height: 24px !important;
	}
</style>

<!-- Scripts
================================================== -->

<?php include 'layout/footer.php'; ?>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="../js/chart.min.js"></script>
<script>
	$(document).ready(function() {
		$('.custom-select').selectize({
			sortField: 'text'
		});
		let today = new Date().toISOString().substr(0, 10);
		let dateInputs = document.querySelectorAll("input[type='date']");
		for (let i = 0; i < dateInputs.length; i++) {
			dateInputs[i].value = today;
		}

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
	});
	let urlParams = new URLSearchParams(window.location.search);
	let projectId = urlParams.get('project_id');
	$.ajax({
		url: '../include/functions.php',
		type: 'POST',
		data: {
			"function": "GetTaskDetails",
			"id": projectId
		},
		success: function(data) {
			console.log(data);
			var data = JSON.parse(data);
			console.log(data);
			$("#p_name").val(data.data.name);
			$("#category").val(data.data.category);
			$("#date").val(data.data.deadline);
			$("#budget").val(data.data.budget);
			$("#description").val(data.data.description);
			for (let i = 0; i < data.skills.length; i++) {
				$("#skills-container").append('<span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">' + data.skills[i].name + '</span></span>');
			}
		}
	});


	const myInput = document.getElementById("add-skills");
	myInput.addEventListener("keydown", function(event) {
	if (event.key === "Enter") {
		event.preventDefault();
	}
	});
	$(document).on('submit', '#edit-task', function(e) {
		e.preventDefault();
		let urlParams = new URLSearchParams(window.location.search);
		let projectId = urlParams.get('project_id');
		var form = new FormData(this);
		var skills = document.querySelectorAll('#skills-container .keyword-text');
		if (skills.length > 0) {
			skills.forEach(function(skill) {
				form.append('skills[]', skill.textContent.trim());
				console.log(skill.textContent.trim());
			});
			form.append('function', 'UpdateTask');
			form.append('id', projectId);
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
	header("Location: ../login.php");
	exit();
}
?>