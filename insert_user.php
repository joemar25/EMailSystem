<?php

include("includes/connection.php");
include("includes/functions.php");

if ( isset($_POST['sign_up']) ) {

    $first_name           =   htmlentities(mysqli_real_escape_string($con, $_POST['first_name']));
    $last_name            =   htmlentities(mysqli_real_escape_string($con, $_POST['last_name']));
    $pass                 =   htmlentities(mysqli_real_escape_string($con, $_POST['u_pass']));
    $email                =   htmlentities(mysqli_real_escape_string($con, $_POST['u_email']));
    $country              =   htmlentities(mysqli_real_escape_string($con, $_POST['u_country']));
    $gender               =   htmlentities(mysqli_real_escape_string($con, $_POST['u_gender']));
    $birthday             =   htmlentities(mysqli_real_escape_string($con, $_POST['u_birthday']));
    $newgid               =   sprintf('%05d', rand(0, 999999));
    $username             =   strtolower($first_name . "_" . $last_name . "_" . $newgid);
    $check_username_query =  "select user_name from users where user_email='$email'";
    $run_username         =   mysqli_query($con, $check_username_query);
    $encrypt              =   encrypt($pass);

    if (strlen($pass) < 8) { echo"<script>alert('Password should be minimum 8 characters!')</script>"; exit(); }
    if(!filter_var($_POST['u_email'], FILTER_VALIDATE_EMAIL)) { exit('Invalid email address'); }

    $select = mysqli_query($con, "SELECT `user_email` FROM `users` WHERE `user_email` = '".$_POST['u_email']."'") or exit(mysqli_error($con));

    if(mysqli_num_rows($select)) {

      echo "<script>alert('Email already exist, Please try using another email')</script>";
      echo "<script>window.open('signup.php', '_self')</script>";
      exit();

    }

    $insert = "insert into users (f_name, l_name, user_name, user_pass, user_email, user_country, user_gender, user_birthday, user_reg_date) values ('$first_name', '$last_name', '$username',"
            . "'$encrypt', '$email', '$country', '$gender', '$birthday', NOW())";
    $query = mysqli_query($con, $insert);

    if ( $query ) {

        echo "<script>alert('Well Done $first_name, you are good to go!')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
        echo "<script>window.print(mysql_errno($link))</script>";

    } else {

        echo "<script>alert('Registration failed, please try again!')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";

    }
}
?>
