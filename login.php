<html>
<body>

	<?php

	$password = "INSERT PASSWORD HERE";
	$conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());

	$username2 = $_POST["username2"];
	$password2 = $_POST["password2"];
	$url = $_POST["url"];

	$sql = "SELECT p.name, p.email FROM person p WHERE p.username = '" . $username2 . "' AND p.password = '" . $password2 ."';";

	$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
	$number = pg_num_rows($result);
	$row = pg_fetch_array($result);

	if($number == 0) {
		echo "Incorrect username and password.";
	} else {
		echo "Successfully logged in as'" . $username . "'and'" .  $password . "'";
		session_start();
		$_SESSION['username'] = $username2;
		$_SESSION['name'] = $row[0];
		$_SESSION['email'] = $row[1];
	}

	header("Location: " . $url);

	?>

</body>
</html>