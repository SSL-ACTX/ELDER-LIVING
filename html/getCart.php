<?php
require '../connection/connection.php';

$cartItems = $cartCollection->find()->toArray();

echo json_encode($cartItems);
?>
