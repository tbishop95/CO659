<?php
// Initialize the session
session_start();
include('lib/connection.php');

$username=$_SESSION['username'];

//edits journal entry
if(isset($_POST['edit'])){
  $query = "UPDATE evidence SET evidence='$_POST[evidenceedit]' WHERE username ='$username'";
	mysqli_query($conn,$query);
}

//deletes journal entry
if(isset($_POST['delete'])){
  $DeleteQuery = "Delete FROM evidence WHERE id ='$_POST[id]'";
	 mysqli_query($conn,$DeleteQuery);
}

//display all journal entries from current user logged in
$sql = "SELECT * from evidence WHERE username ='$username'";
$result = mysqli_query($conn,$sql);

//Fetching user details

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
     <title>KSB</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <style type="text/css">
      body
      {  font: 14px sans-serif;
        text-align: center;
         background-color: #eeebe5;
         display: flex;
         flex-direction: flex;
       }
      a
      {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          font-size: 20px;
          color: #76949F;
          text-align: center;
      }
      a:hover
      {
        color: #b3b3b3;
      }
      table
      {
        border-collapse: collapse;
        width: 100%;
      }

      th, td
      {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      tr:hover
      {
        background-color:#f5f5f5;
      }
      h2
      {
        font-family: sans-serif;
        font-size: 20px;
        color: black;
        text-align: center;
      }
      p
      {
        font-family: sans-serif;
        color: #black;
        text-align: center;
      }
      h1
      {
        font-family: sans-serif;
        text-align: center;
      }
      .title1
      {
        background-color: white;
        color: black;
        border: 2px white;
        margin: 20px;
        padding: 20px;
        border-radius: 25px;
      }
      .table1
      {
        background-color: white;
        color: black;
        border: 2px white;
        margin: 20px;
        padding: 20px;
        border-radius: 25px;
      }

      /*Side Nav*/
      .sideNav {
    width: 15%;
    background-color: #000000;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
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

.logoutBtn {
    width: 200px;
    padding: 1rem;
    background-color: #FFC200;
    border: none;
    border-radius: 25px;
    font-family: 1rem;
    margin: 1rem;
    color: #fff;
}

.logoutBtn:hover {
    background-color: #DDAD17;
}

.KSB {
  display: flex;
  flex-direction: column;
  width: 85%;
}
.file-upload {
  display: inline-flex;
  align-items: center;
  font-size: 15px;
}

.file-upload__input {
  display: none;
}

.file-upload__button {
  width: 200px;
  padding: 1rem;
  background-color: #FFC200;
  border: none;
  border-radius: 25px;
  font-family: 1rem;
  margin: 1rem;
  color: #fff;
}

.file-upload__button:active {
  background: #00745d;
}

.file-upload__label {
  max-width: 250px;
  font-size: 0.95em;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  font-family: "Quicksand", sans-serif;
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
        <a href="logout.php"><button class="btn logoutBtn"type ="submit">Logout</button></a>
      </div>
      <div class="KSB">
   <div class="title1">
   <h1> KSB evidence </h1>
   <p>
     <a  class="btn btn-warning" target="_blank">Upload and view your KBSs evidence</a>
    </p>
     <p>
       Evidence Needs to be Uploaded to Pass Degree Apprenticeship
     </p>
   </div>
 <table class="table table-borderless ">
<form  action="submitevidence.php" method="post">
   <tr>
     <td>
       <div class="readOnly">
         <td><input type="text" name="description" placeholder="Enter description here...."></td>
         <td><input type="url" name="link" placeholder="Enter link here...."></td>
          <td><input  type="file" name="file" ></td>

           <!-- <textarea class="form-control" type="text" name="journalentry" rows="1" placeholder="Enter text here...."></textarea> -->
       <td><button type="submit" class="btn-warning" value="Insert"> Upload Evidence </button> </td>
       </div>
     </td>
   </tr>
   </form>
</table>

 <!--Display all ksb evidence-->



 </body>
</html>
