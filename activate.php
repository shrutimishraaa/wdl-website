<?php
session_start();

include 'dbcon1.php';

if(isset($_GET['token'])){
	$token = $_GET['token'];
	
	$updatequery = "update registrationnew set status='active' where token='$token' ";
	
	$query = mysqli_query($con,$updatequery);
	
	if($query){
		if(isset($_SESSION['msg'])){
			$_SESSION['msg'] = "Account updated succesfully";
			header('location:login.php');
		}else{
			$_SESSION['msg'] = "you are logged out";
			header('location:login.php');
}
	}else{
		$_SESSION['msg'] = "Account not updated";
			header('location:loginsaloni.php');
	}
}
		
?>




