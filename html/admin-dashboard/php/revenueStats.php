<?php
require '../../../connection/connection.php';

use MongoDB\Client;
// just to be sure
$client = new Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$ordersCollection = $database->orders;

// 12 months/1yr
$startOfYear = new MongoDB\BSON\UTCDateTime(strtotime('2024-01-01 00:00:00') * 1000);
$endOfYear = new MongoDB\BSON\UTCDateTime(strtotime('2025-01-01 00:00:00') * 1000);

// date range 24hrs
$startOfToday = new MongoDB\BSON\UTCDateTime(strtotime('today 00:00:00') * 1000);
$endOfToday = new MongoDB\BSON\UTCDateTime(strtotime('today 23:59:59') * 1000);

// aggregate orders
$revenuePipeline = [
    [
        '$match' => [
            'paymentStatus' => 'paid',
            'created_at' => [
                '$gte' => $startOfYear,
                '$lt' => $endOfYear
            ],
            'deliveryStatus' => ['$ne' => 'to-pay'] // exclude orders with deliveryStatus "to-pay"
        ]
    ],
    [
        '$project' => [
            'month' => ['$month' => '$created_at'],
            'year' => ['$year' => '$created_at'],
            'totalPrice' => ['$toDouble' => '$totalPrice']
        ]
    ],
    [
        '$group' => [
            '_id' => ['month' => '$month', 'year' => '$year'],
            'totalRevenue' => ['$sum' => '$totalPrice']
        ]
    ],
    [
        '$project' => [
            'month' => '$_id.month',
            'year' => '$_id.year',
            'revenue' => '$totalRevenue',
            '_id' => 0
        ]
    ]
];

$revenueResult = $ordersCollection->aggregate($revenuePipeline);
$monthlyRevenue = iterator_to_array($revenueResult);

$totalRevenue = 0;
foreach ($monthlyRevenue as $entry) {
    $totalRevenue += $entry['revenue'];
}

// counts total orders in 2024
$totalOrders = $ordersCollection->countDocuments([
    //'status' => 'paid',
    'created_at' => [
        '$gte' => $startOfYear,
        '$lt' => $endOfYear
    ],
    //'deliveryStatus' => ['$ne' => 'to-pay']
]);

// get customers
$totalCustomers = $ordersCollection->distinct('username', [
    'paymentStatus' => 'paid',
    'created_at' => [
        '$gte' => $startOfYear,
        '$lt' => $endOfYear
    ],
    'deliveryStatus' => ['$ne' => 'to-pay']
]);

// new customers, dur 24hrs
$newUsersTodayPipeline = [
    [
        '$match' => [
            'paymentStatus' => 'paid',
            'created_at' => [
                '$gte' => $startOfToday,
                '$lte' => $endOfToday
            ],
            'deliveryStatus' => ['$ne' => 'to-pay']
        ]
    ],
    [
        '$group' => [
            '_id' => '$username'
        ]
    ]
];

$newUsersTodayResult = $ordersCollection->aggregate($newUsersTodayPipeline);
$newUsersToday = iterator_to_array($newUsersTodayResult);
$newUsersCountToday = count($newUsersToday);

$data = [
    'monthlyRevenue' => $monthlyRevenue,
    'totalRevenue' => $totalRevenue,
    'totalOrders' => $totalOrders,
    'totalCustomers' => count($totalCustomers),
    'newUsersCountToday' => $newUsersCountToday,
];

header('Content-Type: application/json');
echo json_encode($data);
?>
