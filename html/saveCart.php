<?php
require '../connection/connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username']) && isset($data['cart'])) {
    $cartItems = json_decode($data['cart'], true);
    $username = $data['username'];
    $totalPrice = $data['totalPrice'];

    $order = [
        'username' => $username,
        'cart' => $cartItems,
        'totalPrice' => $totalPrice,
        // 'status' => 'pending',  // default status for the current cart
        'created_at' => new MongoDB\BSON\UTCDateTime(),
        'updated_at' => new MongoDB\BSON\UTCDateTime()
    ];

    $result = $cartCollection->insertOne($order);
    if ($result->getInsertedCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save cart']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>
