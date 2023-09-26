<?php
session_start();
if(!isset($_SESSION['email'])){
    session_destroy();
    header('location:login.php');
    exit;
}
include_once('db.php');


$con = db_conn();
$user_row = get_user_row($_SESSION['email']);
$user_mobile = $user_row['user_mobile'];
$order_no = $_GET['order_no'];
$query = "SELECT * FROM customer_order WHERE = $order_no";
$order_row = mysqli_fetch_assoc($orders_result);

$user_email = $user_row['user_email'];
$payment_for = "Online-Shopping";

$MERCHANT_KEY = "";
$our_payment_id = $order_no.'_'.time();

$query = "UPDATE customer_order SET order_payment_id = '$our_payment_id' WHERE order_no = '$order_no'";
$result = mysqli_query($con, $query);

$order_amount = get_order_amount($con, $order_no);

?>