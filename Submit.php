<?php
session_start();

  $sql = "INSERT INTO journal (journal,user_id) ";
  	$sql = $sql . " values ('$_POST[journalentry]', '$_SESSION[id]')";

  	$link =mysqli_connect("127.0.0.1","root","","db1_21406612");

  	if ($link->query($sql) === TRUE) {
      echo "New record created successfully<br/>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
header("location: journal.php");



?>
