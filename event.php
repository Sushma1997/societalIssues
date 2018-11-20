<?php
    $host = "localhost";
	$user = "root";
    $password = "pass";
	$database = "societalIssue";
	$conn = new mysqli($host, $user,$password,$database);
	if($conn-> connect_error){
		 //echo '<script> console.log(`connection not established`)</script>';	 
	}
	else{
        $sql = "SELECT* FROM events;";
        $result = mysqli_query($conn,$sql);
        $rows = array();
        $res = mysqli_fetch_all($result);
        foreach($res as $i)
            array_push($rows, $i);
        echo json_encode($rows);
    }	  
       
?>
