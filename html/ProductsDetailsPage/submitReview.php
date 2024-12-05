<?php
session_start();
require '../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$reviewCollection = $client->Elder_Living->reviews;

// Get data from session and form submission
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$email_phone = $_SESSION['email_phone'];
$review_date = date("Y-m-d H:i:s");
$rating = $_POST['rating']; // 11 is 1 star, 15 is 5 stars. 11-15
$review_headline = $_POST['review_headline'];
$customer_review = $_POST['customer_review'];
$image_url = "";

// Get the page (product or page name) from the request
$page = isset($_POST['page']) ? $_POST['page'] : '';

// If page is not provided, return an error
if (empty($page)) {
    echo json_encode(['status' => 'error', 'message' => 'Page name is missing']);
    exit;
}

// Handle the file upload for review image
if (isset($_FILES['review_image']) && $_FILES['review_image']['error'] == 0) {
    $upload_dir = '../../uploads/reviews/';
    $file_name = basename($_FILES['review_image']['name']);
    $target_path = $upload_dir . $file_name;

    // Try to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['review_image']['tmp_name'], $target_path)) {
        $image_url = $target_path;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to upload image']);
        exit;
    }
}

// Insert the review into the MongoDB collection
$insertResult = $reviewCollection->insertOne([
    'username' => $username,
    'name' => $name,
    'email_phone' => $email_phone,
    'review_date' => $review_date,
    'rating' => $rating,
    'review_headline' => $review_headline,
    'customer_review' => $customer_review,
    'image_url' => $image_url,
    'page' => $page // Store the page name in the review document
]);

// Respond based on the insert result
if ($insertResult->getInsertedCount() == 1) {
    echo json_encode(['status' => 'success', 'message' => 'Review submitted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to submit review']);
}
?>
