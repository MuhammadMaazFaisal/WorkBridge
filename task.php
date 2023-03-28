<?php
include 'layout/header.php';
?>


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

                <!-- Main Navigation -->
                <nav id="navigation" class="justify-content-center">
                    <ul id="responsive">
                        <li><a href="browse-tasks.php">Browse Tasks</a>
                        </li>
                        <li><a href="#">About us</a>
                        </li>
						<li><a href="#">FAQs	</a>
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

                <!--  User Notifications -->
                <div class="header-widget hide-on-mobile">

                    <!-- Notifications -->
                    <div class="header-notifications">

                        <!-- Trigger -->
                        <div class="header-notifications-trigger">
                            <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <div class="header-notifications-headline">
                                <h4>Notifications</h4>
                                <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                    data-tippy-placement="left">
                                    <i class="icon-feather-check-square"></i>
                                </button>
                            </div>

                            <div class="header-notifications-content">
                                <div class="header-notifications-scroll" data-simplebar>
                                    <ul>
                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="dashboard-manage-candidates.html">
                                                <span class="notification-icon"><i
                                                        class="icon-material-outline-group"></i></span>
                                                <span class="notification-text">
                                                    <strong>Michael Shannah</strong> applied for a job <span
                                                        class="color">Full Stack Software Engineer</span>
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li>
                                            <a href="dashboard-manage-bidders.html">
                                                <span class="notification-icon"><i
                                                        class=" icon-material-outline-gavel"></i></span>
                                                <span class="notification-text">
                                                    <strong>Gilbert Allanis</strong> placed a bid on your <span
                                                        class="color">iOS App Development</span> project
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li>
                                            <a href="dashboard-manage-jobs.html">
                                                <span class="notification-icon"><i
                                                        class="icon-material-outline-autorenew"></i></span>
                                                <span class="notification-text">
                                                    Your job listing <span class="color">Full Stack PHP Developer</span>
                                                    is expiring.
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li>
                                            <a href="dashboard-manage-candidates.html">
                                                <span class="notification-icon"><i
                                                        class="icon-material-outline-group"></i></span>
                                                <span class="notification-text">
                                                    <strong>Sindy Forrest</strong> applied for a job <span
                                                        class="color">Full Stack Software Engineer</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>



                </div>
                <!--  User Notifications / End -->

                <!-- User Menu -->
                <div class="header-widget">

                    <!-- Messages -->
                    <div class="header-notifications user-menu">
                        <div class="header-notifications-trigger">
                            <a href="#">
                                <div class="user-avatar status-online"><img src="images/user-avatar-small-01.jpg"
                                        alt=""></div>
                            </a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <!-- User Status -->
                            <div class="user-status">

                                <!-- User Name / Avatar -->
                                <div class="user-details">
                                    <div class="user-avatar status-online"><img src="images/user-avatar-small-01.jpg"
                                            alt=""></div>
                                    <div class="user-name">
                                        Tom Smith <span>Freelancer</span>
                                    </div>
                                </div>

                                <!-- User Status Switcher -->
                                <div class="status-switch" id="snackbar-user-status">
                                    <label class="user-online current-status">Online</label>
                                    <label class="user-invisible">Invisible</label>
                                    <!-- Status Indicator -->
                                    <span class="status-indicator" aria-hidden="true"></span>
                                </div>
                            </div>

                            <ul class="user-menu-small-nav">
                                <li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i>
                                        Dashboard</a></li>
                                <li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i>
                                        Settings</a></li>
                                <li><a href="index-logged-out.html"><i
                                            class="icon-material-outline-power-settings-new"></i> Logout</a></li>
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
                        <div class="header-image"><a href="single-company-profile.html"><img
                                    src="images/browse-companies-02.png" alt=""></a></div>
                        <div class="header-details">
                            <h3>Food Delivery Mobile Application</h3>
                            <h5>About the Employer</h5>
                            <ul>
                                <li><a href="single-company-profile.html"><i class="icon-material-outline-business"></i>
                                        Acue</a></li>
                                <li>
                                    <div class="star-rating" data-rating="5.0"></div>
                                </li>
                                <li><img class="flag" src="images/flags/de.svg" alt=""> Germany</li>
                                <li>
                                    <div class="verified-badge-with-title">Verified</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="right-side">
                        <div class="salary-box">
                            <div class="salary-type">Project Budget</div>
                            <div class="salary-amount">$2,500 - $4,500</div>
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
                <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches
                    to corporate strategy foster collaborative thinking to further the overall value proposition.
                    Organically grow the holistic world view of disruptive innovation via workplace diversity and
                    empowerment.</p>

                <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day,
                    going forward, a new normal that has evolved from generation X is on the runway heading towards a
                    streamlined cloud solution. User generated content in real-time will have multiple touchpoints for
                    offshoring.</p>

                <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override
                    the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the
                    information highway will close the loop on focusing solely on the bottom line.</p>
            </div>

            <!-- Atachments -->
            <div class="single-page-section">
                <h3>Attachments</h3>
                <div class="attachments-container">
                    <a href="#" class="attachment-box ripple-effect"><span>Project Brief</span><i>PDF</i></a>
                </div>
            </div>

            <!-- Skills -->
            <div class="single-page-section">
                <h3>Skills Required</h3>
                <div class="task-tags">
                    <span>iOS</span>
                    <span>Android</span>
                    <span>mobile apps</span>
                    <span>design</span>
                </div>
            </div>
            <div class="clearfix"></div>

            <!-- Freelancers Bidding -->
            <div class="boxed-list margin-bottom-60">
                <div class="boxed-list-headline">
                    <h3><i class="icon-material-outline-group"></i> Freelancers Bidding</h3>
                </div>
                <ul class="boxed-list-ul">
                    <li>
                        <div class="bid">
                            <!-- Avatar -->
                            <div class="bids-avatar">
                                <div class="freelancer-avatar">
                                    <div class="verified-badge"></div>
                                    <a href="single-freelancer-profile.html"><img src="images/user-avatar-big-01.jpg"
                                            alt=""></a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="bids-content">
                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="single-freelancer-profile.html">Tom Smith <img class="flag"
                                                src="images/flags/gb.svg" alt="" title="United Kingdom"
                                                data-tippy-placement="top"></a></h4>
                                    <div class="star-rating" data-rating="4.9"></div>
                                </div>
                            </div>

                            <!-- Bid -->
                            <div class="bids-bid">
                                <div class="bid-rate">
                                    <div class="rate">$4,400</div>
                                    <span>in 7 days</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bid">
                            <!-- Avatar -->
                            <div class="bids-avatar">
                                <div class="freelancer-avatar">
                                    <div class="verified-badge"></div>
                                    <a href="single-freelancer-profile.html"><img src="images/user-avatar-big-02.jpg"
                                            alt=""></a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="bids-content">
                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="single-freelancer-profile.html">David Peterson <img class="flag"
                                                src="images/flags/de.svg" alt="" title="Germany"
                                                data-tippy-placement="top"></a></h4>
                                    <div class="star-rating" data-rating="4.2"></div>
                                </div>
                            </div>

                            <!-- Bid -->
                            <div class="bids-bid">
                                <div class="bid-rate">
                                    <div class="rate">$2,200</div>
                                    <span>in 14 days</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bid">
                            <!-- Avatar -->
                            <div class="bids-avatar">
                                <div class="freelancer-avatar">
                                    <a href="single-freelancer-profile.html"><img
                                            src="images/user-avatar-placeholder.png" alt=""></a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="bids-content">
                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="single-freelancer-profile.html">Marcin Kowalski <img class="flag"
                                                src="images/flags/pl.svg" alt="" title="Poland"
                                                data-tippy-placement="top"></a></h4>
                                    <span class="not-rated">Minimum of 3 votes required</span>

                                </div>
                            </div>

                            <!-- Bid -->
                            <div class="bids-bid">
                                <div class="bid-rate">
                                    <div class="rate">$3,800</div>
                                    <span>In 20 days</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bid">
                            <!-- Avatar -->
                            <div class="bids-avatar">
                                <div class="freelancer-avatar">
                                    <a href="single-freelancer-profile.html"><img
                                            src="images/user-avatar-placeholder.png" alt=""></a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="bids-content">
                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="single-freelancer-profile.html">Sebastiano Piccio <img class="flag"
                                                src="images/flags/it.svg" alt="" title="Italy"
                                                data-tippy-placement="top"></a></h4>
                                    <div class="star-rating" data-rating="4.5"></div>
                                </div>
                            </div>

                            <!-- Bid -->
                            <div class="bids-bid">
                                <div class="bid-rate">
                                    <div class="rate">$3,400</div>
                                    <span>In 10 days</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>


        <!-- Sidebar -->
        <div class="col-xl-4 col-lg-4">
            <div class="sidebar-container">

                <div class="countdown green margin-bottom-35">6 days, 23 hours left</div>

                <div class="sidebar-widget">
                    <div class="bidding-widget">
                        <div class="bidding-headline">
                            <h3>Bid on this job!</h3>
                        </div>
                        <div class="bidding-inner">

                            <!-- Headline -->
                            <span class="bidding-detail">Set your <strong>minimal rate</strong></span>

                            <!-- Price Slider -->
                            <div class="bidding-value">$<span id="biddingVal"></span></div>
                            <input class="bidding-slider" type="text" value="" data-slider-handle="custom"
                                data-slider-currency="$" data-slider-min="2500" data-slider-max="4500"
                                data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide" />

                            <!-- Headline -->
                            <span class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>

                            <!-- Fields -->
                            <div class="bidding-fields">
                                <div class="bidding-field">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons">
                                        <div class="qtyDec"></div>
                                        <input type="text" name="qtyInput" value="1">
                                        <div class="qtyInc"></div>
                                    </div>
                                </div>
                                <div class="bidding-field">
                                    <select class="selectpicker default">
                                        <option selected>Days</option>
                                        <option>Hours</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Button -->
                            <button id="snackbar-place-bid"
                                class="button ripple-effect move-on-hover full-width margin-top-30"><span>Place a
                                    Bid</span></button>

                        </div>
                        <div class="bidding-signup">Don't have an account? <a href="#sign-in-dialog"
                                class="register-tab sign-in popup-with-zoom-anim">Sign Up</a></div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="sidebar-widget">
                    <h3>Bookmark or Share</h3>

                    <!-- Bookmark Button -->
                    <button class="bookmark-button margin-bottom-25">
                        <span class="bookmark-icon"></span>
                        <span class="bookmark-text">Bookmark</span>
                        <span class="bookmarked-text">Bookmarked</span>
                    </button>

                    <!-- Copy URL -->
                    <div class="copy-url">
                        <input id="copy-url" type="text" value="" class="with-border">
                        <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url"
                            title="Copy to Clipboard" data-tippy-placement="top"><i
                                class="icon-material-outline-file-copy"></i></button>
                    </div>

                    <!-- Share Buttons -->
                    <div class="share-buttons margin-top-25">
                        <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                        <div class="share-buttons-content">
                            <span>Interesting? <strong>Share It!</strong></span>
                            <ul class="share-buttons-icons">
                                <li><a href="#" data-button-color="#3b5998" title="Share on Facebook"
                                        data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                                <li><a href="#" data-button-color="#1da1f2" title="Share on Twitter"
                                        data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                <li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus"
                                        data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
                                <li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn"
                                        data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                            </ul>
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

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for "place a bid" button
$('#snackbar-place-bid').click(function() {
    Snackbar.show({
        text: 'Your bid has been placed!',
    });
});


// Snackbar for copy to clipboard button
$('.copy-url-button').click(function() {
    Snackbar.show({
        text: 'Copied to clipboard!',
    });
});
</script>

<?php
include 'layout/footer.php';
?>