<?php 

$tempUsername=$_POST['form-username'];
$tempPassword=$_POST['form-password'];

$exists=checkUser($tempUsername);

if (!$exists) {
	if ($_POST['form-password']==$_POST['form-password1']&&
		$_POST['form-password']!="") {
        //successfull input
		$conn=connection();
	$inputSql="INSERT INTO users (`username`,`password`)
	VALUES ('$tempUsername','$tempPassword')";
	$conn->exec($inputSql);
	header("Location: index.php");
}else{
	$_SESSION['errMessage'] = "Enter the same password twice.";
}
}else{
	$_SESSION['errMessage'] = "Username already taken! Enter diferent username.";
}

?>