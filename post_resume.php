<?php
	session_start();
	//print_r($_SESSION);die;
	$_SESSION['userName'] 	  = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
	$_SESSION['id'] 	 	  = isset($_SESSION['id']) ? $_SESSION['id'] : "";
	$_SESSION['firstname'] 	  = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
	$_SESSION['logo'] 		  = isset($_SESSION['logo']) ? $_SESSION['logo'] : "";
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


		//=======Counts=======/



	include('classes/adminCrud.php');

		if(isset($_POST['update']) && !empty($_FILES['fileupload'])){
         $_POST['fileupload'] = $_FILES['fileupload'];
		// echo"<pre>";
		// print_r($_POST);
		// echo"</pre>";die();
		$updateEmployerObj = new adminCrudClass();
		$recs = $updateEmployerObj->updateEmployer($_POST,$_SESSION['id']);

		}
		include('classes/employeeCrud.php');

		$empObj = new employeeCrudClass();
		
		$countAppliedJobs 	 = $empObj->countAppliedJobs($_SESSION['id']);
		$countBookmarkedJobs 	 = $empObj->countBookmarkedJobs($_SESSION['id']);
		$countAllJobs 	 = $empObj->countAllJobs();
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
				<div class="col-md-8">
				    	<form action="#">
										
										<h4>Personal Details</h4>
										<fieldset class="fieldset-job_title">
												<label for="job_title">Firstname</label>
												<div class="field">
													<input type="text" class="form-control" name="firstname" id="job_title" placeholder="e.g. “Idris”" />
												</div>
										</fieldset>
										<fieldset class="fieldset-job_title">
												<label for="job_title">Lastname</label>
												<div class="field">
													<input type="text" class="form-control" name="lastname" id="job_title" placeholder="e.g. “Adeleke”" />
												</div>
										</fieldset>
										<fieldset class="fieldset-job_title">
												<label for="job_title">Date of Birth</label>
												<div class="field">
														<select name="date" style="border-radius: 5px;width: 200px;line-height:  41.66666667%;;padding: 6px 12px;margin-left:90px;" >

												          <option value="date">Enter Day</option>
												          <script type="text/javascript">
												          var daterec= new Date();
												          var curDay=daterec.getDay();
												          //for(var a = 1; a<=12;)
												          for(var a = 1; a<=31; a++){
												            document.write("<option value='" + a +"'>" + a + "</option>" );
												          }
												          </script>

												      </select>

												       <select name="month"  style="border-radius: 5px;width: 200px;line-height: 41.66666667%;;padding: 6px 12px;">
												          <option value="month" >Enter Month</option>

												          <script type="text/javascript">
												          var daterec= new Date();
												          var curMonth=daterec.getMonth();
												          //for(var a = 1; a<=12;)
												          for(var a = 1; a<=12; a++){
												            document.write("<option value='" + a +"'>" + a + "</option>" );
												          }
												          </script>
												       </select>
												    
												     <select name="years" placeholder="year" style="border-radius: 5px;width:200px;line-height:  41.66666667%;;padding: 6px 12px;" >
												         <option value=""> Enter Year</option>
												         <script>
												         var daterecs = new Date();
												         var cur_year =  daterecs.getFullYear();
												         for(var i = 1900; i <= cur_year; i++){
												         
												         document.write("<option value='" + i +"'>" + i + "</option>" ); 
												         
												         }
												         
												         </script>
												    </select>
												</div>
										</fieldset>
										<fieldset class="fieldset-job_title">
												<label for="job_title">Address</label>
												<div class="field">
													<input type="text" class="form-control" name="job_title" id="job_title" placeholder="e.g. “121 King Street, Melbourne Victoria Island, Lagos”" />
												</div>
										</fieldset>

										<fieldset class="fieldset-job_title">
												<label for="job_title">State</label>
												<div class="field">
													<input type="text" class="form-control" name="job_title" id="job_title" placeholder="e.g. “Lagos”" />
												</div>
										</fieldset>

										<fieldset class="fieldset-job_title">
												<label for="job_title">Nationality</label>
												<div class="field">
													<input type="text" class="form-control" name="job_title" id="job_title" placeholder="e.g. “Nigerian”" />
												</div>
										</fieldset>

										<fieldset class="fieldset-job_title">
													<label for="company_logo">Photo </label>
														<div class="field">
															<input type="file" class="form-control" name="company_logo" onchange="preview_img(event)" />
															<small class="description">Max. file size: 50 MB. Allowed images: jpg, gif, png.</small>
															
																<img id="company_logo" width="100px" height="100px" />
														</div>
												

												<div class="section career-objective">
													<h4>Career Objective</h4>
													<div class="form-group">
														<textarea class="form-control" placeholder="Write few lines about your career objective" rows="8"></textarea>
														<span>5000 characters left</span>		
													</div>
													
										
													<h4>Work History</h4>
													<div class="row form-group">
														<label class="col-sm-3 label-title">Company Name</label>
														<div class="col-sm-9">
															<input type="text" name="name" class="form-control" placeholder="Name">
														</div>
													</div>
													<div class="row form-group">
														<label class="col-sm-3 label-title">Designation</label>
														<div class="col-sm-9">
															<input type="text" name="name" class="form-control" placeholder="Human Resource Manager">
														</div>
													</div>
													<div class="row form-group time-period">
														<label class="col-sm-3 label-title">Time Period</label>
														<div class="col-sm-9">
															<input type="text" name="name" class="form-control" placeholder="dd/mm/yy"><span>-</span>
															<input type="text" name="name" class="form-control pull-right" placeholder="dd/mm/yy">
														</div>
													</div>
													<div class="row form-group job-description">
														<label class="col-sm-3 label-title">Job Description</label>
														<div class="col-sm-9">
															<textarea class="form-control" placeholder="" rows="8"></textarea>		
														</div>
													</div>
											
											
												<h4>Education Background</h4>
												<div class="row form-group">
													<label class="col-sm-3 label-title">Institute Name</label>
													<div class="col-sm-9">
														<input type="text" name="institution1" class="form-control" placeholder="ropbox">
													</div>
												</div>
												<div class="row form-group">
													<label class="col-sm-3 label-title">Degree</label>
													<div class="col-sm-9">
														<input type="text" name="degree1" class="form-control" placeholder="Human Resource Manager">
													</div>
												</div>
												<div class="row form-group time-period">
													<label class="col-sm-3 label-title">Time Period</label>
													<div class="col-sm-9">
														<input type="text" name="admittedat1" class="form-control" placeholder="dd/mm/yy"><span>-</span>
														<input type="text" name="graduateat1" class="form-control pull-right" placeholder="dd/mm/yy">
													</div>
												</div>
												<div class="row form-group job-description">
													<label class="col-sm-3 label-title">Description</label>
													<div class="col-sm-9">
														<textarea class="form-control" placeholder="" rows="8"></textarea>		
													</div>
												</div>
												<h4>Language Proficiency:</h4>
												<div class="row form-group">
													<label class="col-sm-3 label-title">Language Name</label>
													<div class="col-sm-9">
														<input type="text" name="language1" class="form-control" placeholder="English">
													</div>
												</div>
												<div class="row form-group rating">
													<label class="col-sm-3 label-title">Rating</label>
													<div class="col-sm-9">
														<div class="rating-star">
														    <div class="rating">
														        <input type="radio" id="star1" name="rating1"><label class="full" for="star1"></label>

														        <input type="radio" id="star2" name="rating1"><label class="half" for="star2"></label>

														        <input type="radio" id="star3" name="rating1"><label class="full" for="star3"></label>

														        <input type="radio" id="star4" name="rating1"><label class="half" for="star4"></label>

														        <input type="radio" id="star5" name="rating1"><label class="full" for="star5"></label>
				        
														</div><!-- rating-star -->
													</div>
												</div>
											</div><!-- Educational Background -->

											<div class="row form-group"><!-- Educational Background 2 -->
													<label class="col-sm-3 label-title">Institute Name</label>
													<div class="col-sm-9">
														<input type="text" name="institution2" class="form-control" placeholder="ropbox">
													</div>
												</div>
												<div class="row form-group">
													<label class="col-sm-3 label-title">Degree</label>
													<div class="col-sm-9">
														<input type="text" name="degree2" class="form-control" placeholder="Human Resource Manager">
													</div>
												</div>
												<div class="row form-group time-period">
													<label class="col-sm-3 label-title">Time Period</label>
													<div class="col-sm-9">
														<input type="text" name="admittedat2" class="form-control" placeholder="dd/mm/yy"><span>-</span>
														<input type="text" name="graduateat2" class="form-control pull-right" placeholder="dd/mm/yy">
													</div>
												</div>
												<div class="row form-group job-description">
													<label class="col-sm-3 label-title">Description</label>
													<div class="col-sm-9">
														<textarea class="form-control" placeholder="" rows="8"></textarea>		
													</div>
												</div>
												<h4>Language Proficiency:</h4>
												<div class="row form-group">
													<label class="col-sm-3 label-title">Language Name</label>
													<div class="col-sm-9">
														<input type="text" name="language2" class="form-control" placeholder="English">
													</div>
												</div>
												<div class="row form-group rating">
													<label class="col-sm-3 label-title">Rating</label>
													<div class="col-sm-9">
														<div class="rating-star">
														    <div class="rating">
														        <input type="radio" id="star1" name="rating2"><label class="full" for="star1"></label>

														        <input type="radio" id="star2" name="rating2"><label class="half" for="star2"></label>

														        <input type="radio" id="star3" name="rating2"><label class="full" for="star3"></label>

														        <input type="radio" id="star4" name="rating2"><label class="half" for="star4"></label>

														        <input type="radio" id="star5" name="rating2"><label class="full" for="star5"></label>
				        
														</div><!-- rating-star -->
													</div>
												</div>
											</div><!-- Educational Background -->
										</div>
										<h4>Declaration</h4>
										<div class="form-group item-description">
											<textarea class="form-control" placeholder="" rows="8" name="declaration"></textarea>
										</div>
									</fieldset>

									<div class="buttons">
										<input type="submit" value="Create Resume" href="#" class="btn">Create Resume</a>
										<a href="#" class="btn cancle">Cancel</a>
									</div>	
						</form>	
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