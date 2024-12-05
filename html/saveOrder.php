<?php
require '../connection/connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username']) && isset($data['cart']) && isset($data['paymentMethod']) && isset($data['deliveryDetails'])) {
    $cartItems = json_decode($data['cart'], true);
    $username = $data['username'];
    $totalPrice = $data['totalPrice'];
    $paymentMethod = $data['paymentMethod'];
    $paymentDetails = $data['paymentDetails']; // from paypal

    $deliveryDetails = $data['deliveryDetails'];
    $fullName = $deliveryDetails['fullName'];
    $phoneNumber = $deliveryDetails['phoneNumber'];
    $address = $deliveryDetails['address'];
    $provRegCity = $deliveryDetails['provRegCity'];
    $postalCode = $deliveryDetails['postalCode'];

    $order = [
        'username' => $username,
        'cart' => $cartItems,
        'totalPrice' => $totalPrice,
        'paymentMethod' => $paymentMethod,  // 'Cash on Delivery' or 'PayPal'
        'paymentDetails' => $paymentDetails,
        'deliveryDetails' => [
            'fullName' => $fullName,
            'phoneNumber' => $phoneNumber,
            'address' => $address,
            'provRegCity' => $provRegCity,
            'postalCode' => $postalCode
        ],
        'deliveryStatus' => 'to-ship',
        'paymentStatus' => $paymentMethod == 'COD' ? 'pending' : 'paid',
        'created_at' => new MongoDB\BSON\UTCDateTime(),
        'updated_at' => new MongoDB\BSON\UTCDateTime()
    ];

    $result = $orderCollection->insertOne($order);
    if ($result->getInsertedCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save order']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>
