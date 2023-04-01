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
				<h3>Post a Task</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Post a Task</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">
				<form id="add-task" enctype="multipart/form-data">
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
											<select class="selectpicker with-border" id="category" name="category" data-size="7" title="Select Category"  required>
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
														<input class="with-border" id="budget" name="budget" type="text" placeholder="Budget"  required>
														<i class="currency">USD</i>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>What skills are required? <i class="help-icon" data-tippy-placement="right" title="Up to 5 skills that best describe your project"></i></h5>
											<div class="keywords-container">
												<div class="keyword-input-container">
													<input id="add-skills" type="text" class="keyword-input with-border" placeholder="Add Skills" />
													<button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
												</div>
												<div class="keywords-list" id="skills-container"><!-- keywords go here --></div>
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
						<button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Task</button>
					</div>
				</form>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© 2023 <strong>Developed by Muhammad Maaz Faisal</strong>. All Rights Reserved.
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

<?php include 'layout/footer.php'; ?>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="../js/chart.min.js"></script>
<script>
	$(document).ready(function() {
		const myInput = document.getElementById("add-skills");

		// Add an event listener for keydown
		myInput.addEventListener("keydown", function(event) {
			// Check if the pressed key is "Enter"
			if (event.key === "Enter") {
				// Prevent form submission
				event.preventDefault();
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

	Chart.defaults.global.defaultFontFamily = "Nunito";
	Chart.defaults.global.defaultFontColor = '#888';
	Chart.defaults.global.defaultFontSize = '14';

	var ctx = document.getElementById('chart').getContext('2d');

	var chart = new Chart(ctx, {
		type: 'line',

		// The data for our dataset
		data: {
			labels: ["January", "February", "March", "April", "May", "June"],
			// Information about the dataset
			datasets: [{
				label: "Views",
				backgroundColor: 'rgba(42,65,232,0.08)',
				borderColor: '#2a41e8',
				borderWidth: "3",
				data: [196, 132, 215, 362, 210, 252],
				pointRadius: 5,
				pointHoverRadius: 5,
				pointHitRadius: 10,
				pointBackgroundColor: "#fff",
				pointHoverBackgroundColor: "#fff",
				pointBorderWidth: "2",
			}]
		},

		// Configuration options
		options: {

			layout: {
				padding: 10,
			},

			legend: {
				display: false
			},
			title: {
				display: false
			},

			scales: {
				yAxes: [{
					scaleLabel: {
						display: false
					},
					gridLines: {
						borderDash: [6, 10],
						color: "#d8d8d8",
						lineWidth: 1,
					},
				}],
				xAxes: [{
					scaleLabel: {
						display: false
					},
					gridLines: {
						display: false
					},
				}],
			},

			tooltips: {
				backgroundColor: '#333',
				titleFontSize: 13,
				titleFontColor: '#fff',
				bodyFontColor: '#fff',
				bodyFontSize: 13,
				displayColors: false,
				xPadding: 10,
				yPadding: 10,
				intersect: false
			}
		},


	});
</script>

</body>

</html>