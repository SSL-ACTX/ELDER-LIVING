<?php 
require __DIR__ . '../../vendor/autoload.php'; 

$client = new MongoDB\Client; 
$collection = $client->Elder_Living->users;
$cartCollection = $client->Elder_Living->carts;
$orderCollection = $client->Elder_Living->orders;
$adminCollection = $client->Elder_Living->admin;
$adminStatsCollection = $client->Elder_Living->adminStats;
$reviewCollection = $client->Elder_Living->reviews;
$productCollection = $client->Elder_Living->products;

?>
