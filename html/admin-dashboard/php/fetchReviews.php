<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$reviewCollection = $database->reviews;

$reviews = $reviewCollection->find()->toArray();

header('Content-Type: application/json');
echo json_encode($reviews);
?>
