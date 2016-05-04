<?php

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
		$_SESSION['errMessage'] = "Wrong password! Try again.";
	}
}else{
	$_SESSION['errMessage'] = "Username does not exists! Try again.";
}

?>