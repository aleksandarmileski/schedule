<?php

//Take username and password
$username = htmlspecialchars($_POST['form-username']);
$password = htmlspecialchars($_POST['form-password']);

if (checkUser($username)) { //Check if entered username is taken by other user
	if (checkPassword($username,$password)) { //Check that the user entered the correct password
		//The username and password are correct
		$_SESSION['username'] = $username;
		$_SESSION['userid']=getUserId($username); //Get user ID

		if (getUserRole($_SESSION['userid'])==1) { //check if the user is admin, if it is direct the user to admin page
			header("Location: admincalendar.php"); 			
		}else{ //if the user is not admin, direct to default user page
			header("Location: calendar.php"); 			
		}
	}else{ //The user entered the wrong password
		$_SESSION['errMessage'] = "Wrong password! Try again.";
	}
}else{ //If the username is taken, you must enter diferent username
	$_SESSION['errMessage'] = "Username does not exists! Try again.";
}

?>