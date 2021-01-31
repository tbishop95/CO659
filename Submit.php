<?php
session_start();
include('lib/connection.php');
$username=$_SESSION['username'];

$journalentry = mysqli_real_escape_string($conn, $_POST['journalentry']);

  $sql = "INSERT INTO journal (journal,username) ";
  	$sql = $sql . " values ('$journalentry', '$username')";

  	if ($conn->query($sql) === TRUE) {
      echo "New record created successfully<br/>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
header("location: journal.php");

?>
