<?php

require_once('db.php');


$conn = db_conn();

$error[] = "";
if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
   
   $select = " SELECT * FROM user WHERE user_email = '$email' && user_password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
        session_start();
         $_SESSION['email'] = $email;
         header('location:product.html');
         exit();

      }else if(($row['user_type'] == 'user' && $row['user_password'] == $pass)){
        session_start();
         
         $_SESSION['email'] = $email;
         header('location:index.php?cat_id=1&sub_cat_id=1');
         exit();

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }
  

   

};
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="./img/lg1.png" sizes="16x16">
    <link rel="stylesheet" href="./styles/style2login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login</div>
      </div>
      <div class="form-container">
      
        <div class="form-inner">
          <form action="login.php" class="login" method="post">
          <?php
          if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
          };
          ?>
            <div class="field">
              <input name="email" type="text" placeholder="Email Address" required>
            </div>
            <div class="field">
              <input name="password" type="password" placeholder="Password" required>
            </div>
            
            <div class="pass-link"><a href="#">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input name ="submit" type="submit" value="submit">
            </div>
            <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>

          </form>
          
        </div>
      </div>
    </div>

    

  </body>
</html>
