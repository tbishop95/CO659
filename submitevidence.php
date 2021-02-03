<?php
session_start();
include('lib/connection.php');
$username=$_SESSION['username'];
  $sql = "INSERT INTO evidence (description, link, file) ";
  	$sql = $sql . " values ('$_POST[description]', '$_POST[link]','$_POST[file]')"



  //	$link =mysqli_connect("127.0.0.1","root","","db1_21406612");

  	if ($conn->query($sql) === TRUE) {
      echo "Your evidence was uploaded successfully<br/>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
header("location: evidence.php");

?>
