<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<header>
<div class="abc">
<img src="images/logo.png" width="80px"  height="103" style="float:left;" alt="Institute of Technology Logo">
</div>
                  <h1 class="head">VIVEKANAND EDUCATION SOCIETY</br>
			      <em>Institute of Technology</em></h1>
		
</header>
	<nav>
     <ul>
	   <li><a href="ABOUT US.php">ABOUT US</a></li>
	   <li><a href="FACULTY.php">FACULTY</a></li>
	   <li><a href="DEPARTMENTsaloni.php">Departments</a></li>
       <li><a href="GALLERY.php">GALLERY</a></li>
	   <li><a href="index.php">Attendance</a></li>
	   <li><a href="CONTACT US.php">CONTACT US</a></li>
	<button type="button" class="button_1"><a href="#">LOGIN</a></button>
	</ul>
</nav>

<?php include'links.php' ?>
	</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
	$username= mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	
$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$emailquery = "select * from registration where email='$email' ";
$query = mysqli_query($con,$emailquery);

$emailcount = mysqli_num_rows($query);

if($emailcount>0){
	
	?>
	<script>
	    alert("email already exist");
	</script>
	<?php

}else{
  if($password === $cpassword){
	  
	  $insertquery = "insert into registration( username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";
	  
	  $iquery = mysqli_query($con, $insertquery);
	  
	  if($iquery){
	?>
	<script>
	    alert("Inserted Sucessfully");
	</script>
	<?php
}else{
	?>
	<script>
	    alert(" Not inserted");
	</script>
	<?php
}


	  
  }else{
	  
	  ?>
	<script>
	    alert("password are not matching");
	</script>
	<?php

     }   
}

}
?>

<div class="bg-light" style="height:500px;">
<article class="card-body mx-auto" style="max-width:400px;">
<h4 class="card-title mt-3 text-center" style="margin-top:70px;">Create Account</h4>
<p class="text-center">Get started with your account</p>
<form action="" method="POST">
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-user"></i></span>
	</div>
	<input name="username" class="form-control" placeholder="Full name" type="text" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-envelope"></i></span>
	</div>
	<input name="email" class="form-control" placeholder="Email adress "type="email" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-phone"></i></span>
	</div>
	<input name="mobile" class="form-control" placeholder="phone number" type="number" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
	</div>
	<input name="password" class="form-control" placeholder="Create Password" type="password" value="" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
	</div>
	<input name="cpassword" class="form-control" placeholder="Repeat Password" type="password" required>
	</div><!--form-group//-->
	
	<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
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