<body>
    <a href="read.php">Liste des données</a>
	<h2>Ajouter</h2>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Height Difference</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Send</button>
	</form>
    <?php
    require 'get.php';
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $name=$_POST['name'];
        $difficulty=$_POST['difficulty'];
        $distance=$_POST['distance'];
        $duration=$_POST['duration'];
        $height_difference=$_POST['height_difference'];

        $stmt = $pdo->prepare('INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (:name, :difficulty, :distance, :duration, :height_difference)');
        $stmt->execute([':name' => $name, ':difficulty' => $difficulty, ':distance' => $distance, ':duration' => $duration, ':height_difference' => $height_difference]);
        echo '<p>Congrats! You entered a new hiking experience</p>
        <a href="read.php"</a>';
        
        exit;
    }
    ?>
</body>
