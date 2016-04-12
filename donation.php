<html>
<body>

	<?php

	$password = "INSERT PASSWORD HERE";
	$conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());
	
	session_start();

	$donor = $_SESSION['email'];
	$amount = $_GET["donation"];
	$date = date("Y-m-d h:i:sa");
	$project = $_GET["pid"];

	$query = "INSERT INTO donation VALUES ('" . $donor . "', '" . $amount . "', '" . $date . "', '" . $project . "');";
	$result = pg_query($conn, $query);

	$updateQuery = "UPDATE project SET currentAmount=currentAmount + " . $amount . " WHERE id='" . $project . "';";
	$updateResult = pg_query($conn, $updateQuery);

	header("Location: detail.php?projectid=" . $project);
	?>

</body>
</html>