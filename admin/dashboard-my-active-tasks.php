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
				<h3>My Active Tasks</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li>My Active Tasks</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-assignment"></i> My Tasks</h3>
						</div>

						<div class="content">
							<ul id="tasks" class="dashboard-box-list">
							</ul>
						</div>
					</div>
				</div>

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

<?php include 'layout/footer.php'; ?>

<script>
	function TaskStatusChange(id){
		$.ajax({
			url: '../include/functions.php',
			type: 'POST',
			data: {
				"function" : "TaskStatusChange",
				"id" : id
			},
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
				}
			}
		});
	}
	$(document).ready(function() {
		$.ajax({
			url: '../include/functions.php',
			type: 'POST',
			data: {
				"function" : "GetActiveTasks"
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log(data);
				if (data.status == 'success') {
					var tasks = document.getElementById('tasks');
					for (var i = 0; i < data.data.length; i++) {
						tasks.innerHTML+=`<li>
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">
											<div class="freelancer-name" style="margin-left: 0px !important;">
												<h4><a href="#">${data.data[i].name}</h4>
												<span class="freelancer-detail-item"><i class="icon-feather-calendar"></i>Date Posted: <span> ${new Date(data.data[i].date).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' })}</span></span>
												<ul class="dashboard-task-info bid-info">
													<li><strong>${data.data[i].bids} Bids</strong><span>Bids</span></li>
													<li><strong>$${data.data[i].budget}</strong><span>Price</span></li>
													<li><strong> ${new Date(data.data[i].deadline).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' })}</strong><span>Deadline</span></li>
													<li><strong>${data.data[i].status}</strong><span>Status</span></li>
												</ul>
											<div class="buttons-to-right always-visible">
												<a href="dashboard-manage-bidders.php?project_id=${data.data[i].id}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Bidders </a>
												<a href="dashboard-view-task.php?project_id=${data.data[i].id}" class="button gray ripple-effect ico" title="View" data-tippy-placement="top"><i class="icon-feather-eye"></i></a>
												<a href="dashboard-edit-task.php?project_id=${data.data[i].id}" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
												<a onclick="TaskStatusChange(${data.data[i].id})" class="button gray ripple-effect ico" title="Change Status" data-tippy-placement="top"><i class="icon-feather-rotate-cw"></i></a>
											</div>
											</div>
										</div>
									</div>
								</li>`;
					}
				}else{
					var tasks = document.getElementById('tasks');
					tasks.innerHTML=`<li><h3>No Active Tasks</h3></li>`;
				}
			}
		});
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