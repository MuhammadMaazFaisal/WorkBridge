<?php
include 'layout/header.php';
?>


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
								<div class="user-avatar status-online"><img src="images/user-avatar-small-01.jpg" alt=""></div>
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

<!-- Spacer -->
<div class="margin-top-90"></div>
<!-- Spacer / End-->

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row" style="margin-bottom: 10px;">
		<div class="col-xl-3 col-lg-4">
			<form id="filter-task" enctype="multipart/form-data">
				<div class="sidebar-container">

					<!-- Keywords -->
					<div class="sidebar-widget">
						<h3>Keywords</h3>
						<div class="keywords-container">
							<div class="keyword-input-container">
								<input type="text" name="keywords" class="keyword-input" placeholder="e.g. task title" />
								<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
							</div>
							<div class="keywords-list"><!-- keywords go here --></div>
							<div class="clearfix"></div>
						</div>
					</div>

					<!-- Tags -->
					<div class="sidebar-widget">
						<h3>Skills</h3>
						<!-- More Skills -->
						<div class="submit-field">
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
					<div class="clearfix"></div>

					<!-- Category -->
					<div class="sidebar-widget">
						<h3>Category</h3>
						<select id="category" class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories">
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
				<button class="button full-width button-sliding-icon ripple-effect margin-top-40" type="submit">Search <i class="icon-material-outline-arrow-right-alt"></i></button>
			</form>
		</div>
		<div class="col-xl-9 col-lg-8 content-left-offset">

			<h3 class="page-title">Search Results</h3>

			<!-- Tasks Container -->
			<div id="all-tasks" class="tasks-list-container compact-list margin-top-35">

			</div>
			<!-- Tasks Container / End -->



		</div>
	</div>
</div>
<style>
	.selectize-input {
		padding: 13px 10px !important;
		height: 45px !important;
	}

	input[type="select-one"] {
		height: 24px !important;
	}
</style>

<?php
include 'layout/footer.php';
?>

<script>
	function getTimeSince(dateString) {
		let date = new Date(dateString);
		let now = new Date();
		let diff = now.getTime() - date.getTime();
		let duration = '';

		if (diff < 60000) {
			duration = 'Less than a minute ago';
		} else if (diff < 3600000) {
			duration = Math.floor(diff / 60000) + ' minute(s) ago';
		} else if (diff < 86400000) {
			duration = Math.floor(diff / 3600000) + ' hour(s) ago';
		} else {
			duration = Math.floor(diff / 86400000) + ' day(s) ago';
		}
		return duration;
	}

	function GetSkills(skills, p_id) {
		let skills_html = '';
		for (let i = 0; i < skills.length; i++) {
			if (skills[i].p_id == p_id) {
				skills_html += `<span style="margin:2px;">${skills[i].name}</span>`;
			}
		}
		return skills_html;
	}
	$(document).ready(function() {
		$('.custom-select').selectize({
			sortField: 'text'
		});

		$.ajax({
			url: 'include/functions.php',
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

		console.log('ready');
		let all_tasks = document.getElementById('all-tasks');
		$.ajax({
			url: 'include/functions.php',
			type: 'POST',
			data: {
				function: 'GetAllTasks'
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log(data);
				for (let i = 0; i < data.data.length; i++) {

					all_tasks.innerHTML += `
                <a href="task.php?task_id=${data.data[i].id}" class="task-listing">
                    <!-- Job Listing Details -->
                    <div class="task-listing-details">

                        <!-- Details -->
                        <div class="task-listing-description">
                            <h3 class="task-listing-title">${data.data[i].name}</h3>
                            <ul class="task-icons">
                                <li><i class="icon-feather-tag"></i>${' ' +data.data[i].category}</li>
								<li><i class="icon-material-outline-access-time"></i>${'  '+ getTimeSince(data.data[i].date)}</li>
                            </ul>
                            <p class="task-listing-text">${data.data[i].description}</p>
                            <div class="task-tags">
                                ${GetSkills(data.skills, data.data[i].id)}
                            </div>
                        </div>

                    </div>

                    <div class="task-listing-bid">
                        <div class="task-listing-bid-inner">
                            <div class="task-offers">
                                <strong>$${data.data[i].budget}</strong>
                            </div>
                            <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                        </div>
                    </div>
                </a>`;
				}
			}
		});
	})

	$(document).on('submit', '#filter-task', function(e) {
		e.preventDefault();
		let form = new FormData(this);
		let category= document.getElementById('category');
		for (let i = 0; i < category.options.length; i++) {
			if (category.options[i].selected) {
				form.append('category[]', category.options[i].value);
			}
		}
		var skills = document.querySelectorAll('#skills-container .keyword-text');
		if (skills.length > 0) {
			skills.forEach(function(skill) {
				form.append('skills[]', skill.textContent.trim());
				console.log(skill.textContent.trim());
			});
		}
		form.append('function', 'FilterTasks');
		let all_tasks = document.getElementById('all-tasks');	
		$.ajax({
			url: 'include/functions.php',
			type: 'POST',
			data: form,
			contentType: false,
			processData: false,
			success: function(data) {
				console.log(data);
				data = JSON.parse(data);
				console.log(data);
				all_tasks.innerHTML = '';
				for (let i = 0; i < data.data.length; i++) {

					all_tasks.innerHTML += `
                <a href="task.php?task_id=${data.data[i].id}" class="task-listing">
                    <!-- Job Listing Details -->
                    <div class="task-listing-details">

                        <!-- Details -->
                        <div class="task-listing-description">
                            <h3 class="task-listing-title">${data.data[i].name}</h3>
                            <ul class="task-icons">
                                <li><i class="icon-feather-tag"></i>${' ' +data.data[i].category}</li>
                                <li><i class="icon-material-outline-access-time"></i>${'  '+ getTimeSince(data.data[i].date)}</li>
                            </ul>
                            <p class="task-listing-text">${data.data[i].description}</p>
                            <div class="task-tags">
                                ${GetSkills(data.skills, data.data[i].id)}
                            </div>
                        </div>

                    </div>

                    <div class="task-listing-bid">
                        <div class="task-listing-bid-inner">
                            <div class="task-offers">
                                <strong>$${data.data[i].budget}</strong>
                            </div>
                            <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                        </div>
                    </div>
                </a>`;
				}
			}
		});
	})
</script>