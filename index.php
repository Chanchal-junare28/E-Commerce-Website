<?php
 
  require_once('db.php');
  $con = db_conn();
  $cat_id = $_GET['cat_id'];
  $sub_cat_id = $_GET['sub_cat_id'];
  $product = "product_".$cat_id."".$sub_cat_id;
  $query = "SELECT * FROM ".$product." Where sub_category_id = '$sub_cat_id'";
  
  $result = mysqli_query($con, $query);
  
  print_r($result1);
 
  //echo $query;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="./img/lg1.png" sizes="16x16">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <title>Online Shopping Site for Fashion, Electronics, Home and More | Go Trendy</title>
  
  <link rel="stylesheet" href="./styles/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./styles/stylehomepage.css">
</head>
<body>
  <?php include_once('common_menu_bar.php');?>

    <div class="products products_sm products_lg">
      <?php
        if($result){
            while($current_row = mysqli_fetch_assoc($result)){
              echo '
              <div class="product product_sm product_lg">
              <a class="productlnk" href=product_details.php?cat_id='.$cat_id.'&sub_cat_id='.$sub_cat_id.'&product_id='.$current_row['product_id'].'>
              <img src="'.$current_row['product_image'].'" alt="Please Refresh"></a>
              <p>'.$current_row['product_name'].'</p>
              <p style="color:black;">Rs. '.$current_row['product_price'].'</p>
              <div id="rating">Free Delivery</div>
              <div id="rating">'.$current_row['product_ratings'].'</div>
                    </div>';
            }
        }else{
              echo '<h1>Something went wrong</h1>';
        }

      ?>
 
    </div>
    <?php include_once('common_footer.php');?>

</body>

</html>