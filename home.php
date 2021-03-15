<?php
  session_start();
  include("includes/functions.php");

  if ( !isset($_SESSION['user_email']) )
      header("location: index.php");
?>
<!doctype html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>
      <?php $user          =  $_SESSION['user_email'];
            $get_user      = "SELECT * FROM users WHERE user_email = '$user'";
            $run_user      =  mysqli_query($con, $get_user);
            $row           =  mysqli_fetch_array($run_user);
            $user_name     =  $row['user_name'];
            $pass          =  $row['user_pass'];
            $user_email    =  $row['user_email'];
            $first_name    =  $row['f_name'];
            $last_name     =  $row['l_name'];
            $user_gender   =  $row['user_gender'];
            $user_birthday =  $row['user_birthday'];
            $date_created  =  $row['user_reg_date'];
            $user_country  =  $row['user_country'];
            $decrypt       =  decrypt($pass);
            echo "<title> " . $first_name. " </title> "; ?>

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/second.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
  </head>

  <body oncontextmenu='return false' class='snippet-body'>

    <div class="dashboard-header">
      <nav class="navbar navbar-expand-lg bg-white fixed-top"> <a class="navbar-brand" href="#"><span><h4 class="animate__animated animate__swing animate__slower">Mar's Website</h4></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-right-top">
            <li class="nav-item">
              <div id="custom-search" class="top-search-bar"> <input class="form-control" type="text" placeholder="Search.."> </div>
            </li>
            <li class="nav-item dropdown nav-user"> <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://img.icons8.com/dusk/100/000000/user-female-circle.png" alt="" class="user-avatar-md rounded-circle"></a>
              <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                <div class="nav-user-info">
                  <h5 class="mb-0 text-white nav-user-name"> <?php echo $user_name; ?></h5>
                  <span class="status">password: </span><span class="ml-2"><?php echo   $decrypt; ?></span>
                </div>
                  <a class="dropdown-item" href="edit_account.php"><i class="fas fa-user mr-2"></i>Account</a>
                  <!---<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>-->
                  <a class="dropdown-item" href = "logout.php" onclick = "return confirm('Are you sure you want to Logout?')"><i class="fas fa-power-off mr-2"></i>Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>

  </body>

</html>
