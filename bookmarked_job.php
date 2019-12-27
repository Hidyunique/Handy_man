<?php
	session_start();
	//print_r($_SESSION);die;
	$_SESSION['userName'] 	  = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
	$_SESSION['id'] 	 	  = isset($_SESSION['id']) ? $_SESSION['id'] : "";
	$_SESSION['status'] 	  = isset($_SESSION['status']) ? $_SESSION['status'] : "";

//echo $_GET['userName']; die();
	if($_SESSION['userName'] == ""){
		echo "You are not authorize to view this page, Redirecting to Login Page";
		header("refresh:5; url= page-login.php"); die;
	}
	// $cookie_name = 'admin';
	// $cookies_value = $_SESSION['userName'];
	// setcookie($cookie_name, $cookies_value, time() + (120));//1mins

	// if(isset($_POST['update'])){
	// print_r($_SESSION['id']);
	// print_r($_SESSION['status']);die;
	// }

	include('classes/adminCrud.php');
	include('classes/employeeCrud.php');

	$empObj = new employeeCrudClass();
	$recs 	= $empObj->readBookmarkedJobs($_SESSION['id'],$_SESSION['userName']);

	//print_r($recs);die;

?>


<!DOCTYPE html>

<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Handyman - <?=$_SESSION['userName']?>-Employee Portal</title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	
	
	<!-- CSS
	================================================== -->
	<!-- Base + Vendors CSS -->
	<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
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

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



	
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
			<!--<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>ADMIN</h1>
						</div>
					</div>
				</div>
			</section>-->
						<!-- Page Content / Start -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


        <!--===================
        Header
        =======================-->
        <header class="header font-inline">
          <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 "  style="background: #3b363a">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand p-0 mr-5" href="#"><img src="http://via.placeholder.com/61x14"></a>
            <div class="float-left"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
					<div class="float-left"> 
							<h2 lass="button-left">>ADMIN</h2>
					</div>
					 -->
					<!--<div style="margin-left: 100px; color:#fff; font-weight: bolder;"> ADMIN</div>-->
            <div class="collapse navbar-collapse flex-row-reverse"  id="navbarNavDropdown">
              <ul class="navbar-nav" style="float: right;">
                <li class="nav-item dropdown messages-menu">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-success bg-success">10</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <ul class="dropdown-menu-over list-unstyled">
                      <li class="header-ul text-center">You have 4 messages</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu list-unstyled">
                          <li><!-- start message -->
                          <a href="#">
                            <div class="pull-left">
                              <img src="http://via.placeholder.com/160x160" class="rounded-circle  " alt="User Image">
                            </div>
                            <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                        <!-- end message -->
                        <li>
                          <a href="#">
                            <div class="pull-left">
                              <img src="http://via.placeholder.com/160x160" class="rounded-circle " alt="User Image">
                            </div>
                            <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <div class="pull-left">
                              <img src="http://via.placeholder.com/160x160" class="rounded-circle " alt="User Image">
                            </div>
                            <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <div class="pull-left">
                              <img src="http://via.placeholder.com/160x160" class="rounded-circle " alt="User Image">
                            </div>
                            <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <div class="pull-left">
                              <img src="http://via.placeholder.com/160x160" class="rounded-circle " alt="User Image">
                            </div>
                            <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="footer-ul text-center"><a href="#">See All Messages</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item dropdown notifications-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-warning bg-warning">10</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <ul class="dropdown-menu-over list-unstyled">
                    <li class="header-ul text-center">You have 10 notifications</li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu list-unstyled">
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                            page and may cause design problems
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-red"></i> 5 new members joined
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-user text-red"></i> You changed your username
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="footer-ul text-center"><a href="#">View all</a></li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item dropdown  user-menu">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="http://via.placeholder.com/160x160" class="user-image" alt="User Image" >
                  <span class="hidden-xs"><?=$_SESSION['userName']?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="container-fluid" style="font-size: 15px;"> 
	      <div class="main"  style="float: left; display: inline;">
		    <?php 

		        			 include_once('template/employee_sidebar.php'); 

		        	
		        ?>

	    </div>

	    	<div class="row">
					<div id="job-manager-job-dashboard" class="col-md-12">
						<h2>Bookmarked Jobs</h2>
						<div>
							<div class="table-responsive">
							<table class="job-manager-jobs table table-bordered table-striped">
								<thead>
									<tr>
										<th class="job_title">#</th>
										<th class="date">Employee ID</th>
										<th class="expires">Job ID</th>
										
									</tr>
								</thead>
								<tbody>
									<?php 
									 //    echo"data<pre>";
										// print_r($recs);
										// echo"</pre>";
										 foreach($recs as $row){

											echo "<tr>
													<td class='job_title'>
														<a href='#' class='job_title_link'>{$row['id']}</a>
														<ul class='job-dashboard-actions'>
															<li><a href='view_job.php?id={$row['id']}' class='job-dashboard-action-edit'>View</a></li>
											<li><a onclick=\"deleteConfirm({$row['id']})\" href='#' >Delete</a></li>
														</ul>
													</td>
													<td class='date'>{$row['employee_id']}</</td>
													
													<td class='expires'>{$row['job_id']}</td>
													";

											}

									?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
			</div>

	  </div>
    <div style="margin-top: 30px"></div>

						<!-- Page Content / End -->
	<script src="js/sandbox.js" type="text/javascript">
			
	</script>
<?php
	include_once("template/footer.php");
?>
</html>