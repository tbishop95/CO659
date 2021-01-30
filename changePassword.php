
<?php
session_start();
$error="";
if(isset($_POST['submit']))
{
	include('lib/connection.php');

	if($_POST['newpassword']==$_POST['confirmpassword'])
	{

		$username=$_SESSION['username'];

		$confirmpassword=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirmpassword']),FILTER_SANITIZE_STRIPPED));


		$hash_password = hash('sha256', $confirmpassword);

		$sql="UPDATE users SET Password='$hash_password' WHERE Username='$username'";

		$result=mysqli_query($conn,$sql);


	}
	else{
		$error = "Password's do not match";
	}
}
?>
<?php

include('lib/connection.php');

$username=$_SESSION['username'];

$sql="SELECT * FROM users WHERE Username='$username'";

$result=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($result);

if($rows>0)
{
	$array=mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="resources/css/mainStyle.css">
	<title>KSB Portal - Change Password</title>
	<style type="text/css">
		.verification{ color: green; margin:; 1rem; }
	</style>
</head>
<body>
	<div class="sideNav">
		<div class="navHeader">
			<img src="resources/images/logo.png">
			<h5>KSB Portal</h5>
		</div>
		<div class="user">
			<h4>Welcome <?php echo $array['Name']; ?></h6>
				<h6 class="year">Year of Study : <?php echo $array['Name']; ?></h5>
				</div>
				<div class="nav">
					<h4>Menu</h4>
					<a href="home.php">Home</a>
					<a href="ksb.php">My KSB's</a>
					<a href="journal.php">Journal</a>
					<a href="profile.php">Profile Settings</a>
				</div>
				<a href="logout.php"><button class="btn"type ="submit">Logout</button></a>
			</div>
			<?php if(isset($result))
			{
				echo '<div class="verification">Your Password has been changed successfully</div>';
				die();
			}
			?>

			<div class="profile">
				<div class="title">
					<h1>Edit Password</h1>
					<span class=breakLine></span>
				</div>
				<form class="form" method="post" action="">
					<div class="readOnly">
						<span class="fieldName">New Password</span>
						<input type="password" name="newpassword" placeholder="New Password"/>
						<span class="fieldName">Confirm New Password</span>
						<input type="password" name="confirmpassword" placeholder="Confirm Password"/>
						<a href="changepassword.php"><button type="submit" class="btn" name="submit">Change Password</button></a><br><br><br><br>
						<span style="color:black;"><?php if(isset($error)){echo $error;}?></span>
					</form>
				</div>
			</body>
			</html>