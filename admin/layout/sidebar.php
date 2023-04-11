<!-- Dashboard Sidebar
	================================================== -->
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
					<ul data-submenu-title="Start">
						<li class="active"><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
					</ul>
					<ul data-submenu-title="Organize and Manage">
						<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>
							<ul>
								<li><a href="dashboard-manage-tasks.php">Manage Tasks</a></li>
								<li><a href="dashboard-manage-bids.php">Manage Bids</a></li>
								<li><a href="dashboard-my-active-tasks.php">My Active Tasks</a></li>
								<li><a href="dashboard-post-a-task.php">Post a Task</a></li>
							</ul>
						</li>
					</ul>

					<ul data-submenu-title="Account">
						<li><a href="dashboard-settings.php"><i class="icon-material-outline-settings"></i> Settings</a></li>
						<li><a onclick="Logout()"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
					</ul>

				</div>
			</div>
			<!-- Navigation / End -->

		</div>
	</div>
</div>
<!-- Dashboard Sidebar / End -->