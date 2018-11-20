<!DOCTYPE html>
<?php
	//include 'db_connection.php';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		echo '<script> console.log(`In php page`)</script>';
		$host = "localhost";
		$user = "root";
		$password = "pass";
		$database = "societalIssue";
		$conn = new mysqli($host, $user,$password,$database);
		if($conn-> connect_error){
			echo '<script> console.log(`connection not established`)</script>';
			
		}
		else{
			echo '<script> console.log(`connection established`)</script>';
			$orgName= mysqli_real_escape_string($conn,$_POST['orgName']);
			$eventName = mysqli_real_escape_string($conn,$_POST['eventName']);
			$eventAddress= mysqli_real_escape_string($conn,$_POST['eventAddress']);
			$eventDate = mysqli_real_escape_string($conn,$_POST['eventDate']);
			$eventTime = mysqli_real_escape_string($conn,$_POST['eventTime']);
			if($orgName==''){
				Print "<script> alert('Enter orgName'); </script>";
				Print '<script>window.location.assign("createEvent.php");</script>';
			}
			else if($eventName==''){
				Print "<script> alert('Enter Event Name'); </script>";
				Print '<script>window.location.assign("createEvent.php");</script>';
			}
			else if($eventAddress==''){
				Print "<script> alert('Enter Event Address'); </script>";
				Print '<script>window.location.assign("createEvent.php");</script>';
			}
			else if($eventDate==''){
				Print "<script> alert('Enter Event Date'); </script>";
				Print '<script>window.location.assign("createEvent.php");</script>';
			}
			else if($eventTime==''){
				Print "<script> alert('Enter Event Time'); </script>";
				Print '<script>window.location.assign("createEvent.php");</script>';
			}
			
			$db = mysqli_select_db($conn,'societalIssue');
			$sql = "SELECT * FROM events WHERE eventName = '$eventName'";
			$result = mysqli_query($conn,$sql);
			// echo "<script>uname ='".$uname."' pass= '".$pass"' </script>"
			 echo "<script>console.log(`name = '" . $name  . "'`)</script>";
			 echo "<script>console.log(`pass = '" . $pass  . "'`)</script>";
			if(mysqli_num_rows($result)>0){
				Print '<script>alert("Event already exits.Please register again!");</script>'; //Prompts the user
				Print '<script>window.location.assign("createEvent.php");</script>';
			}
			else{
					$sql = "INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES('$eventName','$orgName','$eventAddress','$eventDate','$eventTime')";
					if(mysqli_query($conn, $sql)){
						echo "Insertion done";
						Print '<script>alert("Event added");</script>';
						Print '<script>window.location.assign("eventMain.html");</script>';
	
					}
					else{
						echo "insertion not done";
						Print '<script>alert("Event Not added");</script>';
					}
					Print '<script>alert("Successful");</script>';
					//Print "<script>error = '" . $uname  . "'</script>";
					//Print '<script>window.location.assign("logIn.php");</script>';
			} 
			mysqli_close($conn);

		}
	}

?>

<html>
<head>
	<title>create organisation</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login/images/img-01.png" alt="IMG">
				</div>
<!--===================================================================================================================-->
				<form class="login100-form validate-form" action="createEvent.php" method="POST">
					<span class="login100-form-title">Add Event</span>
						
						<input class="input100" type="text" id="orgName" name="orgName" placeholder="organisation name">
						<br></br>
							
						<input class="input100" type="text" id="eventName" name="eventName" placeholder="Name of the event">
						<br></br>
						<input class="input100" type="text" id="eventAddress" name="eventAddress" placeholder="Event Address">
						<br></br>
						<input class="input100" type="datetime" id="eventDate" name="eventDate" placeholder="Start date of the event">
						<br></br>
						<input class="input100" type="datetime" id="eventTime" name="eventTime" placeholder="Start time of the event">
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" >Add</button>
						</div>
				</form>
<!--====================================================================================================================-->
				<script>
					function check(form){
						orgName=document.getElementById("orgName");
						eventName =document.getElementById("eventName");
						// if(orgName.value==""){
						// 	alert("enter the organisation name");
						// 	window.location.assign("createEvent.php");
						// }
						// else if(eventName.value==""){
						// 	alert("enter the eventName ");
						// }
					}
				</script>
			</div>
		</div>
	</div>
	
	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/vendor/select2/select2.min.js"></script>
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="login/js/main.js"></script>

</body>
</html>