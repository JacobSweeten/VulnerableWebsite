<?php
	$sql_server = "localhost";
	$sql_username = "website";
	$sql_password = "VerySecurePassword";
	$sql_db = "website";

	$username = $_POST["registerusername"];
	$password = $_POST["registerpassword"];
	$password_confirm = $_POST["registerpasswordconfirm"];
	$full_name = $_POST["name"];

	if(strcmp($password, $password_confirm) != 0)
	{
		echo("Password mismatch.<br />");
		return;
	}

	$password_hash = md5($password);

	$conn = new mysqli($sql_server, $sql_username, $sql_password, $sql_db);

	$sql = "INSERT INTO users (username, password_hash, full_name) VALUES ('" . $username . "', '" . $password_hash . "', '" . $full_name . "');";
	
	$res = $conn->query($sql);

	if($conn->affected_rows == 0)
	{
		echo("Something went wrong. Make sure your username is unique.");
	}
	else
	{
		echo("Created");
		header("location: /index.php");
	}

	$conn->close();
?>