<?php

require_once('db.php');
$conn = db_conn();
if(isset($_POST['submit'])){

   $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
   $lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
   $signupaddress = mysqli_real_escape_string($conn, $_POST['signupaddress']);  
   $pass = $_POST['password'];
   $cpass = $_POST['password2'];
   $user_type = $_POST['user_type'];
   $select = " SELECT * FROM user WHERE user_email = '$email' && user_password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';
   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user(user_first_name, user_last_name, user_email, user_mobile, user_address, user_password, user_type) VALUES('$firstname', '$lastname', '$email', '$mobile', '$signupaddress', '$pass', '$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>





<!doctype html>
<html>
	<head>

    <link rel="icon" href="./img/lg1.png" sizes="16x16">
	<link rel="stylesheet" href="./styles/style2login.css">
	</head>
	<body>
			<div class="wrapper">
			
				<div class="title-text">
				<div class="title login">Sign Up</div>
				</div>
					<div class="form-container">
						<div class="form-inner">
							<form method="post" action="signup.php">
							<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
								<div class="field">

									<input name="first_name" id="first_name" placeholder="First Name" required="required"  type="text"  >

								</div>
								<div class="field">

									<input name="last_name" id="last_name" placeholder="Last Name" required="required"  type="text" >

								</div>
								<div class="field">

									<input name="email" placeholder="Enter Your Email" required="required"  type="email"  >

								</div>
								<div class="field">

									<input name="mobile" placeholder="Enter Your Mobile" required="required" type="text">

								</div>
								<div class="field">

									<input name="signupaddress" placeholder="Write Your Full Address" required="required"  type="text">

								</div>
								<div class="field">

									<input name="password" id="password-1" required="required"  placeholder="Enter New Password"  type="password">

								</div>
								<div class="field">

									<input name="password2" id="password-2" required="required"  placeholder="Enter Confirm Password"  type="password">

								</div>
								<div class="field btn">
								<input type="hidden" id="user_type" name="user_type" value="user">
								<div class="btn-layer"></div>
									<input name ="submit" type="submit">
								</div>
								<div class="signup-link">Already have an account ? <a href="login.php">Login</a></div>
								<div class="signup_error_msg"></div>

							</form>

						</div>
					</div>
				</div>
			</div>
	</body>
</html>