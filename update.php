<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "login1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE users1 SET password='saloni123' WHERE id='5'";
if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


<!doctype html>
<html>
<head>
<title>update data</title>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	</head>
	<body>
	<form action="update.php" method="post">
	ID to update: <input type="text" name="id" value="id"><br><br>
	new username: <input type="text" name="newuser" value="newuser"><br><br>
	New password: <input type="text" name="newpass" value="newpass"><br><br>
	<input type="submit" name="update" value="update data">
	</form>
	</body>
	</html>
