<?php
include 'layout/header.php';
?>
<style>
    .toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}

.toggle-password i {
    font-size: 18px;
    color: #888;
    transition: color 0.3s;
}

.toggle-password:hover i {
    color: #333; /* Change color on hover for better visibility */
}
.iti{
    display: block !important;
    margin-bottom:16px;
}
</style>

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="index.html"><img src="images/logo.png" alt=""></a>
				</div>
			</div>
			<!-- Left Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Register</h1>
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Register</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">

			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h1 style="margin-bottom:14px;font-size:37px">Let's create your account!</h1>
					<span>Already have an account? <a href="login.php">Log In!</a></span>
				</div>

				<!-- Form -->
				<form id="register-account-form" enctype="multipart/form-data">

					<div class="input-with-icon-left">
						<i class="icon-material-outline-person-pin"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="Full Name" required />
					</div>
					<div class="input-with-icon-left">
                        <i class="icon-feather-phone"></i>
                        <input type="tel" class="input-text with-border" name="phone" id="phone" placeholder="e.g. 3152389052" required />
                        <input type="hidden" id="country-code" name="country_code" value="+1" /> <!-- Default country code -->
                    </div>
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" required />
					</div>
					<div class="input-with-icon-left" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required />
						<span class="toggle-password" id="show-password1">
                            Show
                        </span>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password-repeat" id="password-repeat" placeholder="Repeat Password" required />
						<span class="toggle-password" id="show-password2">
                            Show
                        </span>
					</div>


					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->



<?php
include 'layout/footer.php';
?>
<script>
     $(document).ready(function () {
        var phoneInput = document.querySelector("#phone");
        var countryCodeInput = document.querySelector("#country-code");
    
        // Initialize intl-tel-input
        var iti = window.intlTelInput(phoneInput, {
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js", // Include the utils.js file
        });
    
        // Listen for country change event and update the hidden input
        iti.promise.then(function () {
            phoneInput.addEventListener("countrychange", function (e) {
                var selectedCountry = iti.getSelectedCountryData();
                countryCodeInput.value = "+" + selectedCountry.dialCode;
            });
        });
         
         
        $('#show-password1').on('click', function () {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).text('Hide');
            } else {
                passwordField.attr('type', 'password');
                $(this).text('Show');
            }
        });
        
         $('#show-password2').on('click', function () {
            var passwordField = $('#password-repeat');
            var passwordFieldType = passwordField.attr('type');
            
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).text('Hide');
            } else {
                passwordField.attr('type', 'password');
                $(this).text('Show');
            }
        });
        
    });
    
	$(document).on('submit', '#register-account-form', function(e) {
		e.preventDefault();
		var form = new FormData(this);
		form.append('function', 'register');
		password = $('#password').val();
		password_repeat = $('#password-repeat').val();
		phone = $('#phone').val();
		var countryCode = $('#country-code').val();
		var phoneNumber=countryCode+phone;
		var sanitizedPhoneNumber = phoneNumber.replace(/\+/g, '');
		console.log(sanitizedPhoneNumber);
		form.set('phone', sanitizedPhoneNumber);
		if (password != password_repeat) {
			Swal.fire({
				title: 'Registration failed!',
				text: 'Password does not match',
				icon: 'error',
				timer: 5000 // set the timer to 1 second
			}).then((result) => {
				if (result.isConfirmed) {
					password = '';
					password_repeat = '';
				}
			});
		} else {
		    
			$.ajax({
				url: 'include/functions.php',
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
							title: 'Registration successful!',
							icon: 'success',
							timer: 2000 // set the timer to 1 second
						}).then(function() {
							window.location.href = 'login.php';
						});
					} else {
						Swal.fire({
							title: 'Registration failed!',
							text: data.message,
							icon: 'error',
							timer: 2000 // set the timer to 1 second
						}).then(function() {
							window.location.reload();
						});
					}
				}
			});
		}
	});
</script>
