 <?php
session_start();
if(!isset($_SESSION['email'])){
    session_destroy();
    header('location:login.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
  <title>Online Shopping Site for Fashion, Electronics, Home and More | Go Trendy</title>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="./styles/cart_view.css">
  </head>
  <body>
 
  
    <!--Cart Section-->
    <section class="mt-5">
        <div class="container">
            <div class="cart">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"class="text-white">Sr.No.</th>
                            <th scope="col"class="text-white">Product</th>
                            <th scope="col"class="text-white">Price</th>
                            <th scope="col"class="text-white">Quantity</th>
                            <th scope="col"class="text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                       


<?php
include_once('db.php');


$con = db_conn();
$user_row = get_user_row($_SESSION['email']);
$user_mobile = $user_row['user_mobile'];


$srno = 0;
$cart_total = 0;
$query1 = "SHOW TABLES FROM gotrendy_db  LIKE '%product_%'";
  $result1 = mysqli_query($con, $query1);
  while ($row = mysqli_fetch_row($result1)) {
    $query = "SELECT * FROM $row[0] INNER JOIN cart ON 
    $row[0].product_id LIKE cart.cart_product_id
    WHERE cart_mobile_no = '$user_mobile'";
    
    $result = mysqli_query($con, $query);


    while($current_row = mysqli_fetch_assoc($result)){
        $cart_total += ($current_row['product_price']*$current_row['cart_qty']);
        $srno++;
        echo '
        <tr>
        <td>'.$srno.'</td>
        <td>
            <div class="main">
                <div class="d-flex">
 <!--W=145 H=98--> <img width=145 height=150 src="'.$current_row['product_image'].'"alt="">
                </div>
                <div class="des">
                    <p>'.$current_row['product_name'].'</p>
                </div>
            </div>
        </td>
        <td>
            <h6>'.$current_row['product_price'].'</h6>
        </td>
        <td>
            <div class="counter">
            '.$current_row['cart_qty'].'
            </div>
        </td>
        <td>
            <h6>Rs '.($current_row['product_price']*$current_row['cart_qty']).'</h6>
        </td>
    </tr>
        ';
    }
 }
?> 



<?php

$shipping_charges = 80;
$cart_total += $shipping_charges;

            echo'        </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
            <ul>
                <li class="subtotal">Delivery Charges
                    <span>Rs '.$shipping_charges.'</span>
                </li>
                <li class="cart-total">Total
                <span>Rs '.$cart_total.'</span></li>
            </ul>
        ';
    ?>
    
   
        
    <form action="checkout.php" method="post" accept-charset="utf-8">  
    <h2>Delivery Address: </h2>

        <textarea name="order_address" placeholder="Enter Delivery Address" rows="5" name="comment[text]" 
            id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" 
            aria-autocomplete="list" aria-haspopup="true" required>
        </textarea>
        <input type="submit" name="submit" class="proceed-btn" value="Proceed To Checkout">
    </form>
    </div>
     </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
 
    </body>
</html>