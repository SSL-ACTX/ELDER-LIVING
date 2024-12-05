<?php
require '../connection/connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username'])) {
    $username = $data['username'];
    $orders = $orderCollection->find(['username' => $username]);
    $orderDetails = [];

    foreach ($orders as $order) {
        $cartDetails = [];
        foreach ($order['cart'] as $item) {
            $cartDetails[] = [
                'name' => $item['name'],
                'image' => $item['image'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
        }

        $orderDetails[] = [
            'order_id' => (string) $order['_id'],
            'status' => $order['status'],
            'deliveryStatus' => $order['deliveryStatus'],
            'totalPrice' => $order['totalPrice'],
            'cart' => $cartDetails,
            'created_at' => $order['created_at']->toDateTime()->format('Y-m-d H:i:s')
        ];
    }

    if (count($orderDetails) > 0) {
        echo json_encode(['success' => true, 'orders' => $orderDetails]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No orders found for this user']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>
