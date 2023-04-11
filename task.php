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
                    <a href="browse-tasks.html"><img src="images/logo.png" alt=""></a>
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


<!-- Titlebar
================================================== -->
<div class="single-page-header" data-background-image="images/single-task.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-page-header-inner">
                    <div class="left-side">
                        <div class="header-image"><a href="single-company-profile.html"><img src="images/browse-companies-02.png" alt=""></a></div>
                        <div class="header-details">
                            <h3 id="projetc-name">Food Delivery Mobile Application</h3>
                        </div>
                    </div>
                    <div class="right-side">
                        <div class="salary-box">
                            <div class="salary-type">Project Budget</div>
                            <div id="budget" class="salary-amount">$2,500 - $4,500</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Page Content
================================================== -->
<div class="container">
    <div class="row">

        <!-- Content -->
        <div class="col-xl-8 col-lg-8 content-right-offset">

            <!-- Description -->
            <div class="single-page-section">
                <h3 class="margin-bottom-25">Project Description</h3>
                <p id="description"></p>
            </div>

            <!-- Atachments -->
            <div class="single-page-section">
                <h3>Attachments</h3>
                <div class="attachments-container">
                    <a id="attachment" href="http://localhost/Repositories/WorkBridge/" class="attachment-box ripple-effect" download><span>Project Brief</span></a>
                </div>
            </div>

            <!-- Skills -->
            <div class="single-page-section">
                <h3>Skills Required</h3>
                <div id="skills" class="task-tags">
                    <span>iOS</span>
                </div>
            </div>
            <div class="clearfix"></div>


        </div>


        <!-- Sidebar -->
        <div class="col-xl-4 col-lg-4">
            <div class="sidebar-container">

                <div id="deadline" class="countdown green margin-bottom-35"></div>

                <div class="sidebar-widget">
                    <div class="bidding-widget">
                        <div class="bidding-headline">
                            <h3 style="text-align: center;">Bid on this job!</h3>
                            <!-- Button -->
                            <button id="snackbar-place-bid" class="button ripple-effect move-on-hover full-width margin-top-30"><span>Interested</span></button>
                        </div>
                        <div class="bidding-inner">


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->


<?php
include 'layout/footer.php';
?>

<script>
    $(document).ready(function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var id = url.searchParams.get("task_id");
        $.ajax({
            url: "include/functions.php",
            type: "POST",
            data: {
                id: id,
                function: "GetTaskDetails"
            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                $("#projetc-name").html(data.data.name);
                $("#deadline").html("Deadline:  " + new Date(data.data.deadline).toDateString());
                $("#budget").html("$" + data.data.budget);
                $("#description").html(data.data.description);
                $("#attachment").attr("href", "images/" + data.data.upload);
                for (var i = 0; i < data.skills.length; i++) {
                    $("#skills").append('<span>' + data.skills[i].name + '</span>');
                }
            }
        });

        $('#snackbar-place-bid').click(function() {
            $.ajax({
                url: "include/functions.php",
                type: "POST",
                data: {
                    p_id: id,
                    u_id: <?php echo $_SESSION['user_id']; ?>,
                    function: "PlaceBid"
                },
                success: function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    if (data.status == "success") {
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = "browse-tasks.php";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = "browse-tasks.php";
                            }
                        });
                    }
                }
            }); 

        });
    });
</script>