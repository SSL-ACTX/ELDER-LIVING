<?php
require '../connection/connection.php';

$data = json_decode(file_get_contents('php://input'), true);

// Define base URL for the images
$baseUrl = "http://localhost:8000/assets/";

if (isset($data['username'])) {
    $username = $data['username'];
    $orders = $orderCollection->find(['username' => $username]);
    $orderDetails = [];

    foreach ($orders as $order) {
        $cartDetails = [];
        foreach ($order['cart'] as $item) {
            // Check if the image is already a full URL (starts with http)
            $itemImage = isset($item['image']) && $item['image']
                ? (filter_var($item['image'], FILTER_VALIDATE_URL) ? $item['image'] : $baseUrl . $item['image'])
                : (isset($item['productImage']) && $item['productImage']
                    ? (filter_var($item['productImage'], FILTER_VALIDATE_URL) ? $item['productImage'] : $baseUrl . $item['productImage'])
                    : '');

            $cartDetails[] = [
                'name' => $item['name'],
                'image' => $itemImage,  // Use the resolved image here
                'fbImage' => $item['productImage'],  // Keep the original productImage in case needed
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
