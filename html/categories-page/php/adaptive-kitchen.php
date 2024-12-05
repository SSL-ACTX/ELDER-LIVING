<?php
$mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$category = isset($_GET['category']) ? $_GET['category'] : '';

$query = new MongoDB\Driver\Query(
    ['category' => $category],
    []
);

$cursor = $mongoClient->executeQuery('Elder_Living.products', $query);
$products = [];

foreach ($cursor as $product) {
    $products[] = $product;
}
echo json_encode($products);
?>
