<?php  
// comments
session_start();
require 'functions.php';

if(isset($_POST['formLogin'])){
  $username = $_POST['form-username'];
  $password = $_POST['form-password'];

  if (checkUser($username)) {
    if (checkPassword($username,$password)) {
      $_SESSION['username'] = $username;
      $_SESSION['userid']=getUserId($username);
      if (isset($_SESSION['value'])) {
        unset($_SESSION['value']);
      }
      if (getUserRole($_SESSION['userid'])==0) {
        header("Location: calendar.php"); 
      }else{
        header("Location: admincalendar.php"); 
      }
    }else{
      echo "Wrong password. Try again.";
    }
  }else{
    echo "Username does not exists! Try again.";
  }  
}

if (isset($_POST['formRegister'])) {
  header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      padding-top: 70px;
      /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
  </style>

      </head>

      <body>
        <div class="container">

          <div class="row">
            
          </div>
          <div class="row">
            <div class="form-box">
              <div class="form-top">
                <div class="form-top-left">
                  <h3>Login to our site</h3>
                  <p>Enter username and password to log on:</p>
                </div>
                <div class="form-top-right">
                  <i class="fa fa-lock"></i>
                </div>
              </div>
              <div class="form-bottom">
              <form role="form" action="" method="post" class="login-form">
                  <div class="form-group">
                    <label class="sr-only" for="form-username">Username</label>
                    <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-password">Password</label>
                    <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                  </div>
                  <button type="submit" class="btn" name="formLogin">Sign in!</button>
                  <button type="submit" class="btn" name="formRegister">Register</button>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

      </body>

      </html>
