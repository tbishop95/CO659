<?php
session_start();
include('lib/connection.php');
$username=$_SESSION['username'];
  $sql = "INSERT INTO evidence (evidence,username) ";
  	$sql = $sql . " values ('$_POST[text]','$_POST[url]' '$username')";

  //	$link =mysqli_connect("127.0.0.1","root","","db1_21406612");

  	if ($conn->query($sql) === TRUE) {
      echo "New record created successfully<br/>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
header("location: evidence.php");

?>
