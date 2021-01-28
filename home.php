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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body
      {  font: 14px sans-serif;
        text-align: center;
         background-color: #eeebe5;
         display: flex;
         flex-direction: flex;
       }

              /*Side Nav*/
      .sideNav {
    width: 15%;
    background-color: #000000;
    color: #fff;
    display: flex;
    flex-direction: column;
}

.navHeader {
    display: flex;
    flex-direction: row;
}

.navHeader img {
    width: 30px;
    height: 25px;
    margin: 1rem;
}

.user {
    background-color: #202020;
    width: 100%;
    text-align: center;
}

.nav {
    display: flex;
    margin-left: 1rem;
    flex-direction: column;
}

.nav h4 {
    color: #878787;
    border-bottom: 1px solid #878787;
    width: 100%;
}

.nav a {
    text-decoration: none;
    color: #fff;
    margin: 0.5rem;
    font-size: 1.5rem;
    text-align: left;
}


.sideNav .btn {
    width: 150px;
}

.btn {
    width: 200px;
    padding: 1rem;
    background-color: #FFC200;
    border: none;
    border-radius: 25px;
    font-family: 1rem;
    margin: 1rem;
    color: #fff;
}

.btn:hover {
    background-color: #DDAD17;
}

.pageHeader {
    width: 85%;
    margin-top: 2rem;
    text-align: center;
}
</style>
</head>
<body>
    <div class="sideNav">
        <div class="navHeader">
            <img src="resources/images/logo.png">
            <h5>KSB Portal</h5>
        </div>
        <div class="user">
            <h4>Welcome <?php echo $array['Name']; ?></h4>
                <h6 class="year">Year of Study : <?php echo $array['Year']; ?></h6>
                </div>
                <div class="nav">
                    <h4>Menu</h4>
                    <a href="welcome.php">Home</a>
                    <a href="ksb.php">My KSB's</a>
                    <a href="journal.php">Journal</a>
                    <a href="profile.php">Profile Settings</a>
                </div>
                <a href="logout.php"><button class="btn"type ="submit">Logout</button></a>
            </div>
    <div class="pageHeader">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your KSB Portal.</h1>
        <h3>Use the navigation to access your KSB, Journal &amp; Profile</h3>
    </div>
</body>
</html>
