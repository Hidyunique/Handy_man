<?php
session_start();
	//print_r($_SESSION);die;
	$_SESSION['userName'] 	  = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
	$_SESSION['id'] 	 	  = isset($_SESSION['id']) ? $_SESSION['id'] : "";
	$_SESSION['firstname'] 	  = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
	$_SESSION['logo'] 		  = isset($_SESSION['logo']) ? $_SESSION['logo'] : "";
	$_SESSION['status'] 	  = isset($_SESSION['status']) ? $_SESSION['status'] : "";

//echo $_GET['userName']; die();
	// if($_SESSION['userName'] == ""){
	// 	echo "You are not authorize to view this page, Redirecting to Login Page";
	// 	header("refresh:5; url= page-login.php"); die;
	// }

include_once("classes/adminCrud.php");
include_once('classes/employeeCrud.php');

//---Admin Class Instance & Called Methods------/
$adminObj = new adminCrudClass();
	
	//=======Counts=======/

	$countEmployer 	 = $adminObj->countEmployer();
	$countEmployee 	 = $adminObj->countEmployee();
	$countFilledJobs = $adminObj->countFilledJobs();
	$countAllJobs 	 = $adminObj->countAllJobs();

	//=======Jobs Display=======/
	 $viewOpenApprovedJobObj = new adminCrudClass();
	 $recs = $viewOpenApprovedJobObj->viewOpenApprovedJobs();


$userObj  = new employeeCrudClass();




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

			<!-- Slider -->
			<section class="slider-holder">
				<div class="flexslider carousel">
					<ul class="slides">
						<li>
							<img src="images/samples/slide1.jpg" alt="" />
						</li>
						<li>
							<img src="images/samples/slide2.jpg" alt="" />
						</li>
						<li>
							<img src="images/samples/slide3.jpg" alt="" />
						</li>
					</ul>

					<div class="search-box">
						<div class="container">
							<div class="search-box-inner">
								<h1>Search for Professionals</h1>
								<form action="job-professionals.html" method="POST" role="form">

									<div class="row">
										<div class="col-md-3 col-md-offset-1">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="All Professionals">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Any Location">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="select-style">
													<select class="form-control">
														<option>All Services</option>
														<option>Handiwork</option>
														<option>Painting</option>
														<option>Decks</option>
														<option>Electrical</option>
														<option>Plumbing</option>
														<option>Plaster &amp; Drywall</option>
														<option>Flooring</option>
														<option>Kitchen Design</option>
														<option>Welding</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Slider / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">

					<!-- Stats -->
					<div class="section-light section-nomargin">
						<div class="section-inner">
							<div class="row">
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-suitcase"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $countAllJobs ?>" data-speed="1500" data-refresh-interval="50">42
											</span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">All Jobs</span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-thumbs-o-up"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $countFilledJobs ?>" data-speed="1500" data-refresh-interval="50">12</span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Jobs Filled</span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-user"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $countEmployer ?>" data-speed="1500" data-refresh-interval="50">48</span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Employers</span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-users"></i>
										<span class="counter-wrap">
											<span class="counter" data-to="<?php echo $countEmployee ?>" data-speed="1500" data-refresh-interval="50"></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Employee</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Stats / End -->

					<div class="spacer-xl"></div>

					<!-- Listings -->
					<div class="title-bordered">
						<h2>Our Jobs Vacancies <small>Latest added</small></h2>
					</div>

					<div class="job_listings">
						<ul class="job_listings">
				
				<?php 
						foreach ($recs as $row) {
							//print_r($row); die;				
						 echo	"	<li class='job_listing'>
										<a href='userViewJob.php?id={$row['id']}'>
											<div class='job_img'>
												<img src='' 'alt='' class='company_logo'>
											</div>
											<div class='position'>
												<h3>{$row['category']}</h3>
												<div class='company'>
													<strong>{$row['title']}</strong>
												</div>
												
											</div>
											<div class='location'>
												<i class='fa fa-location-arrow'></i> {$row['description']}
											</div>
											<div class='location'>
												<i class='fa fa-location-arrow'></i> {$row['location']}
											</div>
											
											<ul class='meta'>
												<li class='job-type'>{$row['job_type']}</li>
												<li class='date'>
													Posted {$row['posted_date']}
												</li>
											</ul>
											
										</a>
									 </li>

									 ";
						}
					?>	
								</ul>
							</div>


					<div class="spacer"></div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<a class="btn btn-default btn-block" href="#">View All Professionals</a>
						</div>
					</div>

					<!-- Listings / End -->

					<div class="spacer-xxl"></div>

					<!-- Promobox -->
					<div class="promobox" data-stellar-background-ratio="0.5">
						<div class="row">
							<div class="col-md-4 promobox-item">
								<h4><span>For</span> Designers</h4>
								<img src="images/samples/worker3.png" alt="" class="img-responsive">
								<a href="#" class="btn btn-primary btn-sm">See Here</a>
							</div>
							<div class="col-md-4 promobox-item">
								<h4><span>For</span> Plumbers</h4>
								<img src="images/samples/worker1.png" alt="" class="img-responsive">
								<a href="#" class="btn btn-primary btn-sm">See Here</a>
							</div>
							<div class="col-md-4 promobox-item">
								<h4><span>For</span> Builders</h4>
								<img src="images/samples/worker2.png" alt="" class="img-responsive">
								<a href="#" class="btn btn-primary btn-sm">See Here</a>
							</div>
						</div>
					</div>
					<!-- Promobox / End -->

					<div class="spacer-lg"></div>

					<!-- Services -->
					<div class="title-bordered">
						<h2>Our Services <small>services we provided</small></h2>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-bug"></i>
								</div>
								<div class="icon-box-body">
									<h5>Pest Control</h5>
									<p>We use the latest technology to test new and innovated products so we can protect.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-cog"></i>
								</div>
								<div class="icon-box-body">
									<h5>Engineering Consultant</h5>
									<p>Consulting engineering is a professional service that provides independent expertise.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-recycle"></i>
								</div>
								<div class="icon-box-body">
									<h5>Environmental Consulting</h5>
									<p>Managing, protecting and restoring the environment are integral to our services.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-suitcase"></i>
								</div>
								<div class="icon-box-body">
									<h5>Handiwork</h5>
									<p>We are professional tile installers who can install and repair tile in many areas of your home.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-lightbulb-o"></i>
								</div>
								<div class="icon-box-body">
									<h5>Lighting Design</h5>
									<p>Professional lighting designers dedicate their careers exclusively to the art and science of lighting.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-cube"></i>
								</div>
								<div class="icon-box-body">
									<h5>Storage</h5>
									<p>Hiring our professional handyman services ensures proper storage installation.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-tree"></i>
								</div>
								<div class="icon-box-body">
									<h5>Tree Service</h5>
									<p>Provides vegetation management, storm restoration, and work planning services.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-car"></i>
								</div>
								<div class="icon-box-body">
									<h5>Moving</h5>
									<p>Whether you're moving down the street or across the country, we'll help you manage your relocation stress.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="entypo tools"></i>
								</div>
								<div class="icon-box-body">
									<h5>General Contracting</h5>
									<p>We develop special tailor-made solutions in collaboration with our customers.</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Services / End -->

					<!-- Clients -->
					<div class="section-light section-bg2 section-overlay__yes section-overlay-color__primary section-overlay_opacity-90" data-stellar-background-ratio="0.5">
						<div class="section-inner">
							<div class="row">
								<div class="col-sm-3 col-md-3">
									<div class="text-center">
										<a href="#"><img src="images/samples/client-logo1-dark.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="text-center">
										<a href="#"><img src="images/samples/client-logo2-dark.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="text-center">
										<a href="#"><img src="images/samples/client-logo3-dark.png" alt="" class="img-responsive"></a>
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="text-center">
										<a href="#"><img src="images/samples/client-logo4-dark.png" alt="" class="img-responsive"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Clients / End -->

					<div class="spacer"></div>

					<!-- Testimonials -->
					<div class="title-bordered">
						<h2>Testimonials <small>what clients say</small></h2>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="testimonial">
								<blockquote>
									<p>If you're faced with home improvement or repair tasks, and don't have the time, I would give Handyman my highest recommendation.</p>
								</blockquote>
								<div class="bq-author">
									<figure class="author-img">
										<img src="images/samples/user1-sm.jpg" alt="">
									</figure>
									<h6>Michael Smith</h6>
									<span class="bq-author-info">Copywriter</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="testimonial">
								<blockquote>
									<p>They worked hard and offered to help me set up my furniture once it was in my new home.</p>
									<p>Very pleased!</p>
								</blockquote>
								<div class="bq-author">
									<figure class="author-img">
										<img src="images/samples/user3-sm.jpg" alt="">
									</figure>
									<h6>Bradley Cooper</h6>
									<span class="bq-author-info">Teacher</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="testimonial">
								<blockquote>
									<p>The movers were friendly, helpful, polite, professional and efficient. They did a great job! I would highly recommend them! Thank you!</p>
								</blockquote>
								<div class="bq-author">
									<figure class="author-img">
										<img src="images/samples/user2-sm.jpg" alt="">
									</figure>
									<h6>Hanna Pinkman</h6>
									<span class="bq-author-info">Radiologist</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="testimonial">
								<blockquote>
									<p>I am very happy with their work. they did a great job. They were very helpful with other aspects of the work i had in mind. They were very clean, and very quick.</p>
								</blockquote>
								<div class="bq-author">
									<figure class="author-img">
										<img src="images/samples/user4-sm.jpg" alt="">
									</figure>
									<h6>Erick Fox</h6>
									<span class="bq-author-info">Botanist</span>
								</div>
							</div>
						</div>
					</div>
					<!-- Testimonials / End -->

				</div>
			</section>
			<!-- Page Content / End -->
<?php
	include_once("template/footer.php");
?>

			
</html>