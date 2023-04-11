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
				<h3>Manage Bids</h3>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li>Manage Bids</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i><span id="bidder-count"></span> Bidders</h3>
						</div>

						<div class="content">
							<ul id="bidders" class="dashboard-box-list">

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
	$(document).ready(function() {
		let urlParams = new URLSearchParams(window.location.search);
		let projectId = urlParams.get('project_id');
		$.ajax({
			url: '../include/functions.php',
			type: 'POST',
			data: {
				'function': 'GetAllBids'
			},
			success: function(response) {
				console.log(response);
				let data = JSON.parse(response);
				console.log(data);
				if (data.status == 'success') {
					let bidder_count = document.getElementById('bidder-count').innerHTML = data.count['count(*)'];	
					let bidders = document.getElementById('bidders');
					for (let i = 0; i < data.data.length; i++) {
						bidders.innerHTML += `
						<li>
							<div class="freelancer-overview manage-candidates">
								<div class="freelancer-overview-inner">
									<div class="freelancer-avatar">
										<a href="#"><img src="../images/user.png" alt=""></a>
									</div>
									<div class="freelancer-name">
										<h4>${data.data[i].name}</h4>
										<span class="freelancer-detail-item"><i class="icon-feather-mail"></i><span>${data.data[i].email}</span></span>
										<span class="freelancer-detail-item"><i class="icon-feather-phone"></i><span>${data.data[i].phone}</span></span>
										<div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
											<a href="mailto:${data.data[i].email}" class="button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>
											<a href="https://wa.me/${data.data[i].phone}" target="_blank" class="button dark ripple-effect"><i class="icon-feather-phone-call"></i> Whatsapp</a>
										</div>
									</div>
								</div>
							</div>
						</li>`;
					}
				}else{
					let bidders = document.getElementById('bidders');
					bidders.innerHTML = `<li><h3>No Bidders</h3></li>`;
				}


			}
		});

	});
</script>

</body>

</html>