<?php
	$sql_server = "localhost";
	$sql_username = "website";
	$sql_password = "VerySecurePassword";
	$sql_db = "website";

	$conn = new mysqli($sql_server, $sql_username, $sql_password, $sql_db);

	$username = $_POST["loginusername"];
	$password = $_POST["loginpassword"];

	$password_hash = md5($password);

	$sql = "SELECT username FROM users WHERE username = '" . $username . "' AND password_hash = '" . $password_hash . "';";
	
	$res = $conn->query($sql);

	if($res->num_rows == 0)
	{
		echo("Bad username or password");
	}
	else
	{
		$token = md5($username . $password . date("Y-m-d H:i:s"));

		$sql = "INSERT INTO sessions (username, token) VALUES ('" . $username . "', '" . $token . "');";

		$conn->query($sql);

		setcookie("session", $token, time() + 60 * 60 * 24 * 365);

		header("location: /wall.php");
	}

	$conn->close();

?>