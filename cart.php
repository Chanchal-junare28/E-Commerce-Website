<?php
include_once('db.php');
$cat_id = $_POST['cat_id'];
$sub_cat_id = $_POST['sub_cat_id'];
$product = $_POST['product'];
$product_id = $_POST['product_id'];
$product_qty = $_POST['product_qty'];
$product_qty = intval($product_qty);
$con = db_conn();
 session_start();
 if(isset($_SESSION['email'])){

    $user_row = get_user_row($_SESSION['email']);
    $user_mobile = $user_row['user_mobile'];
    $query = "SELECT * FROM cart WHERE cart_mobile_no LIKE '$user_mobile' AND cart_product_id = $product_id";
    $result = mysqli_query($con, $query);
    if($result){
        if(mysqli_num_rows($result) > 0){
            $query = "UPDATE cart SET cart_qty = cart_qty + $product_qty 
            WHERE cart_mobile LIKE '$user_mobile' AND cart_product_id = '$product_id'";
            $result = mysqli_query($con, $query);
            header('location:cart_view.php');
            exit;
        }else{
            $query = "INSERT INTO cart (cart_mobile_no, cart_product_id, cart_qty) 
            VALUES ('$user_mobile', '$product_id', '$product_qty')";
            $result = mysqli_query($con, $query);
            header('location:cart_view.php');
            exit;
        }
    }
 }else{
     session_destroy();
     header('location:login.php');
 }

?>