<?php 

	// CREATING DB CONNECTION port=3307
	function connection(){
		$servername = "localhost";
		$username = "root";
		$password = "root";
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
	//register user
	function registerUser($username,$password){
		$conn=connection();
		try {
			$conn=connection();
			$inputSql="INSERT INTO users (`username`,`password`) VALUES ('$username','$password')";
			$conn->exec($inputSql);
		} catch (Exception $e) {
			echo $inputSql . "<br>" . $e->getMessage();
		}
		$conn=null;
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
		$query = $conn->prepare("SELECT * FROM tasks where user_id=".$user_id." ORDER BY id ASC");
		$query->execute();
		$result = $query;
		return $result;
	}
	//GET task
	function getTask($task_id){
		$conn=connection();
		$query = $conn->prepare("SELECT * FROM tasks where task_id=".$task_id." ORDER BY id ASC");
		$query->execute();
		$result = $query;
		return $result;
	}
	//GET tasks
	function getAdminTasks(){
		$conn=connection();
		$query = $conn->prepare("SELECT * FROM tasks");
		$query->execute();
		$result = $query;
		return $result;
	}
	//UPDATE task
	function updateTask($day,$hour,$priority,$text,$id){
		$conn=connection();
		$query = $conn->prepare("UPDATE tasks SET `day`='$day', `hour`='$hour', `priority`='$priority', `context`='$text' WHERE `id`='$id'");
		$query->execute();
		$result = $query;
		return $result;
	}
	// GET Users
	function getUsers(){
		$conn=connection();
		$query = $conn->prepare("SELECT * FROM users");
		$query->execute();
		$result = $query;
		return $result;
	}
	function getBasicUsers(){
		$conn=connection();
		$query = $conn->prepare("SELECT * FROM users INNER JOIN roles ON users.role_type=roles.id WHERE roles.id=0");
		$query->execute();
		$result = $query;
		return $result;
	}
	function makeAdmin($id){
		$conn=connection();
		$query = $conn->prepare("UPDATE users SET `role_type`=1 WHERE `id`='$id'");
		$query->execute();
		$result = $query;
		return $result;
	}
	// DELETE Post
	function deletePost($post_id){
		$conn=connection();
		$query = $conn->prepare("DELETE FROM tasks WHERE id=".$post_id);
		$query->execute();
		$result = $query;
		return $result;
	}
	// DELETE Posts
	function deletePosts($user_id){
		$conn=connection();
		$query = $conn->prepare("DELETE tasks FROM tasks INNER JOIN users ON tasks.user_id=users.id WHERE users.id=".$user_id);
		$query->execute();
		$result = $query;
		return $result;
	}
	//DELETE User
	function deleteUser($user_id){
		$conn=connection();
		$query = $conn->prepare("DELETE FROM users WHERE id=".$user_id);
		$query->execute();
		$result = $query;
		return $result;
	}
	//DISPLAY DAY
	function get_day($day){
		switch ($day) {
			case 1: return 'Monday';	break;
			case 2: return 'Tuesday';	break;
			case 3: return 'Wednesday';	break;
			case 4: return 'Thursday';	break;
			case 5: return 'Friday';	break;
			default: return false;		break;
		}
	}
	//DISPLAY HOUR
	function get_hour($hour){
		switch ($hour) {
			case 1: return '09:00-10:00'; break;
			case 2: return '10:00-11:00'; break;
			case 3: return '11:00-12:00'; break;
			case 4: return '12:00-13:00'; break;
			case 5: return '13:00-14:00'; break;
			case 6: return '14:00-15:00'; break;
			case 7: return '15:00-16:00'; break;
			case 8: return '16:00-17:00'; break;
			case 9: return '17:00-18:00'; break;			
			default: return false; 	break;
		}
	}		

?>