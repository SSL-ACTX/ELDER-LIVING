<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$ordersCollection = $database->orders; // Assuming "orders" is the collection name

// Fetch all orders
$orders = $ordersCollection->find();

// Convert the result to an array
$orderArray = iterator_to_array($orders);

// Process each order to format the response
$formattedOrders = [];

foreach ($orderArray as $order) {
    // Smartly detect payment method
    $paymentMethod = 'COD'; // Default to COD
    if (isset($order['paymentDetails']['purchase_units'][0]['payments']['captures'][0]['id'])) {
        $paymentMethod = 'PayPal'; // If PayPal capture exists, it's PayPal
    }

    // Determine order status based on deliveryStatus
    $orderStatus = 'Completed'; // Default status
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

    $cart = iterator_to_array($order['cart']);

    $productIds = array_map(function($item) {
        return "#" . $item['id'];
    }, $cart);
    $productIdsString = implode(', ', $productIds);

    $createdAt = $order['created_at']; // to prevent bson json format err

    if ($createdAt instanceof MongoDB\BSON\UTCDateTime) {
        $createdAt = $createdAt->toDateTime();
    }

    $formattedDate = $createdAt->format('d M Y (h:i a)');

    if ($paymentMethod == 'COD') {
        // for COD, the total price is directly in the 'totalPrice' field
        $amount = $order['totalPrice'];
    } else {
        // For PayPal, it's in paymentDetails
        $amount = isset($order['paymentDetails']['purchase_units'][0]['amount']['value']) ?
                  $order['paymentDetails']['purchase_units'][0]['amount']['value'] : 0;
    }

    $formattedOrder = [
        'id' => (string) $order['_id'],
        'image' => $cart[0]['image'],
        'product_ids' => $productIdsString,
        'customer' => $order['username'],
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
