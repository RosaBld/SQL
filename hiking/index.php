<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
        <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '');
                $query=$bdd->query('SELECT * FROM hiking');
                

                echo '<table> <tr> <th>Id:</th> <th>Name:</th> <th>Difficulty:</th> <th>Distance:</th> <th>Duration:</th> <th>Height difference:</th>';
                while ($row = $query->fetch())
                {
                    echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['difficulty'] . '</td>
                        <td>' . $row['distance'] . '</td>
                        <td>' . $row['duration'] . '</td>
                        <td>' . $row['height_difference'] . '</td>
                        </tr>';
                }
                echo '</table>';
                
                include 'create.php';

                exit;
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        
        ?>
  </body>
</html>

