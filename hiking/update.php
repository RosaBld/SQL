<!DOCTYPE html>
<html>

<?php
require 'get.php';
?>

<head>
	<meta charset="utf-8">
	<title>Updating a hike</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
	<a href="read.php">Liste des données</a>
	<h1>Update</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty" default=>
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
				<option value="<?php echo isset($_GET['difficulty']) ? $_GET['difficulty'] : ''; ?>" selected><?php echo isset($_GET['difficulty']) ? $_GET['difficulty'] : ''; ?></option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="number" name="distance" value="<?php echo isset($_GET['distance']) ? $_GET['distance'] : ''; ?>">
		</div>
		<div>
			<label for="duration">Duration</label>
            <input type="time" name="duration" value="<?php echo isset($_GET['duration']) ? $_GET['duration'] : ''; ?>">
		</div>
		<div>
			<label for="height_difference">Height difference</label>
			<input type="number" name="height_difference" value="<?php echo isset($_GET['height_difference']) ? $_GET['height_difference'] : ''; ?>">
		</div>
		<button type="submit" name="button">Send</button>
	</form>
</body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_GET['id'];
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];
	$duration = date("H:i:s", strtotime($_POST['duration']));
	$height = $_POST['height_difference'];

	$stmt = $pdo->prepare("UPDATE hiking SET name = ?, difficulty = ?, distance = ?, duration = ?, height_difference = ? WHERE id = ?");
	$stmt->execute([$name, $difficulty, $distance, $duration, $height, $id]);

	echo "<p>Walk information updated successfully!</p>";
	echo '<a href="read.php">Back to dashboard</a>';
}
?>

</html>