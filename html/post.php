<?php
	$sql_server = "localhost";
	$sql_username = "website";
	$sql_password = "VerySecurePassword";
	$sql_db = "website";

	$text = $_POST["posttext"];

	$conn = new mysqli($sql_server, $sql_username, $sql_password, $sql_db);

	$username = "";

	if(isset($_COOKIE["session"]))
	{
		$sql = "SELECT username FROM sessions WHERE token = '" . $_COOKIE["session"] . "';";

		$res = $conn->query($sql);

		if($res->num_rows != 0)
		{
			$username = $res->fetch_assoc()["username"];
		}
		else
		{
			header("location: /index.php");
			return;
		}
	}
	else
	{
		header("location: /index.php");
		return;
	}

	$id = rand(1000, 9999);
	$sql = "INSERT INTO posts (username, text, ID) VALUES ('" . $username . "', '" . $text . "', " . $id . ");";

	$conn->query($sql);

	header("location: /wall.php");
?>