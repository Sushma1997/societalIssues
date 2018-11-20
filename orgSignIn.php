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
			$name= mysqli_real_escape_string($conn,$_POST['name']);
			$pass = mysqli_real_escape_string($conn,$_POST['pass']);
			$email= mysqli_real_escape_string($conn,$_POST['email']);
			$phoneNo = mysqli_real_escape_string($conn,$_POST['phoneNo']);
			if($name==''){
				Print '<script>alert("Please Enter the Organization Name");</script>';
				Print '<script>window.location.assign("orgSignIn.php");</script>';	
			}
			else if($pass == ''){
				Print '<script>alert("Please Enter the Password");</script>';
				Print '<script>window.location.assign("orgSignIn.php");</script>';	
			}
			else if($email == ''){
				Print '<script>alert("Please Enter the Email Address");</script>';
				Print '<script>window.location.assign("orgSignIn.php");</script>';	
			}
			else if($phoneNo== ''){
				Print '<script>alert("Please Enter the Phone Number");</script>';
				Print '<script>window.location.assign("orgSignIn.php");</script>';	
			}
			
			$db = mysqli_select_db($conn,'societalIssue');
			$sql = "SELECT * FROM organ WHERE name = '$name'";
			$result = mysqli_query($conn,$sql);
			// echo "<script>uname ='".$uname."' pass= '".$pass"' </script>"
			 echo "<script>console.log(`name = '" . $name  . "'`)</script>";
			 echo "<script>console.log(`pass = '" . $pass  . "'`)</script>";
			if(mysqli_num_rows($result)>0){
				Print '<script>alert("Organization already registered.Please LogIN!");</script>'; //Prompts the user
				Print '<script>window.location.assign("orgSignIn.php");</script>';
			}
			else{
					$sql = "INSERT INTO organ(name, pass,phoneNo,email) VALUES('$name','$pass','$phoneNo','$email')";
					if(mysqli_query($conn, $sql)){
						echo "Insertion done";
						Print '<script>alert("Thankyou for Joining");</script>';
						Print '<script>window.location.assign("orgLogIn.php");</script>';
	
					}
					else{
						echo "insertion not done";
						Print '<script>alert("Not Successful");</script>';
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
				<form class="login100-form validate-form" action="orgSignIn.php" method="POST">
					<span class="login100-form-title">Make it a better world :)</span>
						<input class="input100" type="text" id="name" name="name" placeholder="Organisation name">
							<br></br>
						<input class="input100" type="text" id="email" name="email" placeholder="email: abc@gmail.com">
							<br></br>
						<input class="input100" type="number" id="phoneNo" name="phoneNo" placeholder="phone number">
							<br></br>
						<input class="input100" type="password" id="pass" name="pass" placeholder="Password">
						
						<div class="container-login100-form-btn">
							<!-- <button class="login100-form-btn" onclick="check(this.form)">join organisation</button> -->
							<button class="login100-form-btn" >Add organisation</button>
						</div>
				</form>
<!--====================================================================================================================-->
				<script>
					function check(form)
{
 usn=document.getElementById("name");
 email=document.getElementById("email");
 phoneNo=document.getElementById("phoneNo");
 pass=document.getElementById("pass");
 
 if(name.value==""){
	 alert("enter the username");
 }
  else if(email.value==""){
	 alert("enter your mail-ID");
 }
  else if(phoneNo.value==""){
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