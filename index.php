<?php  

session_start();
require 'functions.php';

if(isset($_POST['formLogin'])){
  if (isset($_SESSION['errMessage'])) {
    unset($_SESSION['errMessage']);
  }
  require 'formLogin.php';  
}

try {
  if (isset($_POST['formSignup'])) {
    if (isset($_SESSION['errMessage'])) {
      unset($_SESSION['errMessage']);
    }
    require 'formSignup.php';
  }   
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
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

  <!-- login CSS -->
  <link rel="stylesheet" href="css/style.css">

</head>


<body>

  <div class="login-page">
    <div class="form">
      <form action="" method="post" class="register-form">
        <input type="text" placeholder="Enter Username" name="form-username" id="form-username"/>
        <input type="password" placeholder="Password" name="form-password" id="form-password"/>
        <input type="password" placeholder="Repeat Password" name="form-password1" id="form-password1"/>
        <button name="formSignup">create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form action="" method="post" class="login-form" >
        <input type="text" placeholder="Username" name="form-username" id="form-username" />
        <input type="password" placeholder="Password" name="form-password" name="form-password"/>
        <button name="formLogin">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
      <?php if (isset($_SESSION['errMessage'])): ?>
        <p><?php echo $_SESSION['errMessage']; ?></p>
      <?php endif ?>
    </div>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/index.js"></script>
</body>

</html>
