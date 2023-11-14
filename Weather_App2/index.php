<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', '');
    $query=$bdd->query('SELECT * FROM météo');
    echo '<table> <tr> <th> Ville </th> <th> Haut </th> <th> Bas </th> </tr>';
    while ($row = $query->fetch())
    {
        echo '<tr> <td>' . $row['ville'] . '</td>
        <td>' . $row['haut'] . '</td>
        <td>' . $row['bas'] . '</td> </tr>';
    }
    echo '</table>';
}

catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>

<h2>Add a city:</h2>
<form class="addForm" method="POST">
    <label for="city">City:</label>
    <input type="text" name="city" id="city" required>

    <label for="high">Temp. max:</label>
    <input type="number" id="high" name="high" required>

    <label for="low">Temp. min:</label>
    <input type="number" id="low" name="low" required>

    <input type="submit" value="Add">
</form>

<?php
if ($_SERVER['REQUEST_METHOD']==="POST") {
    $city=$_POST['city'];
    $high=$_POST['high'];
    $low=$_POST['low'];

    $stmt = $bdd->prepare('INSERT INTO météo (ville, haut, bas) VALUES (:city, :high, :low)');
    $stmt->execute([':city' => $city, ':high' => $high, ':low' => $low]);

    exit;
}



?>