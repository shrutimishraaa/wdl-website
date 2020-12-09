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
	<?php include'links.php' ?>
	</head>
<body>


<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
	$username =  $_POST['username'];
	$password = $_POST['password'];
	
$username_search = "select * from registration where username='$username' ";
$query = mysqli_query($con,$username_search);

$username_count = mysqli_num_rows($query);

if($username_count){
	
	$username_pass = mysqli_fetch_assoc($query);
	
	$db_pass = $username_pass['password'];
	
	$pass_decode = password_verify($password, $db_pass);
	
	
	if($pass_decode){
		
		?>
	<script>
	    alert("login sucessful");
	</script>
	
	<script>
	    location.replace("index 11.php");
	</script>

	<?php
		
	}else{
		?>
		<script>
	    alert("Incorrect password");
	</script>
	<?php
	
	}
}else{
	?>
	<script>
	    alert("invalid username");
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
<p class="bg-success text-white px-4"> <?php echo $_SESSION['msg']; ?> </P>
</div>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-user"></i></span>
	</div>
	<input name="username" class="form-control" placeholder="Full name" type="text" required>
	</div><!--form-group//-->
	
	<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
	</div>
	<input name="password" class="form-control" placeholder="Create Password" type="password" value="" required>
	</div><!--form-group//-->
	
	<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary btn-block">Login Now</button>
	</div><!--form-group//-->
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