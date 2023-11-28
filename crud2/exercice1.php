<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>