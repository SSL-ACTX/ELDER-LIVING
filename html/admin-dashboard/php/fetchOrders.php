<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$ordersCollection = $database->orders;

$orders = $ordersCollection->find();

$orderArray = iterator_to_array($orders);

$formattedOrders = [];

foreach ($orderArray as $order) {
    $paymentMethod = 'COD';
    if (isset($order['paymentDetails']['purchase_units'][0]['payments']['captures'][0]['id'])) {
        $paymentMethod = 'PayPal';
    }

    $orderStatus = 'Completed';
    if (isset($order['deliveryStatus'])) {
        switch ($order['deliveryStatus']) {
            case 'to-pay':
                $orderStatus = 'To Pay';
                break;
            case 'to-receive':
                $orderStatus = 'To Receive';
                break;
            case 'to-ship':
                $orderStatus = 'To Ship';
                break;
            case 'complete':
                $orderStatus = 'Complete';
                break;
            case 'pending':
                $orderStatus = 'Pending';
                break;
            default:
                $orderStatus = 'Unknown';
        }
    }

    $cart = isset($order['cart']) ? iterator_to_array($order['cart']) : [];

    $productIds = array_map(function($item) {
        return isset($item['id']) ? "#" . $item['id'] : 'N/A';
    }, $cart);
    $productIdsString = implode(', ', $productIds);

    $createdAt = isset($order['created_at']) ? $order['created_at'] : null;
    if ($createdAt instanceof MongoDB\BSON\UTCDateTime) {
        $createdAt = $createdAt->toDateTime();
    }

    $formattedDate = $createdAt ? $createdAt->format('d M Y (h:i a)') : 'N/A';

    if ($paymentMethod == 'COD') {
        // for COD, the total price is directly in the 'totalPrice' field
        $amount = isset($order['totalPrice']) ? $order['totalPrice'] : 0;
    } else {
        // For PayPal, it's in paymentDetails
        $amount = isset($order['paymentDetails']['purchase_units'][0]['amount']['value']) ?
                  $order['paymentDetails']['purchase_units'][0]['amount']['value'] : 0;
    }

    $paymentStatus = 'Paid';
    if ($paymentMethod == 'PayPal' && isset($order['paymentDetails']['purchase_units'][0]['payments']['captures'][0]['status'])) {
        $paymentStatus = $order['paymentDetails']['purchase_units'][0]['payments']['captures'][0]['status'];
    }

    // fallback image handler - to fix annoying images dir issues
    $imageUrl = isset($cart[0]['image']) ? "http://localhost:8000/assets/" . basename($cart[0]['image']) : 'http://localhost:8000/assets/ph.jpg'; // add fallback image here if you want

    $formattedOrder = [
        'id' => (string) $order['_id'],
        'image' => $imageUrl,
        'product_ids' => $productIdsString,
        'customer' => isset($order['username']) ? $order['username'] : 'Unknown',
        'date_time' => $formattedDate,
        'payment_method' => $paymentMethod,
        'status' => $orderStatus,
        'paymentStatus' => $paymentStatus,
        'amount' => $amount,
    ];

    $formattedOrders[] = $formattedOrder;
}

header('Content-Type: application/json');
echo json_encode($formattedOrders);
?>
