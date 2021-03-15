<?php

  session_start();
  include("includes/functions.php");

  if ( !isset($_SESSION['user_email']) )

  header("location: index.php");

  if( isset( $_POST['confirm_edit'] ) ) {

    $user           =  $_SESSION['user_email'];

    $new_username   =   $_POST['u_name'];
    $new_first_name =  $_POST['first_name'];
    $new_last_name    =  $_POST['last_name'];
    $new_user_country =  $_POST['u_country'];
    $new_user_gender      =  $_POST['u_gender'];
    $new_user_birthday      =  $_POST['u_birthday'];
    $old_pass       =  $_POST['old_pass'];
    $new_pass       =  $_POST['new_pass'];
    $re_pass        =  $_POST['re_pass'];

    if( strlen(trim($_REQUEST['old_pass'])) == 0 && (strlen(trim($_REQUEST['new_pass'])) == 0 && strlen(trim($_REQUEST['re_pass'])) == 0)) {

    } else {
      $encrypt = encrypt($old_pass);

      $select_password = "SELECT * FROM users WHERE user_pass ='$encrypt'";
      $chg_pwd        =  mysqli_query($con, $select_password);
      $chg_pwd1       =  mysqli_fetch_array($chg_pwd);
      $data_pwd       =  $chg_pwd1['user_pass'];

      if ( !(strlen($new_pass) < 8) && !(strlen($re_pass) < 8) ) {
        if ( ($new_pass != $old_pass) && ($re_pass != $old_pass) ) {
          if( $new_pass == $re_pass ){
            if( $data_pwd == encrypt($old_pass) ){
              $encrypt = encrypt($new_pass);
              $run_updated_pwd  = "update users set user_pass='$encrypt' where user_email='$user'";
              $run_pwd  =  mysqli_query($con, $run_updated_pwd);
              echo "<script>alert('Password Sucessfully Updated'); window.location='home.php'</script>";
            } else {
              echo "<script>alert('Your old password is wrong'); window.location='edit_account.php'</script>";
            }
          } else {
            echo "<script>alert('Your new and Retype Password is not match'); window.location='edit_account.php'</script>";
          }
        } else {
          echo "<script>alert('Your new password cannot be the same as the old password'); window.location='edit_account.php'</script>";
        }
      } else {
        echo "<script>alert('Your new and Retype Password should be minimum 8 characters!'); window.location='edit_account.php'</script>";
      }
    }

    if ( strlen(trim($_REQUEST['u_name'])) == 0 ) {
      echo "<script>window.location='edit_account.php'</script>";
    } else {
      $run  = "update users set user_name='$new_username' where user_email='$user'";
      $run  =  mysqli_query($con, $run);

    }

    if ( strlen(trim($_REQUEST['first_name'])) == 0 ) {
      echo "<script>window.location='edit_account.php'</script>";
    } else {
      $run  = "update users set f_name='$new_first_name' where user_email='$user'";
      $run  =  mysqli_query($con, $run);

    }

    if ( strlen(trim($_REQUEST['last_name'])) == 0 ) {
      echo "<script>window.location='edit_account.php'</script>";
    } else {
      $run  = "update users set l_name='$new_last_name' where user_email='$user'";
      $run  =  mysqli_query($con, $run);

    }

    if ( strlen(trim($_REQUEST['u_country'])) == 0 ) {
      echo "<script>window.location='edit_account.php'</script>";
    } else {
      $run  = "update users set user_country='$new_user_country' where user_email='$user'";
      $run  =  mysqli_query($con, $run);

    }

    if ( strlen(trim($_REQUEST['u_gender'])) == 0 ) {
      echo "<script>window.location='edit_account.php'</script>";
    } else {
      $run  = "update users set user_gender='$new_user_gender' where user_email='$user'";
      $run  =  mysqli_query($con, $run);
    }

    if ( strlen(trim($_REQUEST['u_birthday'])) == 0 ) {
      echo "<script>window.location='edit_account.php'</script>";
    } else {
      $run  = "update users set user_birthday='$new_user_birthday' where user_email='$user'";
      $run  =  mysqli_query($con, $run);
    }


    //!isset($_REQUEST['old_pass']) ||

    // end note   echo "<script>alert('Update Sucessfully'); window.location='home.php'</script>";

  }

?>
