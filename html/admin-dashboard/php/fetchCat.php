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
            'firstProductImage' => [
                '$first' => [
                    '$cond' => [
                        'if' => ['$ifNull' => ['$productImage', false]],
                        'then' => '$productImage',
                        'else' => '$image'
                    ]
                ]
            ]
        ]
    ]
]);

// fallback
$categoryArray = iterator_to_array($categories);
foreach ($categoryArray as &$category) {
    $category['firstProductImage'] = 'http://localhost:8000/assets/' . basename($category['firstProductImage']);
}

header('Content-Type: application/json');
echo json_encode($categoryArray);
?>
