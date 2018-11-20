<!DOCTYPE html>



<?php
	//include 'db_connection.php';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	
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
			if($uname==''){
				Print '<script>alert("Please Enter the username");</script>';
				Print '<script>window.location.assign("logIn.php");</script>';	
			}
			else if($pass==''){
				Print '<script>alert("Please Enter the password");</script>';
				Print '<script>window.location.assign("logIn.php");</script>';
			}
			$db = mysqli_select_db($conn,'societalIssue');
			$sql = "SELECT * FROM people WHERE uname = '$uname' AND pass='$pass'";
			$result = mysqli_query($conn,$sql);
			// echo "<script>uname ='".$uname."' pass= '".$pass"' </script>"
			 echo "<script>error = '" . $uname  . "'</script>";
			if(mysqli_num_rows($result)>0){
				Print '<script>alert("Welcome!");</script>'; //Prompts the user
				Print '<script>window.location.assign("orgSample.html");</script>';
			}
			else{
				
					Print '<script>alert("Login Not Successful");</script>';
					//Print "<script>error = '" . $uname  . "'</script>";
					Print '<script>window.location.assign("logIn.php");</script>';
			} 
			mysqli_close($conn);

		}
	}

?>


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
				<form class="login100-form validate-form" action="logIn.php" method ="POST">
					<span class="login100-form-title">	Member Login </span>
						
						<input class="input100" type="text" id="uname" name="uname" placeholder="Username">
							<br></br>
						<input class="input100" type="password" id="pass" name="pass" placeholder="Password">
						
						<div class="container-login100-form-btn">
							<!-- <button class="login100-form-btn" onclick="check(this.form)"> Login </button> -->
							<button class="login100-form-btn" > Login </button>
						</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="sign_in.html">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
<!--====================================================================================================================-->
				<script>
				function check(form)
				{
					usn=document.getElementById("uname");
					pwd=document.getElementById("pass");
					
					if(uname.value==""){
						alert("enter the username");
					}
					else if(pass.value==""){
						alert("enter the password");
					}

					else if(uname.value == "uname" && pass.value == "pass")
					{
						window.open('target.html')
					}
					else
					{
					alert("Error Password or Username")
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



