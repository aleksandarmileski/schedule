<?php 

	// CREATING DB CONNECTION
	function connection(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dbtasks";

		try {
			$conn = new PDO("mysql:host={$servername};dbname={$dbname};port=3307",$username,$password);
			$conn->setAttribute(
				PDO::ATTR_ERRMODE, 
				PDO::ERRMODE_EXCEPTION);
			// echo "Connected";
			return $conn;
		} catch (Exception $e) {
			// echo "NOT Connected";
			return false;
		}
	}

	//EXECUTE QUERY AND RETURN ROWS AS RESULT, ELSE RETURN FALSE
	function query($conn,$query){
		$results = mysqli_query($query,$conn);
		if ($results) {
			$rows=array();
			while ($row = mysqli_fetch_object($results)) {
				$rows[]=$row;
			}
			return $rows;	
		}
		return false;
	}

	//check existance of user, return true if exists or false otherwise
	function checkUser($checkUsername){
		$conn=connection();
		foreach ($conn->query("SELECT username FROM users") as $row) {
	    if ($row['username']==$checkUsername) {
	    	return true;
	    }       
	  }
	  return false;
	}

	//check password for user, return true if exists, false otherwise
	function checkPassword($checkUsername,$checkPassword){
		$conn=connection();		
		foreach ($conn->query("SELECT password FROM users WHERE `username`='$checkUsername'") as $row) {
	    if ($row['password']==$checkPassword) {
	    	return true;
	    }       
	  }
	  return false;
	}

	//GET User ID
	function getUserId($username){
		$conn=connection();		
		foreach ($conn->query("SELECT id FROM users WHERE `username`='$username'") as $row) {
			return $row['id'];
		}
	}

	//GET User role type
	function getUserRole($id){
		$conn=connection();		
		foreach ($conn->query("SELECT role_type FROM users WHERE `id`='$id'") as $row) {
			return $row['role_type'];
		}
	}

	//ADD Task to database
	function addTask($day,$hour,$priority,$text,$userid){
		$conn=connection();
		try {
			$sql = "INSERT INTO tasks (`day`, `hour`, `priority`, `context`,`user_id`) VALUES ('$day','$hour','$priority','$text','$userid')";
			$conn->exec($sql);
		} catch (Exception $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn=null;
	}

	//GET tasks
	function getTasks($user_id){
		$conn=connection();
		$query = $conn->prepare("SELECT * FROM tasks where user_id=".$user_id);
		$query->execute();
		$result = $query;
		return $result;
	}	

?>