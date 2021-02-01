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
   <h1> All KSB's </h1>
   <p>
     Digital & Technology Solutions Professional (Degree Apprenticeship) – Software Engineering pathway
   </p>
   <p>
     <a href="https://www.instituteforapprenticeships.org/apprenticeship-standards/digital-and-technology-solutions-professional-integrated-degree/" class="btn btn-warning" target="_blank">All of the Knowledge, Skills and Behaviours (KSBs) are taken from the apprenticeship standard available here</a>
    </p>
     <p>
       Evidence Needs to be Uploaded to Pass Degree Apprenticeship
     </p>
     <p>
       <a href="evidence.php" class="btn btn-warning"> Upload Evidence</a>
     </p>
   </div>
 </body>
 </html>


 <?php
   // Include config file
   require_once "config.php";


   $sql = "SELECT * FROM ksb WHERE id LIKE 'S_'";
   $result = $link->query($sql);


   if ($result->num_rows > 0)
   {
     echo "<div class='table1'>";
     echo "<h2>Skill</h2><br><table><tr><th>ID</th><th>Name</th><th>Skill Description</th><th>Evidence</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["id"]."</td><td>".$row["skill"]."</td><td>".$row["skill_description"]."</td><td>".$row["evidence"]."</td>";
     }
     echo "</table><br><h2>Knowledge</h2>";
    }
   else
   {
     echo "0 results";
   }

   $sql = "SELECT * FROM ksb WHERE id BETWEEN 'K1' AND 'K9'";
   $result = $link->query($sql);


   if ($result->num_rows > 0) {
     echo "<table><tr><th>ID</th><th>Knowledge Description</th><th>Evidence</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["id"]."</td><td>".$row["skill_description"]."</td><td>".$row["evidence"]."</td>";
     }
     echo "</table><br><h2>Behaviour</h2>";
   } else {
     echo "0 results<h2>Behaviour</h2>";
   }


   $sql = "SELECT * FROM ksb WHERE id LIKE 'B_'";
   $result = $link->query($sql);


   if ($result->num_rows > 0) {
     echo "<table><tr><th>ID</th><th>Behaviour Description</th><th>Evidence</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["id"]."</td><td>".$row["skill_description"]."</td><td>".$row["evidence"]."</td>";
     }
     echo "</table><br><h2>Software Engineering</h2>";
   } else {
     echo "0 results";
   }

   $sql = "SELECT * FROM ksb WHERE id BETWEEN 'SE1' AND 'SE9'";
   $result = $link->query($sql);



   if ($result->num_rows > 0) {
     echo "<table><tr><th>ID</th><th>Specialist Description</th><th>Evidence</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["id"]."</td><td>".$row["skill_description"]."</td><td>".$row["evidence"]."</td>";
     }
     echo "</table></div>";
   } else {
     echo "0 results";
   }

   $link->close();
?>
</div>
