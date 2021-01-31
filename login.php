<?php
if(isset($_POST['submit']))
{
	session_start();
	include('lib/connection.php');

	$error="";

	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$error="Please enter both your Username & Password";
	}
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username=mysqli_escape_string($conn,filter_var(strip_tags($username),FILTER_SANITIZE_STRIPPED));
		$password=mysqli_escape_string($conn,filter_var(strip_tags($password),FILTER_SANITIZE_STRIPPED));

		$hash_password = hash('sha256', $password);

		$sql="SELECT * FROM users WHERE Username='$username' AND Password='$hash_password'";

		$result=mysqli_query($conn,$sql);

		$rows=mysqli_num_rows($result);

// Set cookies for Username & Password - 30 days

		if($rows>0)
		{
			$_SESSION['username']=$username;
			if(isset($_POST['rememberMe']))
			{
				header("Location:home.php");

				setcookie("username", $_POST['username'], time() + (86400 * 30));

				setcookie("password", $_POST['password'], time() + (86400 * 30));
			}
			else {
				header("Location:home.php");

				setcookie("username", "");
				setcookie("password", "");

			}

		}
		else {
			$error = "Your Username or Password is incorrect";
		}
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<title>KSB Portal Login</title>
	<style type="text/css">
		body{ font: 14px sans-serif; }
		.wrapper{ width: 450px; padding: 20px; }
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="title">
			<img src="resources/images/logo.png">
			<h1>Login</h1>
		</div>
		<form class="form" method ="post" action="login.php">
			<input type="text" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];}?>" name="username" placeholder="Username"/>
			<input type="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>" name="password" placeholder="Password"/>
			<input type="checkbox" name="rememberMe">
			<span class="checkboxTxt">Remember Me</span>
			<button type="submit" name="submit" class="btn">Sign In</button>
			<a class="forgot" href="forgotPassword.php">Forgot My Password</a>
		</form>
		<span style="color: red"><?php if(isset($error)) {echo $error;}?></span>
		<span><?php if(isset($success)) {echo $success;}?></span>
		<a href="index.php"><button class="btn"type ="submit">Don't have an account? Sign Up</button></a>
	</div>
</body>
</html>
