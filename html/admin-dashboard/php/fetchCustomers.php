<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;

$usersCollection = $database->users;
$ordersCollection = $database->orders;

$users = $usersCollection->find();
$userArray = iterator_to_array($users);

$customerData = [];

foreach ($userArray as $user) {
    $totalSpent = 0;

    // Find all orders for the user
    $orders = $ordersCollection->find(['username' => $user['username']]);

    // Iterate over each order and sum the total spent
    foreach ($orders as $order) {
        if (isset($order['paymentDetails']['purchase_units'][0]['amount']['value'])) {
            $totalSpent += (float)$order['paymentDetails']['purchase_units'][0]['amount']['value'];
        }
    }

    // Prepare user data to be outputted
    $customerData[] = [
        'name' => isset($user['username']) ? $user['username'] : 'Unknown',
        'email' => isset($user['email_phone']) ? $user['email_phone'] : 'No email',
        'phone' => isset($user['phone']) ? $user['phone'] : 'No phone',
        'spent' => '₱ ' . number_format($totalSpent, 2),
        'profile_image' => isset($user['profile_image']) ? $user['profile_image'] : '/assets/profile.png'
    ];
}

header('Content-Type: application/json');
echo json_encode($customerData);
?>
