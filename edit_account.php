<?php
  session_start();
  include("includes/functions.php");

  if ( !isset($_SESSION['user_email']) )
      header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Login System Using PHP">
  <meta name="author" content="Joemar">
  <meta name="keywords" content="Login System">

  <!-- Title Page-->
  <?php $user      =  $_SESSION['user_email'];
        $get_user  = "SELECT * FROM users WHERE user_email = '$user'";
        $run_user  =  mysqli_query($con, $get_user);
        $row       =  mysqli_fetch_array($run_user);
        $user_name     =  $row['user_name'];
        $pass          =  $row['user_pass'];
        $user_email    =  $row['user_email'];
        $first_name    =  $row['f_name'];
        $last_name     =  $row['l_name'];
        $user_gender   =  $row['user_gender'];
        $user_birthday =  $row['user_birthday'];
        $date_created  =  $row['user_reg_date'];
        $user_country  =  $row['user_country'];
        $decrypt   =  decrypt($pass);
        echo "<title> " . $user_name. " Account Information</title> "; ?>

  <!-- Icons font CSS-->
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>

  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
      <div class="wrapper wrapper--w680">
          <div class="card card-1">
              <div class="card-heading4"></div>
              <div class="card-body">
                  <h2 class="title"><span>Change Account Information</span></h2>
                  <form action="edit_account_confirmation.php" method="POST">
                    <div class="input-group">
                      <input id="u_name"type="text" placeholder="<?php echo $user_name; ?>" name="u_name">
                    </div>
                    <div class="row row-space">
                      <div class="col-2">
                        <div class="input-group">
                          <input id="f_name"type="text" placeholder="<?php echo $first_name; ?>" name="first_name">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="input-group">
                          <input type="text" type="text" placeholder="<?php echo $last_name; ?>" name="last_name">
                        </div>
                      </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                              <input id="birthday" class="input--style-1 js-datepicker" type="text" type="date" placeholder="<?php echo $user_birthday; ?>" name="u_birthday">
                              <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                      <select id="gender" name="u_gender">
                                        <option disabled>a</option>
                                        <option> <?php if ($user_gender == 'Female') { echo "Female"; } else { echo "Male";} ?> </option>
                                        <option> <?php if ($user_gender != 'Female') { echo "Female"; } else { echo "Male";} ?> </option>
                                        <option>Others</option>
                                      </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                          <select id="country" name="u_country">
                            <option disabled>Select your Country</option>
                            <?php foreach($countries as $i => $name) { if ($i == $user_country) { ?>
                                <option value=" <?php echo $i  ?> " selected> <?php echo $name  ?>  </option>';
                                <?php } else { echo '<option value="' . $i . '">' . $name . '</option>'; } } ?>
                          </select>
                        <div class="select-dropdown"></div>
                      </div>
                    </div>
                    <div class="col-2">
                        <label for="old_password">Change Password (Optional)</label> <br> <br>
                    </div>
                    <div class="input-group">
                      <input id="old_password" type="password" name="old_pass" placeholder="Old Password">
                    </div>
                    <div class="input-group">
                      <input type="password" name="new_pass" placeholder="New Password">
                    </div>
                    <div class="input-group">
                      <input type="password" name="re_pass" placeholder="Re-Type New Password">
                    </div>
                    <center>
                      <a href='home.php'><button class='btn btn--radius btn--green' type="button"> Back </button></a>
                      <button class="btn btn--radius btn--green" type="submit" name="confirm_edit"> Confirm </button>
                    </center>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/datepicker/moment.min.js"></script>
  <script src="vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="js/global.js"></script>

 </body>
</html>
