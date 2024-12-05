<?php
require '../../../connection/connection.php';

header('Content-Type: application/json');

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$ordersCollection = $database->orders;

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['orderId']) || !isset($data['newStatus'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

$orderId = $data['orderId'];
$newStatus = $data['newStatus'];

try {
    $orderId = new MongoDB\BSON\ObjectId($orderId);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Invalid order ID']);
    exit;
}

$order = $ordersCollection->findOne(['_id' => $orderId]);

if (!$order) {
    echo json_encode(['success' => false, 'message' => 'Order not found']);
    exit;
}

$updateData = ['deliveryStatus' => $newStatus];

// Only for COD orders, status auto switch
if (isset($order['paymentMethod']) && $order['paymentMethod'] === 'COD') {
    $pendingStatuses = ['to-pay', 'to-ship', 'to-receive', 'pending'];

    if (in_array($newStatus, $pendingStatuses)) {
        $updateData['paymentStatus'] = 'pending';
    } elseif ($newStatus === 'complete') {
        $updateData['paymentStatus'] = 'paid';
    }
}

$updateResult = $ordersCollection->updateOne(
    ['_id' => $orderId],
    ['$set' => $updateData]
);

if ($updateResult->getModifiedCount() > 0) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update status']);
}
?>
