<?php
	session_start();
	//print_r($_SESSION);die;
	$_SESSION['userName'] = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
	$_SESSION['id'] 	  = isset($_SESSION['id']) 		 ? $_SESSION['id'] 		 : "";
	$_SESSION['userType'] = isset($_SESSION['userType']) ? $_SESSION['userType'] : "";

//echo $_GET['userName']; die();
	if($_SESSION['userName'] == "" && $_SESSION['userType'] != 1){
		echo "You are not authorize to view this page, Redirecting to Login Page";
		header("refresh:5; url= page-login.php"); die;
	}

	// if($_POST['submit_job']){

	// 	print_r($_POST);die;
	// }

	include('classes/adminCrud.php');

	 $jobId = (isset($_GET['id'])!= "")? $_GET['id'] : "";
	 //$userType = (isset($_GET['userType'])!= "")? $_GET['userType'] : "";
//print_r($_SESSION['userType']);die;
	 if($jobId != "" && $_SESSION['userType'] != 0){

	 $approveObj = new adminCrudClass();
	 $recs = $approveObj->approveJobs($jobId);

	}

	else{

		echo "You are not authorise to perferm this task, contact the super admin";
		header("refresh:3; url=job_post_review.php");
	}

?>