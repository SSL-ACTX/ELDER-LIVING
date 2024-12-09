<?php
require '../connection/connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username']) && isset($data['cart']) && isset($data['totalPrice'])) {
    $username = $data['username'];
    $cartItems = $data['cart'];
    $totalPrice = $data['totalPrice'];

    // Ensure each cart item has a 'checked' status
    foreach ($cartItems as &$item) {
        $item['checked'] = isset($item['checked']) ? $item['checked'] : false;
    }

    // Check if a cart document already exists for this user
    $existingCart = $cartCollection->findOne(['username' => $username]);

    if ($existingCart) {
        // If an existing cart is found, update it
        $updateResult = $cartCollection->updateOne(
            ['_id' => $existingCart->_id], // Use the _id of the existing document
            [
                '$set' => [
                    'cart' => $cartItems,
                    'totalPrice' => $totalPrice,
                    'updated_at' => new MongoDB\BSON\UTCDateTime()
                ]
            ]
        );

        if ($updateResult->getModifiedCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update cart']);
        }
    } else {
        // If no existing cart, create a new one
        $order = [
            'username' => $username,
            'cart' => $cartItems,
            'totalPrice' => $totalPrice,
            'status' => 'pending',
            'created_at' => new MongoDB\BSON\UTCDateTime(),
            'updated_at' => new MongoDB\BSON\UTCDateTime()
        ];

        $result = $cartCollection->insertOne($order);
        if ($result->getInsertedCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save cart']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
