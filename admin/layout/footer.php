

<!-- Bid Acceptance Popup
================================================== -->
<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab1">Accept Offer</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Accept Offer From David</h3>
					<div class="bid-acceptance margin-top-15">
						$3200
					</div>

				</div>

				<form id="terms">
					<div class="radio">
						<input id="radio-1" name="radio" type="radio" required>
						<label for="radio-1"><span class="radio-label"></span>  I have read and agree to the Terms and Conditions</label>
					</div>
				</form>

				<!-- Button -->
				<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">Accept <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Bid Acceptance Popup / End -->


<!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab2">Send Message</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab2">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Direct Message To David</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="send-pm">
					<textarea name="textarea" cols="10" placeholder="Message" class="with-border" required></textarea>
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">Send <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Send Direct Message Popup / End -->

<!-- Edit Bid Popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Edit Bid</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
						
					<!-- Bidding -->
					<div class="bidding-widget">
						<!-- Headline -->
						<span class="bidding-detail">Set your <strong>minimal hourly rate</strong></span>

						<!-- Price Slider -->
						<div class="bidding-value">$<span id="biddingVal"></span></div>
						<input class="bidding-slider" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min="10" data-slider-max="60" data-slider-value="40" data-slider-step="1" data-slider-tooltip="hide" />
						
						<!-- Headline -->
						<span class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>

						<!-- Fields -->
						<div class="bidding-fields">
							<div class="bidding-field">
								<!-- Quantity Buttons -->
								<div class="qtyButtons with-border">
									<div class="qtyDec"></div>
									<input type="text" name="qtyInput" value="2">
									<div class="qtyInc"></div>
								</div>
							</div>
							<div class="bidding-field">
								<select class="selectpicker default with-border">
									<option selected>Days</option>
									<option>Hours</option>
								</select>
							</div>
						</div>
				</div>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Edit Bid Popup / End -->

<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Add Note</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Do Not Forget 😎</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="add-note">

					<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
						<option>Low Priority</option>
						<option>Medium Priority</option>
						<option>High Priority</option>
					</select>

					<textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Apply for a job popup / End -->

<!-- Scripts
================================================== -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.js" integrity="sha512-VE1SVJJWxA3banvl97A4IXikhIwyPWwWAjST8kHzvnUxSI7eoKblUceEpUHGfnuFx+7GszvViiDW9+0NlZJe3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/mmenu.min.js"></script>
<script src="../js/tippy.all.min.js"></script>
<script src="../js/simplebar.min.js"></script>
<script src="../js/bootstrap-slider.min.js"></script>
<script src="../js/bootstrap-select.min.js"></script>
<script src="../js/snackbar.js"></script>
<script src="../js/clipboard.min.js"></script>
<script src="../js/counterup.min.js"></script>
<script src="../js/magnific-popup.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
	function Logout(){
		console.log('logout');
		$.ajax({
			url: '../include/functions.php',
			type: 'POST',
			data: {function: 'Logout'},
			success: function(data){
				window.location.href = '../login.php';
			}
		});
	}
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>

<?php include '../include/connection.php'; ?>