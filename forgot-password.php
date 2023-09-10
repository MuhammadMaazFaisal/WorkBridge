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
#password-reset-form {
    display: none;
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

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Forgot Password</h2>
                <nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Reset Password</li>
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
					<h3>Forgot your Password?</h3>
					<span>Don't have an account? <a href="register.php">Sign Up!</a></span>
				</div>

				<!-- Form -->
			<!-- Initial Form for Email and Verification Code -->
                <form id="verification-form" enctype="multipart/form-data">
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" required />
                    </div>
                    
                    <!-- Add an input field for verification code -->
                    <div class="input-with-icon-left">
                        <i class="icon-line-awesome-key"></i>
                        <input type="text" class="input-text with-border" name="verification_code" id="verification_code" placeholder="Verification Code" />
                    </div>
                    <p style="color: red;
    font-weight: 700;
    text-align: center;">Also Check your spam! </p>
                
                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" id="code-btn">Send Code <i class="icon-material-outline-arrow-right-alt"></i></button>
                </form>
                
                <!-- Password Reset Form -->
                <form id="password-reset-form" enctype="multipart/form-data">
                    <!-- Add input fields for new password and confirm new password -->
                    <div class="input-with-icon-left">
                        <i class="icon-line-awesome-lock"></i>
                        <input type="password" class="input-text with-border" name="new_password" id="new_password" placeholder="New Password" required />
                    </div>
                
                    <div class="input-with-icon-left">
                        <i class="icon-line-awesome-lock"></i>
                        <input type="password" class="input-text with-border" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" required />
                    </div>
                
                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" style="width: 100% !important">Reset Password <i class="icon-material-outline-arrow-right-alt"></i></button>
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
    $(document).on('submit', '#verification-form', function(e) {
        e.preventDefault();
        var form = new FormData(this);
        var v_code= document.getElementById("verification_code").value;
        console.log(v_code);
        if (v_code!=""){
            console.log("check code")
            form.append('function', 'CheckCode'); // Change the function name accordingly
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
                        // Hide the verification form
                        $('#verification-form').hide();
                        // Show the password reset form
                        $('#password-reset-form').show();
                    } else {
                        // Handle verification code error here
                    }
                }
            });
        }else{
            form.append('function', 'SendCode'); // Change the function name accordingly
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
                    	    let code_btn=document.getElementById("code-btn");
                    	    code_btn.innerHTML="Verify Code";
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: data.message,
						showConfirmButton: false,
						timer: 1500
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: data.message,
						showConfirmButton: true,
						timer: 5000
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.reload();
						}
					})
				}
                }
            });
        }
    });
    
    $(document).on('submit', '#password-reset-form', function(e) {
        e.preventDefault();
        var form = new FormData(this);
        form.append('function', 'ResetPassword'); // Change the function name accordingly
        let email=document.getElementById("email").value;
        console.log(email);
        form.append('email', email);
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
                    // Password reset successful, redirect to login page
                    window.location.href = 'login.php';
                } else {
                    // Handle password reset error here
                }
            }
        });
    });

</script>