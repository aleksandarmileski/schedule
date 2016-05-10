<?php  
require 'functions.php';

try {

	$conn=connection();
	 
	if (isset($_POST['formSignup'])) {
		$tempUsername=$_POST['form-username'];
		$tempPassword=$_POST['form-password'];

		$exists=checkUser($tempUsername);

	  if (!$exists) {
	  	if ($_POST['form-password']==$_POST['form-password1']&&
	  		$_POST['form-password']!="") {
	  		//successfull input
	  		//echo "Welcome ".$_POST['form-username']."!";
	  		$conn=connection();
	  		$inputSql="INSERT INTO users (`username`,`password`)
	  		VALUES ('$tempUsername','$tempPassword')";
	  		$conn->exec($inputSql);
	  		header("Location: index.php");
	  	}else{
	  		echo "Enter the same password twice.";
	  	}
	  }else{
	  	echo "Username already taken! Enter diferent username.";
	  }
	}		
} catch (Exception $e) {
	echo "Error: " . $e->getMessage();
}
if (isset($_POST['formLogin'])) {
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      padding: 70px;
      /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
  </style>
</head>
<body>
	<div class="form-top">
    <div class="form-top-left">
      <h3>Register to our site</h3>
      <p>Enter UNIQUE username and password to register</p>
    </div>
    <div class="form-top-right">
      <i class="fa fa-lock"></i>
    </div>
  </div>
	<div class="form-bottom">
		<form role="form" action="" method="post" class="login-form">
			<div class="form-group">
				<label class="sr-only" for="form-username">Username</label>
				<input type="text" name="form-username" placeholder="Enter Username" class="form-username form-control" id="form-username">
			</div>
			<div class="form-group">
				<label class="sr-only" for="form-password">Password</label>
				<input type="password" name="form-password" placeholder="Enter Password" class="form-password form-control" id="form-password">
				<label class="sr-only" for="form-password1">Password</label>
				<input type="password" name="form-password1" placeholder="Repeat Password" class="form-password form-control" id="form-password1">
			</div>
			<button type="submit" class="btn" name="formSignup">Sign up</button>
			<button type="submit" class="btn" name="formLogin">Login</button>
		</form>
	</div>
	<!-- jQuery Version 1.11.1 -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>