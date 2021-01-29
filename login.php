<?php
<<<<<<< Updated upstream
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
=======
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

$sql="SELECT * FROM users WHERE username='$username' AND password='$hash_password'";

$result=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($result);

// Remember Username & Password

if($rows>0)
{
	$_SESSION['username']=$username;
	if(isset($_POST['rememberMe']))
	{
		header("Location:profile.php");

		setcookie("username", $_POST['username'], time() + (365*60*24*24));

		setcookie("password", $_POST['password'], time() + (365*60*24*24));
	}
	else {
		header("Location:profile.php");

		setcookie("username", "");
		setcookie("password", "");

	}

}
else {
	$error = "Your Username or Password is incorrect";
}
}
>>>>>>> Stashed changes
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<<<<<<< Updated upstream
    <div class="wrapper">
        <div class="title">
            <img src="resources/images/logo.png">
        <h2>Login</h2>
      </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="username" placeholder="example@bucks.ac.uk" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" placeholder="***********" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group submit">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
        </form>
    </div>    
=======
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
		<span><?php if(isset($error)) {echo $error;}?></span>
		<span><?php if(isset($success)) {echo $success;}?></span>
	<a href="index.php"><button class="btn"type ="submit">Don't have an account? Sign Up</button></a>
</div>
>>>>>>> Stashed changes
</body>
</html>







