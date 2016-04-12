<html>
<body>

	<?php

	$password = "INSERT PASSWORD HERE";
	$conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());
	
	$title = $_GET["new-project-name"];
	$description = $_GET["new-project-description"];
	$goalAmount = $_GET["new-project-money"];
	$image = $_GET["new-project-image"];
	$category = $_GET["category"];
	$id = $_GET["pid"];
	$update = $_GET["update-image"];
	$addCat1 = $_GET["add-category1"];
	$addCat2 = $_GET["add-category2"];
	$category1 = $_GET["category2"];
	$category2 = $_GET["category3"];


	if ($update) {
		$query = "UPDATE project SET title='" . $title . "', description='" . $description . "',
		goalAmount='" . $goalAmount . "', image='img/" . $image . "' WHERE id='" . $id . "';";
		$result = pg_query($conn, $query);
	} else {
		$query = "UPDATE project SET title='" . $title . "', description='" . $description . "',
		goalAmount='" . $goalAmount . "' WHERE id='" . $id . "';";

		$result = pg_query($conn, $query);
	}

	if ($addCat1) {
		$categoryQuery = "INSERT INTO projectCategory VALUES ('" . $id . "', '" . $category1 . "');";
		$categoryResult = pg_query($conn, $categoryQuery);
	}

	if ($addCat2) {
		$categoryQuery = "INSERT INTO projectCategory VALUES ('" . $id . "', '" . $category2 . "');";
		$categoryResult = pg_query($conn, $categoryQuery);
	}

	header("Location: detail.php?projectid=" . $id);

	?>

</body>
</html>