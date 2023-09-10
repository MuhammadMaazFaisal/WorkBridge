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
				<h3>Howdy, <?php echo $_SESSION['user_name']; ?></h3>
				<span>We are glad to see you again!</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Dashboard</li>
					</ul>
				</nav>
			</div>

			<!-- Fun Facts Container -->
			<div class="fun-facts-container">
					<div class="fun-fact" data-fun-fact-color="#b81b7f">
						<div class="fun-fact-text">
							<span>Total Tasks</span>
							<h1 id="total-tasks"></h1>
						</div>
						<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
					</div>
					<div class="fun-fact" data-fun-fact-color="#36bd78">
						<div class="fun-fact-text">
							<span>Total Bids</span>
							<h1 id="total-bids"></h1>
						</div>
						<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
					</div>
				</div>
			<div class="fun-facts-container" style="margin-top: 10px;">


			</div>
			<?php include 'layout/footer-content.php'; ?>

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<?php include 'layout/footer.php'; ?>
<script src="js/chart.min.js"></script>
<script>
$(document).ready(function() {
			$.ajax({
				url: '../include/functions.php',
				type: 'POST',
				data: {
					"function": "GetTotal"
				},
				success: function(data) {
					console.log(data);
					data = JSON.parse(data);
					console.log(data);
					$("#total-bids").html(data.total_bids);
					$("#total-tasks").html(data.total_tasks);
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