<?php
   require_once('db.php');
   $con = db_conn();
   $cat_id = $_GET['cat_id'];
  $sub_cat_id = $_GET['sub_cat_id'];
   $product = 'product_'.$cat_id.''.$sub_cat_id;
   $product_id = $_GET['product_id'];
    $query = "SELECT * FROM $product WHERE product_id = '$product_id'";
    $result = mysqli_query($con, $query); 
    $row_product = mysqli_fetch_assoc($result);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="./img/lg1.png" sizes="16x16">
  <title>Online Shopping Site for Fashion, Electronics, Home and More | Go Trendy</title>
  
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/stylehomepage.css">
</head>
<body>

  <?php include_once('common_menu_bar.php');?>
  

<div class="pro">
  <div class="img_detail">
    <img src="<?php echo $row_product['product_image']?>" alt="">
  </div>    
       
  <div id="services" class="services section-bg">
    <div class="container-fluid">
    
          
            <div class="_product-detail-content">
              <p class="_p-name"><?php echo $row_product['product_name']?></p>
              <div class="_p-price-box">
                  <div class="p-list">
                    <span> M.R.P. : <i class="fa fa-inr"></i> <del> 1399  </del>   </span>
                    <span class="price"> Rs. <?php echo $row_product['product_price'];?></span>
                  </div>
                 
                  <div class="_p-features">
                    <span> Description About this product:- </span>
                    <p>
                      <strong>Product Name:</strong> Latest Kids Plush Pillow
                      <br>
                      <strong>Brand:</strong> ABA
                      <br>
                      <strong>Color:</strong> ABA
                      <br>
                      <strong> Net Quantity (N):</strong> 1
                      <br>
                      <strong>Country of Origin:</strong> India
                   </p>                    
                  </div>
                  <form action="cart.php" method="post" accept-charset="utf-8">
                  <div class="_p-add-cart">
                    <div class="_p-qty">
                        <span>Add Quantity</span>
                         <select name= "product_qty">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                         </select>
                     </div>
                  </div>
                    <ul class="spe_ul"></ul>
                    <div class="_p-qty-and-cart">
                        <div class="_p-add-cart">
                          <button class="btn-theme btn buy-btn" tabindex="0">
                          <i class="fa fa-shopping-cart"></i> Buy Now
                          </button>

                          <input type="hidden" name="cat_id" value="<?php echo $cat_id;?>" />
                          <input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id;?>" />
                          <input type="hidden" name="product_id" value="<?php echo $product_id;?>" />

                          <input type="hidden" name="product" value="<?php echo $product;?>" />
                          <button type="submit" class="btn-theme btn btn-success" tabindex="0">
                          <i class="fa fa-shopping-cart"></i> Add to Cart
                          </button>   
                        </div>
                    </div>
                  </form>
              </div>
            </div>
    </div>
  </div>


</div>

<?php include_once('common_footer.php');?>

</body>

</html>