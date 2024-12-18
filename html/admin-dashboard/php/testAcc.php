<?php
require '../../../connection/connection.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Elder_Living;
$adminCollection = $database->selectCollection('admin');

$adminUsername = "testacc";
$plainPassword = "1234";
$email = "123@test.com";
$otp = 999999;

$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

$account = [
    "password" => $hashedPassword,
    "adminUsername" => $adminUsername,
    "verified" => true,
    "loginStatus" => true,
    "otp" => $otp,
    "lastLogin" => "",
    "email" => $email
];

try {
    $insertResult = $adminCollection->insertOne($account);

    echo "Account inserted successfully.<br>";
    echo "Inserted Account Details:<br>";
    echo "Admin Username: " . $adminUsername . "<br>";
    echo "Email: " . $email . "<br>";
    echo "OTP: " . $otp . "<br>";
    echo "Verification Status: " . ($account['verified'] ? "Verified" : "Not Verified") . "<br>";
    echo "Login Status: " . ($account['loginStatus'] ? "Active" : "Inactive") . "<br>";
    echo "Last Login: " . ($account['lastLogin'] ?: "N/A") . "<br>";
    echo "Inserted ID: " . $insertResult->getInsertedId() . "<br>";
} catch (Exception $e) {
    echo "Error inserting account: " . $e->getMessage();
}
?>
