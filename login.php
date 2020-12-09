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
	<?php include'links.php' ?>
	</head>
<body>
<header>
<div class="container">
<div class="abc">
<img src="images/logo.png" width="80px"  height="103"  alt="Institute of Technology Logo">
</div>
                  <h1 class="head">VIVEKANAND EDUCATION SOCIETY</br>
			      <em>Institute of Technology</em></h1>
				  </div>
</header>
   <div class="container">
	<nav>
     <ul>
	   <li><a href="ABOUT US.php">ABOUT US</a></li>
	   <li><a href="FACULTY.php">FACULTY</a></li>
	   <li><a href="DEPARTMENTsaloni.php">Departments</a></li>
       <li><a href="GALLERY.php">GALLERY</a></li>
	   <li><a href="CONTACT US.php">CONTACT US</a></li>
	<button type="button" class="button_1"><a href="#">LOGIN</a></button>
	</ul>
</nav>
</div>

<?php
include 'dbcon1.php';  

if(isset($_POST['submit'])){
	$email=  $_POST['email'];
	$password = $_POST['password'];
	
$email_search = "select * from registrationnew where email='$email' and status='active' ";
$query = mysqli_query($con,$email_search);

$email_count = mysqli_num_rows($query);

if($email_count){
	
	$email_pass = mysqli_fetch_assoc($query);
	
	$db_pass = $email_pass['password'];
	
	$_SESSION['username'] = $email_pass['username'];
	
	$pass_decode = password_verify($password, $db_pass);
	
	
	if($pass_decode){
		echo "login successfull";
		?>
	<script>
	    location.replace("index 11.php");
	</script>
    <?php
}else{
		echo "incorrect password";
	}
}else{
		?>
	<script>
	    alert("invalid email");
	</script>
	<?php
	
	}
}	

?>
	
<div class="bg-light" style="height:500px;">
<article class="card-body mx-auto" style="max-width:400px;">
<h4 class="card-title mt-3 text-center" style="margin-top:70px;">Create Account</h4>
<p class="text-center">Get started with your account</p>
<div>
<p class="bg-success text-white px-4"><?php

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}else{
	echo $_SESSION['msg'] = "you are logged out. please login again";
	}
	
 ?></p>
</div>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-user"></i></span>
	</div>
	<input name="email" class="form-control" placeholder="Enter email" type="email" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
	</div>
	<input name="password" class="form-control" placeholder="Enter Password" type="password" value="" required>
	</div><!--form-group//-->
	
	<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary btn-block">Login Now</button>
	</div><!--form-group//-->
	<p class="text-center">Forget password? <a href="recover_email.php">Click here</a></p>
	<p class="text-center"> Not Have an account? <a href="loginsaloni.php">Sign up here</a></p>
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