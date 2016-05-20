<?php

//Take username and password
$tempUsername= htmlspecialchars($_POST['form-username']);
$tempPassword= htmlspecialchars($_POST['form-password']);

if (!checkUser($tempUsername)) { //Check existance of the user
	if ( $_POST['form-password']==$_POST['form-password1'] && $_POST['form-password']!="") { //Successfull data input
		registerUser($tempUsername,$tempPassword); //Register user in database
		header("Location: index.php");
	}else{ //Invalid password input or the password is empty
		$_SESSION['errMessage'] = "Enter the same password twice.";
	}
}else{ //Username already taken
	$_SESSION['errMessage'] = "Username already taken! Enter diferent username.";
}

?>