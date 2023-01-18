<?php 
	
	/*
	* Register page 
	*/

	session_start();
	require_once('dbconnect.php');

	if (isset($_SESSION['user'])) {
		header('Location: home.php');
	}

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = hash('sha256', $_POST['password']);
		$result = $db->users->insertMany(array('username'=>$username, 'password'=>$password));

		header('Location: index.php');
	}

?>

<html>
<head>
	<title> Twitter Clone </title>
</head>
<body>
	<form method = "post" action = "register.php">
	<fieldset>
		<label for = "username"> Username </label><input type = "text" name = "username"/><br>
		<label for = "password"> Password </label><input type = "password" name = "password"/><br>
		<input type = "submit" value = "Sign Up">
	</fieldset>
	</form>
	<a href = "index.php"> Already have an account? Login here. </a>
</body>
</html>