<html>
<body>

	<?php

	$password = "INSERT PASSWORD HERE";
	$conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());

	$id = $_GET["pid"];

	$query = "DELETE FROM projectPerson WHERE project=" . $id . ";";
	$query2 = "DELETE FROM projectCategory WHERE project=" . $id . ";";
	$query3 = "DELETE FROM project WHERE id=" . $id . ";";

	$result = pg_query($conn, $query);
	$result2 = pg_query($conn, $query2);
	$result3 = pg_query($conn, $query3);

	header("Location: index.php");

	?>

</body>
</html>