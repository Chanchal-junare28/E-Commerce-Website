<?php
$delivery_address = $_POST['order_address'];
$date = date('y-m-d');
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
$order_payment_status = "Pending";
$order_payment_id = 234;
$query = "INSERT INTO customer_order(
    
    order_date,
    order_for_mobile,
    order_address,
    order_payment_id
)
VALUES(
    '$date',
    '$user_mobile',
    '$delivery_address',
    '$order_payment_id'
)";

$result = mysqli_query($con, $query);

if($result){
    $new_order_no = mysqli_insert_id($con);
  
     $query1 = "SHOW TABLES FROM gotrendy_db  LIKE '%product_%'";
     $result1 = mysqli_query($con, $query1);
     while ($row = mysqli_fetch_row($result1)) {
        
        $query = "SELECT * FROM $row[0] INNER JOIN cart ON 
        $row[0].product_id = cart.cart_product_id
        WHERE cart_mobile_no = '$user_mobile'";
        
        $result = mysqli_query($con, $query);
        while($item_row = mysqli_fetch_assoc($result)){
            $query_insert = "INSERT INTO order_items(
   
                order_items_of_order_no,
                order_item_pid,
                order_item_price,
                order_item_qty
            )
            VALUES(
                '$new_order_no',
                '".$item_row['cart_product_id']."',
                '".$item_row['product_price']."',
                '".$item_row['cart_qty']."'
            )";
           $result_item = mysqli_query($con, $query_insert);
        }

        
    }
    $query = "DELETE FROM cart WHERE cart_mobile_no = '$user_mobile'";
    $result = mysqli_query($con, $query);
    header('location:order_view.php?order_no='.$new_order_no.'&code=Order_Placed');
    exit();

}
header('location:cart_view.php?code=order_error');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $query;?>
</body>
</html>