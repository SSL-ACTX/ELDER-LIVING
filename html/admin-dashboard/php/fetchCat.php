<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$collection = $database->products;

$categories = $collection->aggregate([
    [
        '$group' => [
            '_id' => '$category',
            'count' => ['$sum' => 1],
            'firstProductImage' => ['$first' => '$image']
        ]
    ]
]);

$categoryArray = iterator_to_array($categories);
header('Content-Type: application/json');
echo json_encode($categoryArray);
?>
