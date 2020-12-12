<?php
// Include config file
require_once "config.php";


$sql = "SELECT id, skill FROM ksb";
$result = $link->query($sql);


if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["skill"];
  }
  echo "</table>";
} else {
  echo "0 results";
}

$link->close();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Welcome</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <style type="text/css">
         body{ font: 14px sans-serif; text-align: center; }
     </style>
 </head>
 <body>
 </body>
 </html>
