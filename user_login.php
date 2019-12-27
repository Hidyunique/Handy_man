<?php
	session_start();
	$_SESSION['userName'] = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
	$_SESSION['id'] 	  = isset($_SESSION['id']) ? $_SESSION['id'] : "";
    //print_r($_SESSION);die();
	if($_SESSION['userName'] != ""){
		//echo "You are not authorize to view this page, Redirecting to Login Page";
		header("refresh:0; url=employee_dashboard.php"); //die;
	}

include_once("classes/employeeCrud.php");
if(isset($_POST['login'])){
	$loginObj = new employeeCrudClass();
	
	$loginObj->employeelogin($_POST);

	}

if(isset($_POST['register'])){

	$empObj =  new employeeCrudClass();

	$empObj->createEmployee($_POST);
}



	// if(isset($_POST['login'])){
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
// }
	// include_once("config/dbconfig.php");

	// $con = new dbConnect();

?>


<!DOCTYPE html>

<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Handyman - Job Board HTML Template</title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	
	
	<!-- CSS
	================================================== -->
	<!-- Base + Vendors CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fonts/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/fonts/entypo/css/entypo.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css" media="screen">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css" media="screen">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">
	<link rel="stylesheet" href="vendor/flexslider/flexslider.css" media="screen">
	<link rel="stylesheet" href="vendor/job-manager/frontend.css" media="screen">

	<!-- Theme CSS-->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/animate.min.css">
   

	<!-- Head Libs -->
	<script src="vendor/modernizr.js"></script>

	
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicons/favicon-120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicons/favicon-152.png">
	
</head>
<body>

	<div class="site-wrapper">

		<!-- Header -->
		<header class="header header-menu-fullw">

			<!-- Header Top Bar -->
			<div class="header-top">
				<div class="container">
					<div class="header-top-left">
						<button class="btn btn-sm btn-default menu-link menu-link__secondary">
							<i class="fa fa-bars"></i>
						</button>
						<div class="menu-container">
							<ul class="header-top-nav header-top-nav__secondary">
								<li><a href="#"><i class="fa fa-twitter"></i> <span class="nav-label">Twitter</span></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i> <span class="nav-label">Facebook</span></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i> <span class="nav-label">Google+</span></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i> <span class="nav-label">Pinterest</span></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i> <span class="nav-label">Instagram</span></a></li>
								<li><a href="#"><i class="fa fa-rss"></i> <span class="nav-label">RSS Feed</span></a></li>
							</ul>
						</div>
					</div>
					<div class="header-top-right">
						<button class="btn btn-sm btn-default menu-link menu-link__tertiary">
							<i class="fa fa-user"></i>
						</button>
						<div class="menu-container">
							<ul class="header-top-nav header-top-nav__tertiary">
								<li><a href="page-login.php"><i class="fa fa-user-plus"></i> Employer</a></li>
								<li><a href="user_login.php"><i class="fa fa-sign-in"></i> Employee</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Top Bar / End -->
			
			<div class="header-main">
				<div class="container">
					<!-- Logo -->
					<div class="logo">
						<a href="index.php"><img src="images/logo.png" alt="Handyman"></a>
						<!-- <h1><a href="index.html"><span>Handy</span>Man</a></h1> -->
					</div>
					<!-- Logo / End -->

					<button type="button" class="navbar-toggle">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Navigation -->
					<nav class="nav-main">
						<div class="nav-main-inner">
							<ul data-breakpoint="992" class="flexnav">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="page-about.html">About Us</a></li>
										<li><a href="page-services.html">Services</a></li>
										<li><a href="page-team.html">Team</a></li>
										<li><a href="page-team-member.html">Team Member</a></li>
										<li><a href="page-faqs.html">FAQs</a></li>
										<li><a href="page-fullwidth.html">Full Width</a></li>
										<li><a href="page-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="page-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="page-login.php">Login &amp; Register</a></li>
										<li><a href="page-404.html">404</a></li>
									</ul>
								</li>
								<li><a href="#">Features</a>
									<ul>
										<li><a href="features-shortcodes.html">Shortcodes</a></li>
										<li><a href="features-pricing-tables.html">Pricing Tables</a></li>
										<li><a href="features-typography.html">Typography</a></li>
										<li><a href="features-columns.html">Columns</a></li>
										<li><a href="features-icons.html">Icons</a></li>
									</ul>
								</li>
								<li><a href="#">Jobs</a>
									<ul>
										<li><a href="job-post-profile.html">Post a Profile</a></li>
										<li><a href="post_job.php">Post a Job</a></li>
										<li><a href="job-professionals.html">Professionals</a></li>
										<li><a href="job-dashboard.html">Dashboard</a></li>
										<li><a href="job-profile.html">Profile</a></li>
									</ul>
								</li>
								<li><a href="blog-right-sidebar.html">Blog</a>
									<ul>
										<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
										<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
										<li><a href="blog-fullwidth.html">Blog Full Width</a></li>
										<li><a href="blog-post.html">Single Post</a></li>
									</ul>
								</li>
								<li><a href="page-contacts.html">Contacts</a></li>
							</ul>
						</div>
					</nav>
					<!-- Navigation / End -->

				</div>
			</div>
			
		</header>
		<!-- Header / End -->
		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>EMPLOYEE</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
						<div class="col-md-6">
							<div class="box">
								<h3>Login</h3>
								<form action="user_login.php" name ="login" method="POST" role="form">
									<div class="form-group">
										<label>Username or email address <span class="required">*</span></label>
										<input type="text" name="username" class="form-control">
									</div>
									<div class="form-group">
										<div class="clearfix">
											<label class="pull-left">
												Password <span class="required">*</span>
											</label>
											<span class="pull-right"><a href="password_reset.php">Lost password?</a></span>
										</div>
										<input type="password" name="password" class="form-control">
									</div>
									<button type="submit" name = "login" class="btn btn-primary btn-inline">Login</button>&nbsp; &nbsp; &nbsp; 
									<label for="remember" class="checkbox-inline">
										<input type="checkbox" name="remember" id="remember"> Remember me
									</label>
								</form>
							</div>
						</div>
						<div class="col-md-6">
							<div class="spacer-lg visible-sm visible-xs"></div>
							<div class="box">
								<h3>Register</h3>
								<form action="user_login.php" method="POST" role="form">
									
									<div class="form-group">
										<label>Firstname <span class="required">*</span></label>
										<input type="text" name="firstname" class="form-control">
									</div>
									<div class="form-group">
										<label>Surname <span class="required">*</span></label>
										<input type="text" name="surname" class="form-control">
									</div>
									<div class="form-group">
										<label>Username <span class="required">*</span></label>
										<input type="text" name="username" class="form-control">
									</div>
									<div class="form-group">
										<label>Email address <span class="required">*</span></label>
										<input type="text"  name ="email" class="form-control">
									</div>
									<div class="form-group">
										<label>Phone <span class="required">*</span></label>
										<input type="text"  name ="phone" class="form-control">
									</div>
									<div class="form-group">
										<label>Address <span class="required">*</span></label>
										<input type="text"  name ="address" class="form-control">
									</div>
									 <div class="row">							
										<div class="col-md-6">
											<div class="form-group">
												<label>
													Password <span class="required">*</span>
												</label>
												<input type="password" name="password" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>
													Re-enter Password <span class="required">*</span>
												</label>
												<input type="password" name="cpassword" class="form-control">
											</div>
										</div>
									</div>

									<button type="submit" name = "register" class="btn btn-primary">Register</button>
								</form>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- Page Content / End -->

						<!-- Page Content / End -->
<?php
	include_once("template/footer.php");
?>
</html>