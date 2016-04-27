<?php
	$username = "root";
	$password = "";
	$hostname = "localhost"; 

	
	$dbhandle = mysql_connect($hostname, $username, $password) 
	  or die("Unable to connect to MySQL");
	echo "Connected to MySQL<br>";
?>