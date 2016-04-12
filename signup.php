<html>
<body>

	<?php

	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 = $_POST["password-2"];
	$email = $_POST["email"];
	$url = $_POST["url"];
	$image = $_POST["image"];

	if($password == $password2) {

		$sql = "INSERT INTO person(email, username, password, name, image) VALUES('". $email ."', '" . $username . "', '" . $password . "', '" . $name ."', 'img/" . $image . "');";


		$password = "INSERT PASSWORD HERE";
		$conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());
		

		$result = pg_query($conn, $sql);

		var_dump($result);

		pg_close($conn);

		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;

		header("Location: " . $url);

	}

	?>

</body>
</html>