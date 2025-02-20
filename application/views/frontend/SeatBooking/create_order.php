<?php
require('vendor/autoload.php');
use Razorpay\Api\Api;

$keyId = "rzp_test_Hs4FpdUrKOz3v0";
$keySecret = "ZsFwF1EDty5ix2PkMNzvXYCv";
$api = new Api($keyId, $keySecret);

// Get data from frontend
$data = json_decode(file_get_contents('php://input'), true);
$eventId = $data['eventId'];
$amount = $data['amount'];

$orderData = [
    'receipt'         => 'order_rcptid_' . rand(1000, 9999),
    'amount'          => $amount, // Amount in paise
    'currency'        => 'INR',
    'payment_capture' => 1
];

$order = $api->order->create($orderData);

echo json_encode(['orderId' => $order['id']]);
?>

