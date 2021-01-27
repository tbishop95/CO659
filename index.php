<?php
session_start();

if(isset($_POST['submit'])) 
{
	include('lib/connection.php');	
	$error="";

// Check all fields have been entered
	if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['year']) || empty($_POST['institute']) || empty($_POST['tutor']))
	{
		$error="Please complete all fields";
	}

	$name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
	$username=mysqli_escape_string($conn,filter_var(strip_tags($_POST['username']),FILTER_SANITIZE_STRIPPED));
	$password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));
	$email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
	$year=mysqli_escape_string($conn,filter_var(strip_tags($_POST['year']),FILTER_SANITIZE_STRIPPED));
	$institute=mysqli_escape_string($conn,filter_var(strip_tags($_POST['institute']),FILTER_SANITIZE_STRIPPED));
	$tutor=mysqli_escape_string($conn,filter_var(strip_tags($_POST['tutor']),FILTER_SANITIZE_STRIPPED));


	$hash_password = hash('sha256', $password);

	

// Check if username already exists
	$sql="SELECT * FROM users WHERE Username='$username'";
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0)
	{
		$error="Username already exists";
	}
// Check if email already exists
	$sql="SELECT * FROM users WHERE Email='$email'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$error.="&nbsp; Email Address already exists";
	}

	if(empty($error))
	{
		$sql="INSERT INTO users (Name, Email, Username, Password, Year, Institute, Tutor) VALUES('$name', '$email', '$username', '$hash_password', '$year', '$institute', '$tutor')";
		$result=mysqli_query($conn,$sql);

		if($result)
		{
			
			$_SESSION['name']=$name;
			$_SESSION['username']=$username;
			$_SESSION['email']=$email;
			$_SESSION['password']=$password;
			$_SESSION['year']=$year;
			$_SESSION['institute']=$institute;
			$_SESSION['tutor']=$tutor;
			header("Location:login.php");
		}
	}
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<title>KSB Portal Registration</title>
	<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px; }
    </style>
</head>
<body>
	<div class="wrapper">
		<div class="title">
			<img src="resources/images/logo.png">
		    <h1>Create Account</h1>
		</div>
		<form class="form" method ="post" action="index.php">
			<input type="text" name="name" placeholder="Name"/>
			<input type="text" name="username" placeholder="Username"/>
			<input type="email" name="email" placeholder="Email Address"/>
			<input type="password" name="password" placeholder="Password"/>
			<input type="text" name="year" placeholder="Year of Study"/>
			<input type="text" name="institute" placeholder="Institute"/>
			<input type="text" name="tutor" placeholder="Assigned Tutor"/>
			<button type="submit" name="submit" class="btn">Sign Up</button>
			<span><?php if(isset($error)) {echo $error;}?></span>
		</form>
		<a href="login.php"><button class="btn"type ="submit">Have an account? Sign In</button></a>
	</div>
</body>
</html>