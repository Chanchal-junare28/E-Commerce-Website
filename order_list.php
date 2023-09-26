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
                            <th scope="col"class="text-white">Order ID.</th>
                            <th scope="col"class="text-white">Date</th>
                            <th scope="col"class="text-white">Payment Status</th>
                            <th scope="col"class="text-white"></th>
                            <th scope="col"class="text-white"></th> 
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

    $query = "SELECT * FROM customer_order
    WHERE order_for_mobile = '$user_mobile'";
    
    $result = mysqli_query($con, $query);

    while($current_row = mysqli_fetch_assoc($result)){
        $cart_total += ($current_row['product_price']*$current_row['cart_qty']);
        $srno++;
        $orderno = $current_row['order_no'];
        echo '
        <tr>
      
        <td>
            <h6>'.$current_row['order_no'].'</h6>
        </td>
        <td>
            <h6>'.$current_row['order_date'].'</h6>
        </td>
        <td>
            <h6>'.$current_row['order_payment_status'].'</h6>
        <td><td>';
        if($current_row['order_payment_status'] == 'Success'){
            echo '<h6> PAYMENT SUCCESS. ORDER PLACED.</h6>';
        }else{
            echo '<a  href = "initiate_payment.php?order_no='.$orderno.'"  >Pay the Amount </a>' ;
        }


   echo '</td> </tr>
        ';
    }
 
?> 



<?php


            echo'        </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>';
   ?>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  -->
 
</body>
</html>