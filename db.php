<?php
function db_conn()
{
  $servername = 'localhost'; //localhost
  $username = 'root'; //root
  $password = ''; // ''
  $dbname = "gotrendy_db"; //grotrendy_db
  try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$conn) {
      // die('Could not Connect MySql Server:' .mysqli_error());
      die('Could not Connect MySql Server:');
    }

    return $conn;
  } catch (\Throwable $th) {
    die('Could not Connect MySql Server:' . mysqli_error($conn));
  }
}

function get_user_row($email)
{
  $result = mysqli_query(db_conn(), "SELECT * FROM user WHERE user_email LIKE '$email'");
  return mysqli_fetch_assoc($result);
}

function get_order_amount($con, $order_no)
{
  $query = "SELECT * FROM order_items WHERE order_items_of_order_no = $order_no";
  $result = mysqli_query($con, $query);
  $total = 0.0;
  while ($row = mysqli_fetch_assoc($result)) {
    $item_subtotal = ($row['order_item_qty'] * $row['order_item_price']);
    $total += $item_subtotal;
  }
  return number_format($total, 2, '.', '');
}
