<?php
session_start();
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

<!DOCTYPE HTML>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="resources/css/mainStyle.css">
	<title>KSB Portal Profile</title>
	<style type="text/css">
		body{ font: 14px sans-serif; }
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
				<h6 class="year">Year of Study : <?php echo $array['Year']; ?></h5>

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
			<div class="profile">
				<div class="title">
					<h1>Profile Settings</h1>
					<span class=breakLine></span>
				</div>
				<form class="form" method ="post" action="">
					<div class="readOnly">
						<span class="fieldName">Name</span>
						<input type="text" value="<?php echo $array['Name']?>" readonly="">
						<span class="fieldName">Email</span>
						<input type="email" value="<?php echo $array['Email']?>" readonly="">
						<span class="fieldName">Year of Study</span>
						<input type="text" value="<?php echo $array['Year']?>" readonly="">
						<span class="fieldName">Institute</span>
						<input type="text" value="<?php echo $array['Institute']?>" readonly="">
						<span class="fieldName">Assigned Tutor</span>
						<input type="text" value="<?php echo $array['Tutor']?>" readonly="">
					</div>
				</form>
				<a href="changePassword.php"><button class="btn"type ="submit">Change Password</button></a>
				<a href="deleteAccount.php"><button class="btn"type ="submit">Delete Account</button></a>
			</div>
		</body>

		</html>

