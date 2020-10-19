<?php
session_start();
$msg_success = '';
$msg_error = '';
if(isset($_SESSION['msg_success'])){
  $msg_success = $_SESSION['msg_success'];
}
if(isset($_SESSION['msg_error'])){
  $msg_error = $_SESSION['msg_error'];
}

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  
  <title>Femen Life</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/mlm.css" rel="stylesheet">
  <style type="text/css">
   

      .img-responsive {
          display: none;
        } 
      
        @media only screen and (max-device-width: 480px) {
      .img-responsive {
        display: block;
      }
      
    }
    
  </style>
<style>
body {
  background-image: url('h1_hero.png');
  background-repeat: no-repeat;
}
</style>
</head>

<body class="bg-gradient-primary" >

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="margin-top: 10%;"><img src="img/logo.JPG" style="width:100%;"></div>
               <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img class="img-responsive" src="img/logo.JPG" style="width:100%;" >
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <?php 

                      if($msg_success!='')
                      {
                          echo '<div class="alert alert-success" role="alert">';
                          echo $msg_success;
                          echo '</div>';
                      }
                      if($msg_error!='')
                      {
                          echo '<div class="alert alert-danger" role="alert">';
                          echo $msg_error;
                          echo '</div>';
                      }
                    
                  ?>
             
                  <form class="user" action="controller\login_ae.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                    </div>
                    <!--<div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>-->
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                   <!---- <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>-->
                  </form>
                  <hr>
                  <!--<div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
