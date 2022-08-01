<?php

// Si from et to ne sont pas définis, renvoi du code HTTP 400 => Bad request
if(!isset($_GET['from']) && !isset($_GET['to'])){
    http_response_code(400);
}

require_once '../class/database.php';

//$from = (new DateTime('@' . $_GET['from']))->format('Y-m-d H:i:s');
$from = new DateTime('@' . $_GET['from']);
$from->setTimezone(new DateTimeZone('Europe/Paris'));
$from = $from->format('Y-m-d H:i:s');

//$to = (new DateTime('@' . $_GET['to']);,)->format('Y-m-d H:i:s');
$to = new DateTime('@' . $_GET['to']);
$to->setTimezone(new DateTimeZone('Europe/Paris'));
$to = $to->format('Y-m-d H:i:s');

/* Remplacer par la fonction LireDonne de la classe Database
$bdd = new PDO('mysql:host=192.168.1.183;dbname=meteo;charset=utf8', 'evelynedheliat', 'Casquette2022!');
$sql = "SELECT * FROM donnees WHERE date >=? AND date <=?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$from, $to]);
*/

$db = new Database();
$stmt = $db->LireDonnee($from, $to);

$valeurs = array();
while($row = $stmt->fetch()){

    // Création d'un objet standard
    $obj = new \stdClass();
    $obj->date = $row["date"];
    $obj->temperature = $row["temp"];
    $obj->humidite = $row["humi"];
    // Ajout de l'object dans le tableau de valeur
    $valeurs[] = $obj;

    /*
    echo "Date & Heure : ".$row["date"]."<br/>";
    echo "Temperature : ".$row["temp"]."<br/>";
    echo "Humidité : ".$row["humi"]."<br/>";
    */
}

// affiche le Json
echo json_encode($json);