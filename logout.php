<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

	<?php
// remove all session variables
	session_unset(); 

// destroy data from current session, does not unset cookies
	session_destroy(); 

// return the user to the login pag 
	header('Location:login.php');
	?>

</body>
</html>