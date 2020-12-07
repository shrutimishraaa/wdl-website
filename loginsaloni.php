<!DOCTYPE php>
<php lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Login-vesit</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
	   <li><a href="COURSES.php">COURSES</a></li>
	   <li><a href="FACULTY.php">FACULTY</a></li>
	   <li><a href="DEPARTMENTsaloni.php">Departments</a></li>
       <li><a href="GALLERY.php">GALLERY</a></li>
	   <li><a href="REGISTRATION.php">REGISTRATION</a></li>
	   <li><a href="CONTACT US.php">CONTACT US</a></li>
	<button type="button" class="button_1"><a href="#">LOGIN</a></button>
	</ul>
</nav>
</div>
<!----------------account----------->
<div class="account-page">
 <div class="container">
  <div class="row">
     <div class="col-2" style="margin-right:190px;">
	  <img src="images/vesit1.jpg">
	 </div>
  <div class="col-2">
	  <div class="form-container1">
	  <div class="form-btn1">
	       <span onclick="login()">Login</span>
	       <span onclick="register()">Register</span>
		   <hr id="Indicator">
	  </div>
	  <form id="Loginform" option="#" method="post" action="connect.php" onsubmit=return "validation()">
	  <div class="form-control_1">
	  <label><i class="fa fa-user"></i>username</label>
	         <input type="text" id="username" name="username" placeholder="enter Username" required="">
			 <span id="message">
			 <i class="fa fa-check-circle"></i>
             <i class="fa fa-exclamation-circle"></i></span>
			 </div>
      <div class="form-control_1">
	  <label><i class="fa fa-key"></i>password</label><br>
	         <input type="password" name="password" id="password" placeholder="enter password" required="">
			 <span id="msg"><i class="fa fa-eye"></i>
			 <i class="fa fa-eye-slash"></i>
             <i class="fa fa-check-circle"></i>
             <i class="fa fa-exclamation-circle"></i></span>
			 </div>
			 <button type="Submit" name="submit" class="btn1" value="Submit">Login</button>
			 <a href="updateform.php">Forget password</a>
		 </form>
	  <form id="Regform">
	       <div class="form-control_1">
	  <label><i class="fa fa-user"></i>firstname</label>
	         <input type="text" id="firstname" placeholder="enter firstname" required="">
			 <i class="fa fa-check-circle"></i>
             <i class="fa fa-exclamation-circle"></i>
			 </div>
		    <div class="form-control_1">
	  <label><i class="fa fa-user"></i>lastname</label>
	         <input type="text" id="lastname" placeholder="enter lastname" required="">
			 <i class="fa fa-check-circle"></i>
             <i class="fa fa-exclamation-circle"></i>
			 </div>
			  <div class="form-control_1">
	  <label><i class="fa fa-envelope"></i>E-mail</label>
	         <input type="email" id="email" placeholder="enter email" required="">
			 <i class="fa fa-check-circle"></i>
             <i class="fa fa-exclamation-circle"></i>
			 </div>
			 <button type="submit" id="submit" class="btn1">Register</button>
		 </form>
	 
     </div>
	 </div> 
   </div>
 </div>
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


<!----------------js for togglemenu------------>

<!----------------js for account------------>

   <script> 
     var Loginform = document.getElementById("Loginform");
	 var Regform = document.getElementById("Regform");
	 var Indicator = document.getElementById("Indicator");
	  
	        function register(){
			      Regform.style.transform = "translateX(0px)";
				  Loginform.style.transform = "translateX(0px)";
				  Indicator.style.transform = "translateX(100px)";
		    }
			
			function login(){
			      Regform.style.transform = "translateX(300px)";
				  Loginform.style.transform = "translateX(300px)";
				 Indicator.style.transform = "translateX(0px)";
		    }
    
     </script>
<script>
   function validation(){
   var user = document.getElementById('username').value;
   if{
     (user == "")
	  document.getElementById('messages').innerphp = " * this field is required ";
	  return false;
	 }
	 }


</script>
 </body>


