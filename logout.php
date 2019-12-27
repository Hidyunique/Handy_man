<?php
session_start();
$id = isset($_GET['id']) ? trim($_GET['id']) : "";
//echo "1.$id sdvjnd,xznvcm";
if($id != ""){
	//echo "sdvjnd,xznvcm";
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	session_destroy();
	echo "You have successfully Logout, Redirecting to Homepage";
	header("refresh:5; url= index.php"); die();
}
?>