<?php
require '../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$collection = $database->products;

// Get the search query
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if ($query) {
    $regex = new MongoDB\BSON\Regex($query, 'i'); // Case-insensitive search
    $filter = [
        '$or' => [
            ['productName' => $regex],
            ['productType' => $regex],
            ['category' => $regex]
        ]
    ];
    $products = $collection->find($filter);
} else {
    $products = $collection->find();
}

$productArray = iterator_to_array($products);

$standardizedProducts = array_map(function($product) {
    $baseUrl = "http://localhost:8000/";

    $productImage = isset($product['productImage']) ? $product['productImage'] : (isset($product['image']) ? $product['image'] : 'N/A');
    if ($productImage !== 'N/A' && strpos($productImage, 'http') === false) {
        $productImage = $baseUrl . ltrim($productImage, '/');
    }

    return [
        '_id' => (string) $product['_id'],
        'productName' => isset($product['productName']) ? $product['productName'] : (isset($product['name']) ? $product['name'] : 'N/A'),
        'productPrice' => isset($product['productPrice']) ? $product['productPrice'] : (isset($product['price']) ? $product['price'] : 0),
        'productImage' => $productImage,
    ];
}, $productArray);

header('Content-Type: application/json');
echo json_encode($standardizedProducts);
?>
