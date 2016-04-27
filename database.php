<?php
require "config.php";

function readUsers(){

	$config = config();
		$conn = new mysqli($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_DATABASE']);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT username, password FROM users";
		$result = mysqli_query($conn, $sql);

		$data=[];
		if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	$data[$row['username'].'_'.$row['password']]=$row;
	    	/*
	        echo "day: " . $row["day"]. 
	        	 " - hour: " . $row["hour"]. 
	        	 " - priority: " . $row["priority"]. 
	        	 " - name: " . $row["name"]. "<br>";
	        	 */
	    }
			} 
			return $data;


}


function readTasks(){

		$config = config();
		$conn = new mysqli($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_DATABASE']);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT day, hour, priority, name, id_user FROM tasks";
		$result = mysqli_query($conn, $sql);

		$data=[];
		if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	$data[$row['day'].'_'.$row['hour']]=$row;
	    	/*
	        echo "day: " . $row["day"]. 
	        	 " - hour: " . $row["hour"]. 
	        	 " - priority: " . $row["priority"]. 
	        	 " - name: " . $row["name"]. "<br>";
	        	 */
	    }
			} 
			return $data;
			print_r($data);

}

/*
function readTasks(){


	$config = config();
	$conn = new mysqli($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_DATABASE']);

    $data=[];
    if ($result = $conn->query("SELECT * FROM tasks")) {
    	
       // while($row = $result->fetch(PDO::FETCH_ASSOC)) {
       	while($row = $result->fetch_assoc()){
       		
            $data[$row['day'].'_'.$row['hour']]=$row;

        }
    }
    return $data;
   
}
*/

function insertTask($day , $hour, $priority, $name){

		$config = config();
		$conn = new mysqli($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_DATABASE']);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 


	    $sql = "INSERT INTO tasks (`day`, `hour`, `priority`, `name`) VALUES (".$day.",".$hour.",'".$priority."','".$name."' )";

	    if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

}




               
           
           






?>