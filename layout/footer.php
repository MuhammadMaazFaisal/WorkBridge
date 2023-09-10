<!-- Footer
================================================== -->
<div id="footer">


	<!-- Footer Copyrights -->
	<div class="footer-bottom-section"  style="margin-top:72vh">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
				© 2023 <strong><a href="mailto:m.maazfaisal0301@gmail.com"> Developed by Muhammad Maaz Faisal</a></strong>. All Rights Reserved.
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.js" integrity="sha512-VE1SVJJWxA3banvl97A4IXikhIwyPWwWAjST8kHzvnUxSI7eoKblUceEpUHGfnuFx+7GszvViiDW9+0NlZJe3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/intlTelInput.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/snackbar.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
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
	function Logout(){
		console.log('logout');
		$.ajax({
			url: 'include/functions.php',
			type: 'POST',
			data: {function: 'Logout'},
			success: function(data){
				window.location.href = 'login.php';
			}
		});
	}
</script>

