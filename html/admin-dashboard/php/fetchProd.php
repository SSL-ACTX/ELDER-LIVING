<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$collection = $database->products;

$products = $collection->find();
$productArray = iterator_to_array($products);

header('Content-Type: application/json');
echo json_encode($productArray);
?>
