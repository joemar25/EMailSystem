<?php

include("includes/connection.php");
include("includes/functions.php");

$check_email    = $_POST['check_email'];
$new_pass       = $_POST['new_pass'];
$re_pass        = $_POST['re_pass'];

$slect_password = "SELECT * FROM users WHERE user_email ='$check_email'";
$chk_pwd        =  mysqli_query($con, $slect_password);
$check_user = mysqli_num_rows($chk_pwd);

if ($check_user == 1) {
  if ( !(strlen($new_pass) < 8) && !(strlen($re_pass) < 8)) {
    if($new_pass == $re_pass){
      $encrypt = encrypt($re_pass);
      $run_updated_pwd  = "update users set user_pass='$encrypt' where user_email='$check_email'";
      $run_pwd  =  mysqli_query($con, $run_updated_pwd);
      echo "<script>alert('Update Sucessfully'); window.location='signin.php'</script>";
    } else {
      echo "<script>alert('Your new and Retype Password is not match'); window.location='forgot_password.php'</script>";
    }
  } else {
    echo "<script>alert('Your new and Retype Password should be minimum 8 characters!'); window.location='forgot_password.php'</script>";
  }
} else {
  echo"<script>alert('Your Email did not exist')</script>";
}

?>
