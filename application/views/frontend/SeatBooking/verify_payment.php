<?php
require('vendor/autoload.php');
use Razorpay\Api\Api;

$keyId = "your_razorpay_key_id";
$keySecret = "your_razorpay_secret_key";
$api = new Api($keyId, $keySecret);

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$payment_id = $input['razorpay_payment_id'];
$order_id = $input['razorpay_order_id'];
$signature = $input['razorpay_signature'];

$generated_signature = hash_hmac('sha256', $order_id . "|" . $payment_id, $keySecret);

if ($generated_signature === $signature) {
    echo json_encode(["status" => "success", "message" => "Payment verified"]);
    // Update database: mark seat as booked
} else {
    echo json_encode(["status" => "error", "message" => "Payment verification failed"]);
}
?>
