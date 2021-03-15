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
  <title>Sign In</title>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

  <body>


    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading3"></div>
                <div class="card-body">
                    <h2 class="title"><span><a class="link_home" href="index.php">Mar's</a> Login System : Login<span></h2>
                    <form action="login.php" method="POST">

                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group">
                            <input type = "email" name = "email" placeholder = "Email" required = "required" >
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group">
                            <input type = "password" name = "pass" placeholder = "Password" required = "required" >
                          </div>
                        </div>
                      </div>
                      <center>
                        <div class="p-t-20">
                            <h6 class="animate__animated animate__rubberBand animate__infinite	infinite  animate__slow"><a class="forgot"  title = "Reset Password" href = "forgot_password.php"> Forgot Password? </a>
                            </h6>
                            <br>
                            <a class="dont_have_acc"  title = "Create Account!" href = "signup.php"> Don't have an account? </a>
                        </div>
                        <div class="p-t-20">
                          <button id = "signin" class="btn btn--radius btn--green" type="submit" name = "login"> Login </button>
                        </div>
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
