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
	$username= mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	
$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$token = bin2hex(random_bytes(15));

$emailquery = "select * from registrationnew where email='$email' ";
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
	  
	  $insertquery = "insert into registrationnew( username, email, mobile, password, cpassword, token, status) values('$username','$email','$mobile','$pass','$cpass','$token','inactive' )";
	  
	  $iquery = mysqli_query($con, $insertquery);
	  
	  if($iquery){

            $subject = "Email Activation";
            $body = "Hi, Click here to activate your account 
			 http://localhost/management/web/activate.php?token=$token";
             $header = "From: shivanikulkarni509@gmail.com";

          if (mail($email, $subject, $body, $header)) {
           $_SESSION['msg'] = "check your mail to activate your account $email";
		   header('location:login.php');
              } else {
               echo "Email sending failed...";
}

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