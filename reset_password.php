<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>

<?php include'links.php' ?>
	</head>
<body>

<?php

include 'dbcon1.php';

if(isset($_POST['submit'])){
	
	if(isset($_POST['submit'])){
		
		if(isset($_GET['token'])){
			
			$token =$_GET['token'];

		
	
	$newpassword = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	
$pass = password_hash($newpassword, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);



  if($newpassword === $cpassword){
	  
	  
	  $updatequery = "update registrationnew set password='$pass' where token='$token' ";
	  
	  $iquery = mysqli_query($con, $updatequery);
	  
	  if($iquery){

        $_SESSION['msg'] = "your password has been updated";
        header('location:login.php');		

}else{
	$_SESSION['passmsg'] = "your password is not updated";
	header('location:reset_password.php');
	}


	  
  } else{
	  $_SESSION['passmsg'] = "your password is not matching";

}

}else{
	echo "No token found";
}
	}
}
?>

<div class="bg-light" style="height:500px;">
<article class="card-body mx-auto" style="max-width:400px;">
<h4 class="card-title mt-3 text-center" style="margin-top:70px;">Create Account</h4>
<p class="text-center">Get started with your account</p>
<p> <?php 

if(isset($_SESSION['passmsg'])){
echo $_SESSION['passmsg'];
}else{
echo $_SESSION['passmsg'] = "";
}	
echo $_SESSION['passmsg']; ?> </p>

<form action="" method="POST">

<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
	</div>
	<input name="password" class="form-control" placeholder="New Password" type="password" value="" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
	</div>
	<input name="cpassword" class="form-control" placeholder="Confirm Password" type="password" required>
	</div><!--form-group//-->
	
	<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary btn-block">Click here</button>
	</div><!--form-group//-->
	<p class="text-center">Have an account? <a href="login.php">Log IN</a></p>
</form>
</article>
</div>

<!----------------FOOTER----------->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-1">
				<h3>Address:-</h3>
					<p>Hashu Advani Memorial Complex,<br>
					Collector's Colony<br>
                    Chembur, Mumbai, Maharashtra 400074</p>	   
					</div>
			<div class="footer-col-2">
				<h3>Useful Links</h3>
					<a href="">Coupons</a>
					<a href="">Blog Post</a>
					<a href="">Return Policy</a>
					<a href="">Join Affiliate</a>
            </div>
			<div class="footer-col-3">
				<h3>Useful Links</h3>
					<a href="">Coupons</a>
					<a href="">Blog Post</a>
					<a href="">Return Policy</a>
					<a href="">Join Affiliate</a>
			</div>
			<div class="footer-col-4">
				<h3>Follow us</h3>
				<a href="">facebook</a>
					<a href="">twitter</a>
					<a href="">instagram</a>
					<a href="">mail</a>
			</div>
		</div>
		<hr>
		<p class="copyright">Copyright 2020 - VESIT</p>
	</div>
</div>


</body>
</html>