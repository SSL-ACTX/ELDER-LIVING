<?php
require '../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$reviewCollection = $database->reviews;

// Check if a 'page' parameter is provided in the query string
$page = isset($_GET['page']) ? $_GET['page'] : '';

// If a page is provided, filter reviews by the 'page' field; otherwise, get all reviews
if ($page) {
    $reviews = $reviewCollection->find(['page' => $page])->toArray();
} else {
    // If no page is specified, fetch all reviews
    $reviews = $reviewCollection->find()->toArray();
}

// Set the response header to JSON
header('Content-Type: application/json');

// Return the reviews as a JSON response
echo json_encode($reviews);
?>
