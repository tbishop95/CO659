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
      table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
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
h1{
  font-family: sans-serif;

  text-align: center;
      }
      .title1 {
  background-color: white;
  color: black;
  border: 2px white;
  margin: 20px;
  padding: 20px;
  border-radius: 25px;
}
.table1 {
background-color: white;
color: black;
border: 2px white;
margin: 20px;
padding: 20px;
border-radius: 25px;
}

     </style>
 </head>
 <body>
   <div class="title1">
   <h1> All KSB's </h1>
   <p> Digital & Technology Solutions Professional (Degree Apprenticeship) – Software Engineering pathway</p>
   <p>
<a href="https://www.instituteforapprenticeships.org/apprenticeship-standards/digital-and-technology-solutions-professional-integrated-degree/" class="btn btn-warning" target="_blank">All of the Knowledge, Skills and
  Behaviours (KSBs) are taken from the apprenticeship standard available here</a>
   </p>
   <p> Evidence Needs to be Uploaded to Pass Degree Apprenticeship
   </p>
   <p>
     <a href="journal.php" class="btn btn-warning"> Upload Evidence</a>
   </p>
   </div>
 </body>
 </html>
 <?php
 // Include config file
 require_once "config.php";


 $sql = "SELECT * FROM ksb WHERE id LIKE 'S_'";
 $result = $link->query($sql);


 if ($result->num_rows > 0) {
   echo "<div class='table1'>";
   echo "<h2>Skill</h2><br><table><tr><th>ID</th><th>Name</th><th>Skill Description</th><th>Evidence</th></tr>";
   // output data of each row
   while($row = $result->fetch_assoc()) {
     echo "<tr><td>".$row["id"]."</td><td>".$row["skill"]."</td><td>".$row["skill_description"]."</td><td>".$row["evidence"]."</td>";
   }
   echo "</table><br><h2>Knowledge</h2>";
 } else {
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
