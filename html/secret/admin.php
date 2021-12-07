<?php
	$sql_server = "localhost";
	$sql_username = "website";
	$sql_password = "VerySecurePassword";
	$sql_db = "website";

	$conn = new mysqli($sql_server, $sql_username, $sql_password, $sql_db);

	$sql = "SELECT * from users;";

	$users = $conn->query($sql);
?>

<DOCTYPE html>
<html>
	<head>
		<title>Admin panel</title>
	</head>
	<body>
		<table>
			<tr>
				<th>username</th>
				<th>password_hash</th>
				<th>full_name</th>
			</tr>
			<?php
				while($row = $users->fetch_assoc())
				{
					echo("<tr><td>" . $row["username"] . "</td><td>" . $row["password_hash"] . "</td><td>" . $row["full_name"] . "</td></tr>");
				}
			?>
		</table>
	</body>
</html>