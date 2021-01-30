<?php

session_start();

include('lib/connection.php');

$username=$_SESSION['username'];


$sql="DELETE FROM users WHERE Username='$username'";

$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Delete Account</title>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css"/>
	<style type="text/css">
		body{ text-align: center; }
	</style>
</head>
<body>
	<div class="verification">
		<?php if($result){
			
			echo "Your account has been deleted successfully";
			
		}  ?>
	</div>

	<a href="index.php"><button class="btn"type ="submit">Don't have an account? Sign Up</button></a>
</body>
</html>