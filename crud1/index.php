<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // $data=$query->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$stmt=$bdd->query('SELECT * FROM clients');
echo '<h2>Clients List</h2> <br>
<table> <tr> <th>Firstname</th> <th>Last Name:</th> <th>Birthday:</th> <th>Card Number:</th>';
while ($row=$stmt->fetch())
{
    echo '<tr>
        <td>' . $row['firstName'] . '</td>
        <td>' . $row['lastName'] . '</td>
        <td>' . $row['birthDate'] . '</td>
        <td>' . $row['cardNumber'] . '</td>
        </tr>';
};
echo '</table><br>';


$stmt=$bdd->query('SELECT * FROM shows');
echo '<h2>Shows</h2> <br>
<table><tr> <th>Title:</th> <th>Performer:</th> <th>Date:</th> <th>Starting Time:</th>';
while ($row = $stmt->fetch())
    {
        echo '<tr>
            <td>' . $row['title'] . '</td>
            <td>' . $row['performer'] . '</td>
            <td>' . $row['date'] . '</td>
            <td>' . $row['startTime'] . '</td>
            </tr>';
    }
echo '</table>
<br>';

$stmt=$bdd->query('SELECT * FROM clients LIMIT 20');
echo '<h2>First 20 clients</h2>
<table> <tr> <th>Firstname</th> <th>Last Name:</th> <th>Birthday:</th> <th>Card Number:</th>';
while ($row=$stmt->fetch())
{
    echo '<tr>
        <td>' . $row['firstName'] . '</td>
        <td>' . $row['lastName'] . '</td>
        <td>' . $row['birthDate'] . '</td>
        </tr>';
};
echo '</table><br>';

$stmt=$bdd->query('SELECT * FROM clients WHERE card=1');
echo '<h2>Clients with fidelity Card</h2>
<table> <tr> <th>Firstname:</th> <th>Last Name:</th> <th>Birthday:</th>';
while ($row=$stmt->fetch()) {
    echo '<tr>
        <td>' . $row['firstName'] . '</td>
        <td>' . $row['lastName'] . '</td>
        <td>' . $row['birthDate'] . '</td>
        <td>' . $row['card'] . '</td>
        </tr>';
};
echo '</table><br>';

$stmt=$bdd->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC');
echo '<h2>Clients with lastname in M</h2>';
while ($row=$stmt->fetch()) {
    echo 'Name:' . $row['lastName'];
    echo '<br>';
    echo 'Firstname:' . $row['firstName'];
    echo '<br>';
    echo '<br>';
};

$stmt=$bdd->query('SELECT title, performer, date, startTime FROM shows ORDER BY title ASC');
echo '<h2>Shows in order</h2> <br>';
while ($row = $stmt->fetch())
    {
        echo 'Title:' . $row['title'];
        echo '<br>';
        echo 'Performer:' . $row['performer'];
        echo '<br>';
        echo 'Date:' . $row['date'];
        echo '<br>';
        echo 'Starting Time:' . $row['startTime'];
        echo '<br>';
        echo '<br>';
    }
echo '<br>';

$stmt=$bdd->query('SELECT * FROM clients');
echo '<h2>Everything to know and to wrap it up!</h2> <br>';
while ($row = $stmt->fetch())
    {
        echo 'Name:', $row['lastName'];
        echo '<br>';
        echo 'Last Name:', $row['firstName'];
        echo '<br>';
        echo 'Birthday:', $row['birthDate'];
        echo '<br>';
        echo 'Fidelity Card:', ($row['card']) ? 'Yes' : 'No';
        echo '<br>';
        echo ($row['card']) ? 'Card number:'. $row['cardNumber'] : '';
        echo '<br>';
        echo '<br>';
    }
echo '<br>';