<!DOCTYPE html>
<html>
<head>



	<title>Societal Issues Login Page</title>
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
				<form class="login100-form validate-form" action = "signIn.php" method = "POST">
					<span class="login100-form-title">Join us and make it a better world :)</span>
						<input class="input100" type="text" id="uname" name="uname" placeholder="Username">
							<br></br>
						<input class="input100" type="text" id="email" name="email" placeholder="email: abc@gmail.com">
							<br></br>
						<input class="input100" type="number" id="pno" name="pno" placeholder="phone number">
							<br></br>
						<input class="input100" type="password" id="pass" name="pass" placeholder="Password">
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">Join Us </button>
						</div>
				</form>
<!--====================================================================================================================-->
				<script>
					function check(form)
					{
						usn=document.getElementById("uname");
						pwd=document.getElementById("email");
						pwd=document.getElementById("pno");
						pwd=document.getElementById("pass");	
						if(uname.value==""){
							alert("enter the username");
						}
						else if(email.value==""){
							alert("enter your mail-ID");
						}
						else if(pno.value==""){
							alert("enter your phone number");
						}
						else if(pass.value==""){
							alert("enter your password");
						}
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


<?php
	//include 'db_connection.php';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		echo '<script> console.log(`In php page`)</script>';;
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
			$uname= mysqli_real_escape_string($conn,$_POST['uname']);
			$pass = mysqli_real_escape_string($conn,$_POST['pass']);
			$pno = mysqli_real_escape_string($conn,$_POST['pno']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			if($uname==''){
				Print '<script>alert("Please Enter the UserName");</script>';
				Print '<script>window.location.assign("signIn.php");</script>';
			}
			else if($pass==''){
				Print '<script>alert("Please Enter the Password");</script>';
				Print '<script>window.location.assign("signIn.php");</script>';
			}
			else if($pno==''){
				Print '<script>alert("Please Enter the Phone Number");</script>';
				Print '<script>window.location.assign("signIn.php");</script>';
			}
			else if($email==''){
				Print '<script>alert("Please Enter the your Email Address");</script>';
				Print '<script>window.location.assign("signIn.php");</script>';
			}
			
			$db = mysqli_select_db($conn,'societalIssue');
			$sql = "SELECT * FROM people WHERE uname = '$uname'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				Print '<script>alert("User Name has been taken!");</script>'; //Prompts the user
				Print '<script>window.location.assign("signIn.php");</script>';
			}
			else{
				$sql = "INSERT INTO people(uname, pass,pno,email) VALUES('$uname','$pass','$pno','$email')";
				if(mysqli_query($conn, $sql)){
					echo "Insertion done";
					Print '<script>alert("Thankyou for Joining");</script>';
					Print '<script>window.location.assign("logIn.php");</script>';

				}
				else{
					echo "insertion not done";
				}
			} 
			mysqli_close($conn);

		}
	}

?>