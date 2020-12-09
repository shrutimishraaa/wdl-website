<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "emailphpnew";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
	?>
	<script>
	    alert("connection Sucessful");
	</script>
	<?php
}else{
	
	?>
	
	<script>
	    alert(" No connection");
	</script>
	<?php
}

	
?>
		