<?php  
session_start();
require 'functions.php';

unset($_SESSION['userid']); //If user forget to logout, logout him.

if(isset($_POST['formLogin'])){ //User chooses to Login
  if (isset($_SESSION['errMessage'])) { //Unset mesage if set
    unset($_SESSION['errMessage']);
  }
  require 'formLogin.php';
}

if (isset($_POST['formSignup'])) { //User choose to Sign Up
  if (isset($_SESSION['errMessage'])) { //Unset mesage if set
    unset($_SESSION['errMessage']);
  }
  require 'formSignup.php';
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

  <title>Schedule</title>
  <!-- login CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>


<body>
  <div >
    <h1 class="textlogo">SCHEDULE</h1>
  </div>

  <?php include 'indexForm.php'; ?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>

</html>