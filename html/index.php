<?php
	setcookie("Flag", "CYBER_EAGLES_3746_AVHB", time() + 60 * 60 * 24 * 365);
	$sql_server = "localhost";
	$sql_username = "website";
	$sql_password = "VerySecurePassword";
	$sql_db = "website";

	$conn = new mysqli($sql_server, $sql_username, $sql_password, $sql_db);

	if(isset($_COOKIE["session"]))
	{
		$sql = "SELECT username FROM sessions WHERE token = '" . $_COOKIE["session"] . "';";

		$res = $conn->query($sql);

		if($res->num_rows != 0)
		{
			header("location: /wall.php");
			return;
		}
	}
?>

<!DOCTYPE html>
<html>
	<!-- Remember: password for /secret is admin:IAMADMIN -->
	<head>
		<title>I am vulnerable!</title>
		<link rel="stylesheet" href="/index.css" />
	</head>
	<body>
		<h1>Welcome to my vulnerable website!</h1>
		<div id="logincolumn" class="column">
			<h2>Login</h2>
			<form method="POST", action="/login.php">
				<label for="loginusername">Username:</label>
				<input type="text" id="loginusername" name="loginusername" /><br />
				<label for="loginpassword">Password:</label>
				<input type="text" id="loginpassword" name="loginpassword" /><br />
				<input type="submit" />
			</form>
		</div>
		<div id="registercolumn" class="column">
			<h2>Register</h2>
			<form method="POST", action="/register.php">
				<label for="registerusername">Username:</label>
				<input type="text" id="registerusername" name="registerusername" /><br />
				<label for="registerpassword">Password:</label>
				<input type="text" id="registerpassword" name="registerpassword" /><br />
				<label for="registerpasswordconfirm">Confirm password:</label>
				<input type="text" id="registerpasswordconfirm" name="registerpasswordconfirm" /><br />
				<label for="name">Full name:</label>
				<input type="text" id="name" name="name" /><br />
				<input type="submit" />
			</form>
		</div>
	</body>
</html>