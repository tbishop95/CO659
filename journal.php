<?php
// Initialize the session
session_start();
include('lib/connection.php');

$username=$_SESSION['username'];


//edits journal entry
if(isset($_POST['edit'])){
  $query = "UPDATE journal SET journal='$_POST[journaledit]' WHERE id ='$_POST[journalid] '";
	mysqli_query($conn,$query);
}

//deletes journal entry
if(isset($_POST['delete'])){
  $DeleteQuery = "Delete FROM journal WHERE id ='$_POST[journalid]'";
	 mysqli_query($conn,$DeleteQuery);
}

//display all journal entries from current user logged in.
$sql = "SELECT * from journal WHERE Username ='$username'";
$result = mysqli_query($conn,$sql);

//Fetching user details from user database tabel for nav bar.

$sql="SELECT * FROM users WHERE username='$username'";

$results=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($results);

if($rows>0)
{
	$array=mysqli_fetch_assoc($results);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KSB Journal</title>
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    	<link rel="stylesheet" type="text/css" href="resources/css/mainStyle.css">

</head>
  <body>

<!---nav bar --->
    <div class="sideNav">
  		<div class="navHeader">
  			<img src="resources/images/logo.png">
  			<h5>KSB Portal</h5>
  		</div>
  		<div class="user">
  			<h4>Welcome <?php echo $array['name']; ?></h6>
  				<h6 class="year">Year of Study : <?php echo $array['year']; ?></h5>
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
  					<h1>Journal</h1>
  					<span class=breakLine></span>
  				</div>

    <!--Submit a journal entry-->

    <table class="table table-borderless ">
  <form  action="Submit.php" method="post">
      <tr>
        <td>
          <div class="readOnly">
  <td><input type="text" name="journalentry" placeholder="Enter text here...."></td>
              <!-- <textarea class="form-control" type="text" name="journalentry" rows="1" placeholder="Enter text here...."></textarea> -->
          <td><button type="submit" class="btn" value="Insert"> Submit Entry </button> </td>
          </div>
        </td>
      </tr>
      </form>
</table>

<!--Display journal entries -->
      <!--  <div class="container"> -->
          <table class="table table-borderless ">
    <?php

//Display all journal entries in database
     while ($row = mysqli_fetch_array($result)){
      ?>
      <form action="" method="post">
      <tr>

        <td>  <input type="text" name="journaledit" wrap="off" value="<?php echo $row['journal'];?>">
          <input type="hidden" name="journalid" wrap="off" value="<?php echo $row['id'];?>">
          <button type="submit" class="btn" name="edit">Edit</button>
              <button type="submit" class="btn"name="delete">Delete</button> </td>

          </tr>
        </form>
    <?php
  }
  ?>
<!--    <textarea type="text"name="journaledit" wrap="off"><?php echo $row['journal'];?></textarea> -->
    </table>
  </div>
    </body>
</html>
