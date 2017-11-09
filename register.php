<?php
session_start();

if(isset($_SESSION['usr_id'])) //usr_id is primary key in table
 {
	header("Location: index.php");
}

include_once 'dbconnect.php'; // connect database for once.

//set validation error flag as false
$error = false;
//check if form is submitted
if (isset($_POST['signup'])) //POST method will upload data.
{
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']); 
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,gender,email,password) VALUES('" . $name . "','" . $gender . "', '" . $email . "', '" . md5($password) . "')")) {
			$successmsg = "Successfully Registered!";
		} else {


			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<style>
body {
        background-image: url("pp2.jpg ");
} 
 
</style>


<center><div class="container" style="height:600px;width:400px; margin:30 auto;background-size:cover;background:beige; border: 2px solid black; border-radius: 2px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
			<center>
				<h1>Sign Up</h1>
					
               
					<div class="form-group">
						<label for="name"><b>Name</b></label>
						<br>
						<br>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					<br>
					 <div class="form-group">
                        <label for="gender"><b>Gender:<b></label><br>
                         <br>
                        <input type="radio" name="gender"  id="gender" value="Female" required value="<?php if($error) echo $gender; ?>"/> Female
                        &nbsp;&nbsp; 
                        <input type="radio" name="gender"  id="gender"  value="Male" required value="<?php if($error) echo $gender; ?>"/> Male
                  </div>
					<br>
					<div class="form-group">
						<label for="name"><b>Email</b></label>
						<br>
						<br>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
                     <br>
					<div class="form-group">
						<label for="name"><b>Password</b></label>
						<br>
						<br>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>
                      <br>
					<div class="form-group">
						<label for="name"><b>Confirm Password</b></label>
						<br>
						<br>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>
					<br>
                    <br>
					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
					<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
			<br>
		Already Registered? <a href="header.php">Login Here</a>
		</div></center>
	</div>
				
			</form>
		</center>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	
</div>

</body>

</html>



 