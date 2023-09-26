<div id="navBar">
  <ul class="NavBarTop" id="navv">
    <!-- <li class="navbarlogo" id="westernWomen">
    <img width=70 height= 70 src="./img/logo.png">
    </li> -->

    <a href='#' style='text-decoration: none;'>
      <li class='NavBarListTop' id='electronics'>
        Go-Trendy
      </li>
    </a>


    <?php
    session_start();
    if (isset($_SESSION['email'])) {
      $user_row = get_user_row($_SESSION['email']);
      //echo "Hello, ".$user_row['user_first_name']." ".$user_row['user_last_name'];
      echo "<a href='logout.php' style='text-decoration: none;float:right;'>
            <li class='NavBarListTop' id='electronics'>
              Logout
            </li>
          </a>
          
          <a href='order_list.php' style='text-decoration: none;float:right;'>
            <li class='NavBarListTop' >
              My Orders
            </li>
          </a>
          
          <a href='cart_view.php' style='text-decoration: none;float:right;'>
            <li class='NavBarListTop' >
            <i class='fa fa-shopping-cart'></i>
            </li>
          </a>

          <a href='#' style='text-decoration: none;float:right;'>
          <li class='NavBarListTop' >
         ";
      echo "Hello, " . $user_row['user_first_name'] . " " . $user_row['user_last_name'];
      " </li>
        </a>
          ";
      //   <li class='NavBarListTop' style='float:right;'>
      //   ";echo "Hello, ".$user_row['user_first_name']." ".$user_row['user_last_name'];

      //  " </li>


    } else {
      echo "<a href='login.php' style='text-decoration: none;float:right;'>
            <li class='NavBarListTop' >
              Login
            </li>
          </a>";
      session_destroy();
    }
    ?>

  </ul>
</div>
<div id="navBar">
  <ul class="NavBar ">
 
  <li class="NavBarList" id="westernWomen">
      <img class="logo" src="./img/hmp/women.png">
      <span>Western Women</span>
      <div class="content" id="westernWomenContent">
        <a href="index.php?cat_id=1&sub_cat_id=1">Dresses</a>
        <a href="index.php?cat_id=1&sub_cat_id=2">Tops</a>
        <a href="#Sweaters">Sweaters</a>
        <a href="#jeans">Jeans</a>
        <a href="#plazzos">Plazzos</a>
        <a href="#skirts">Skirts</a>
      </div>
    </li>
    <li class="NavBarList" id="kids">
      <img class="logo" src="./img/hmp/child.png">
      <span>Kids</span>
      <div class="content" id="kidsContent">
        <a href="index.php?cat_id=2&sub_cat_id=1">Soft Toys</a>
        <a href="index.php?cat_id=2&sub_cat_id=2">Dresses</a>
        <a href="index.php?cat_id=2&sub_cat_id=3">Footwear</a>
      </div>
    </li>
    <li class="NavBarList" id="men">
      <img class="logo" src="./img/hmp/men.png">
      <span>Men</span>
      <div class="content" id="mensContent">
        <a href="index.php?cat_id=3&sub_cat_id=1">Tshirts & Shirts</a>
        <a href="index.php?cat_id=3&sub_cat_id=2">Jeans</a>
        <a href="#index.php?cat_id=3&sub_cat_id=3">Trousers</a>
        <a href="index.php?cat_id=3&sub_cat_id=4">Men Kurtas</a>
        <a href="#index.php?cat_id=3&sub_cat_id=5">Track Pants</a>
      </div>
    </li>

    <li class="NavBarList" id="beautyHealth">
      <img class="logo" src="./img/hmp/beuty.png">
      <span>Beauty & Health</span>
      <div class="content" id="beautyHealthContent">
        <a href="#index.php?cat_id=4&sub_cat_id=1">Face </a>
        <a href="index.php?cat_id=4&sub_cat_id=2">Eyes</a>
        <a href="#index.php?cat_id=4&sub_cat_id=3">Lips</a>
        <a href="#index.php?cat_id=4&sub_cat_id=4">Nails</a>
        <a href="#index.php?cat_id=4&sub_cat_id=5">Sanitizers</a>
      </div>
    </li>
    <li class="NavBarList" id="sarees">
      <img class="logo" src="./img/hmp/saree.png">
      <span>Sarees</span>
      <div class="content" id="sareesContent">
        <a href="#index.php?cat_id=5&sub_cat_id=1">Paithni</a>
        <a href="#index.php?cat_id=5&sub_cat_id=2">Kolhapuri Saree</a>
        <a href="#index.php?cat_id=5&sub_cat_id=3">Designer Saree</a>
        <a href="#index.php?cat_id=5&sub_cat_id=4">Party Wear</a>
      </div>
    </li>


    <li class="NavBarList" id="homeKitchen">
      <img class="logo" src="./img/hmp/home.png">
      <span>Home & Kitchen</span>
      <div class="content" id="homeKitchenContent">

        <a href="index.php?cat_id=6&sub_cat_id=1">Bedsheets</a>
        <a href="#index.php?cat_id=6&sub_cat_id=2">Doormats</a>
        <a href="#index.php?cat_id=6&sub_cat_id=3">Curtains</a>
      </div>
    </li>
    <li class="NavBarList" id="jwellery">
      <img class="logo" src="./img/hmp/jwellery.png">
      <span>Jwellery</span>
      <div class="content" id="jwelleryContent">
        <a href="#index.php?cat_id=7&sub_cat_id=1">Neckles</a>
        <a href="index.php?cat_id=7&sub_cat_id=2">Bangles</a>
        <a href="index.php?cat_id=7&sub_cat_id=3">Earrings</a>
        <a href="index.php?cat_id=7&sub_cat_id=4">Rings</a>

      </div>
    </li>

    <li class="NavBarList" id="electronics">
      <img class="logo" src="./img/hmp/device.png">
      <span>Electronics</span>
      <div class="content" id="electronicsContent">
        <a href="#index.php?cat_id=8&sub_cat_id=1">Mobile</a>
        <a href="#index.php?cat_id=8&sub_cat_id=2">Laptop</a>
        <a href="#index.php?cat_id=8&sub_cat_id=3">Camera</a>
      </div>
    </li>

  </ul>
</div>
<hr>