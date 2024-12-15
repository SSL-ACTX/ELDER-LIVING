<?php
// Connect to MongoDB
require '../connection/connection.php';

// Retrieve JSON data from POST request
$data = json_decode(file_get_contents('php://input'), true);

// Insert data into MongoDB
$insertResult = $cartCollection->insertOne([
    'product_id' => $data['id'],
    'product_name' => $data['name'],
    'product_price' => $data['price'],
    'product_image' => $data['image'],
    'quantity' => $data['quantity']
]);

echo json_encode(['success' => $insertResult->isAcknowledged()]);
?>
