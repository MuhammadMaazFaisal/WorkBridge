<?php
session_start();
if ($_SESSION['user_type'] == 'admin' && $_SESSION['status'] == 'logged_in') {
	include 'layout/header.php';
?>
	<style>
		.download-btn {
			color: #2a41e8;
			border: 1px solid #2a41e8;
			display: flex;
			align-items: center;
			justify-content: center;
			box-sizing: border-box;
			height: 44px;
			padding: 10px 18px;
			cursor: pointer;
			border-radius: 4px;
			background-color: transparent;
			flex-direction: row;
			transition: 0.3s;
			margin: 0;
			outline: none;
			box-shadow: 0 3px 10px rgba(102, 103, 107, 0.1);
		}
	</style>
	<!-- Dashboard Container -->
	<div class="dashboard-container">

		<?php include 'layout/sidebar.php'; ?>


		<!-- Dashboard Content
	================================================== -->
		<div class="dashboard-content-container" data-simplebar>
			<div class="dashboard-content-inner">

				<!-- Dashboard Headline -->
				<div class="dashboard-headline">
					<h3>View Task</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="dashboard.php">Dashboard</a></li>
							<li>View Task</li>
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
												<input class="selectpicker with-border" id="category" name="category" data-size="7" title="Select Category" required>
												</input>
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
											</div>
										</div>

										<div class="col-xl-12">
											<div class="submit-field">
												<h5>Attachments</h5>
												<div id="downloadButtonContainer" class="">
													<!-- Files will be listed here -->
												</div>
												
											</div>

										</div>

									</div>
								</div>
							</div>
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
					$("#skills-container").append('<span class="keyword" style="margin: 5px 8px 0px 0px;"><span class="keyword-remove"></span><span class="keyword-text">' + data.skills[i].name + '</span></span>');
				}
				if (data.data.upload) {
					var uploadPath = data.data.upload;

					// Create download button
					var downloadButton = $('<a />', {
						href: uploadPath,
						text: 'Download File',
						class: 'btn btn-primary download-btn ', // Add Bootstrap button class
						download: '', // This will use the file name from the path
					});
					$('#downloadButtonContainer').html(downloadButton);
				}
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