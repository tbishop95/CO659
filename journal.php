<?php
// Initialize the session
session_start();
include('lib/connection.php');

$username=$_SESSION['username'];

//edits journal entry
if(isset($_POST['edit'])){
  $journal =mysqli_real_escape_string($conn, $_POST['journaledit']);
  $query = "UPDATE journal SET journal='$journal'WHERE id = '$_POST[journalid]'";
	mysqli_query($conn,$query);
}

//deletes journal entry
if(isset($_POST['delete'])){
  $DeleteQuery = "Delete FROM journal WHERE id ='$_POST[journalid]'";
	 mysqli_query($conn,$DeleteQuery);
}

//display all journal entries from current user logged in.
$sql = "SELECT * from journal WHERE Username ='$username'
ORDER BY date DESC";
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
<div class="profilejournal">
    <!--Submit a journal entry-->
    <table class="journaltable">
  <form  action="Submit.php" method="post">
      <tr class="journaltd">
        <td class="journaltd">
          <textarea type="text" class="journalbox"name="journalentry" placeholder="Enter text here...."></textarea>
          <button type="submit" class="btnj" value="Insert"> Save </button></td>
      </tr>
      </form>
</table>

<!--Display journal entries -->
          <table class="journaltable">
    <?php

//Display all journal entries in database
     while ($row = mysqli_fetch_array($result)){
      ?>
      <form action="" method="post">
      <tr class="journaltd">
        <td class="journaltd">
          <p class="plain"><u><?php echo $row['username'],"  " ,"  ", $row['date'];?></u></p>
          <textarea type="text"name="journaledit" class="journaleditbox"><?php echo $row['journal'];?></textarea>
          <input type="hidden" name="journalid" wrap="off" value="<?php echo $row['id'];?>">
          <button type="submit" class="btnj" name="edit">Save</button>
              <button type="submit" class="btnj"name="delete">Delete</button> </td>
          </tr>
        </form>
    <?php
  }
  ?>
<!--    <textarea type="text"name="journaledit" wrap="off"><?php echo $row['journal'];?></textarea>
<td class="g"><textarea type="text" name="journaledit" value="<?php echo $row['journal'];?>">-->
    </table>
  </div>
</div>
    </body>
</html>
