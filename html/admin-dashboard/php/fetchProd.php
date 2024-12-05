<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$collection = $database->products;

$products = $collection->find();
$productArray = iterator_to_array($products);

$standardizedProducts = array_map(function($product) {
    $baseUrl = "http://localhost:8000/";

    $productImage = isset($product['productImage']) ? $product['productImage'] : (isset($product['image']) ? $product['image'] : 'N/A');
    if ($productImage !== 'N/A' && strpos($productImage, 'http') === false) {
        $productImage = $baseUrl . ltrim($productImage, '/');  // prepend
    }

    return [
        '_id' => (string) $product['_id'],
        'productId' => isset($product['productId']) ? $product['productId'] : null,
        'productType' => isset($product['productType']) ? $product['productType'] : 'N/A',
        'category' => isset($product['category']) ? $product['category'] : 'N/A',
        'productName' => isset($product['productName']) ? $product['productName'] : (isset($product['name']) ? $product['name'] : 'N/A'),
        'productPrice' => isset($product['productPrice']) ? $product['productPrice'] : (isset($product['price']) ? $product['price'] : 0),
        'productImage' => $productImage,
        'productDetailsPage' => isset($product['productDetailsPage']) ? $product['productDetailsPage'] : '',
    ];
}, $productArray);

header('Content-Type: application/json');
echo json_encode($standardizedProducts);
?>
