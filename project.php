<html>
<body>

	<?php
	$password = "INSERT PASSWORD HERE";
	$conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());

	session_start();

	$title = $_GET['project-title'];
	$description = $_GET['short-description'];
	$start = date("Y-m-d");

	$startTime = strtotime($start);
	$end = strtotime($_GET['end-date']);

	$duration = floor(($end - $startTime) / 86400);

	$goalAmount = $_GET['money-needed'];
	$image = $_GET['image'];

	$username = $_SESSION["username"];
	$person = $_SESSION["email"];
	$category = $_GET['category'];

	$query = "INSERT INTO project(title, description, start, duration, goalAmount, currentAmount, image) VALUES ('" . $title
		. "', '" . $description . "', '" . $start . "', '" . $duration . "', '" . $goalAmount . "', 0, 'img/" . $image . "');";
	$result = pg_query($conn, $query);

	$getID = "SELECT id FROM project ORDER BY id DESC";
	$idArray = pg_fetch_array(pg_query($getID));
	$id = $idArray[0];

	$personQuery = "INSERT INTO projectPerson VALUES ('" . $id . "', '" . $person . "');";
	$resultperson = pg_query($conn, $personQuery);

	$categoryQuery = "INSERT INTO projectCategory VALUES ('" . $id . "', '" . $category . "');";
	$categoryResult = pg_query($conn, $categoryQuery);

	header("Location: detail.php?projectid=" . $id);

	?>

</body>
</html>