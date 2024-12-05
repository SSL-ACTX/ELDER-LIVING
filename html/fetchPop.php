<?php
require '../connection/connection.php';

$products = $productCollection->find(['productType' => 'Popular Products']);
$productsArray = iterator_to_array($products);

header('Content-Type: application/json');
echo json_encode($productsArray);
?>
