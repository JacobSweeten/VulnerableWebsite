<?php
	$sql_server = "localhost";
	$sql_username = "website";
	$sql_password = "VerySecurePassword";
	$sql_db = "website";

	$conn = new mysqli($sql_server, $sql_username, $sql_password, $sql_db);

	if(isset($_COOKIE["session"]))
	{
		$sql = "SELECT username FROM sessions WHERE token = '" . $_COOKIE["session"] . "';";

		$res = $conn->query($sql);

		if($res->num_rows == 0)
		{
			header("location: /index.php");
			return;
		}
	}
	else
	{
		header("location: /index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The posting wall!</title>
		<link rel="stylesheet" href="wall.css" />
	</head>
	<body>
		<form method="GET" action="/logout.php">
			<input type="submit" value="Logout">
		</form>
		<br />
		<br />
		<br />
		<br />
		<form method="POST" action="/post.php">
			<input type="textarea" id="posttext" name="posttext" /><br />
			<input type="hidden" name="username" value="<?php echo($username); ?>" />
			<input type="submit" />
		</form>
		<?php
			$sql = "SELECT * FROM posts;";
			$res = $conn->query($sql);

			if($res->num_rows == 0)
			{
				echo("No posts to show.");
			}
			else
			{
				while($row = $res->fetch_assoc())
				{
					echo("<div class=\"post\"><h3>" . $row["username"] . "</h3><br /><br /><p>" . $row["text"] . "</p></div>");
				}
			}
		?>
	</body>
</html>