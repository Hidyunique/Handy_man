<?php
	session_start();
	//print_r($_SESSION);die;
	$_SESSION['userName'] = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
	$_SESSION['id'] 	  = isset($_SESSION['id']) ? $_SESSION['id'] : "";
//echo $_GET['userName']; die();
	if($_SESSION['userName'] == ""){
		echo "You are not authorize to view this page, Redirecting to Login Page";
		header("refresh:5; url= page-login.php"); die;
	}

	// if($_POST['submit_job']){

	// 	print_r($_POST);die;
	// }

	include('classes/adminCrud.php');
	include('classes/employeeCrud.php');

	 $jobId = (isset($_GET['id'])!= "")? $_GET['id'] : "";
//echo $jobId;die;

	if($jobId != ""){
				$empObj = new employeeCrudClass();
				//echo"sssssssss";die;
		$empObj->bookmarkJobs($jobId,$_SESSION['id']);
	}
	
?>