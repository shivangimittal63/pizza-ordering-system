<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: dashbord.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM  users WHERE email = '" . $email. "' and password = '" . md5($password ). "'");

	if ($row = mysqli_fetch_array($result)) 
	{
		$_SESSION['usr_id'] = $row['email'];
		//$_SESSION['usr_name'] = $row['email'];
		header("Location: dashbord.php");
	} else 

	{
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>


<html>
<head>
	<title> HOME PAGE </title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	

	
<div id="header">
 <div class="container" style="height:400px;width:400px; margin:30 auto;background-size:cover; border: 2px solid black; border-radius: 2px;">
<br><br>


   <right><form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">

		
				
					
					 <div class="form-group"><b>
					 	                        
                                                <label for="name" style="font-color:powderblue;">Email</label>
                                                <br>
                                                
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="email" placeholder="Your email " required class="form-control" />
                                        </div>
                                       <br>
                                        <div class="form-group">
                                        	
                                            <label for="name">Password</label></b>
                                            <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="password" name="password" placeholder="Your password " required class="form-control" />
                                        </div>
                                         <br>
                                         
                                        <div class="form-group">
                                            <div class="login_button">
                                            	&nbsp;&nbsp;&nbsp;
                                                <input type="submit" name="login" value="Login"/>
                                                &nbsp;&nbsp;&nbsp;
                                                <br>
                                                &nbsp;&nbsp;&nbsp;
                                                <br>
                                               <h> <b> New user? <b><h> &nbsp;&nbsp;&nbsp;
                                               <input type="button" onclick="location.href='register.php';" value="Signup"/>
                                            </div>
					  
                      <br>
                      <br>
                       &nbsp;&nbsp;&nbsp;
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
				
			</form> </right>
 </div>
			
</div>

</body>
</html>

