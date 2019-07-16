<!DOCTYPE html>

<head>
	
	<title> Home Page </title>
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />

</head>

<body>
	
	<div id="container">
		
		<div id="header">

			<nav class="navigation">
				<img src="imgsay/logo.png">
				
				<a href="index.php" >HOME</a>
				
				<a href="aboutus.php">ABOUT US</a>

				<a href="/wordpress">BLOG</a>

				<a href="buyfromus.php">BUY FROM US</a>

				<a href="contact.php">CONTACT</a>

				<a href="signup.php">SIGN UP</a>

				<a href="login.php" class="active">LOGIN</a>

			</nav>

		</div>	
		<div id="lgn-mybody">
			<div class="nav">
				Home <span>&rarr;</span>LOGIN
			</div>
			<div class="title">LOGIN</div>
		</div>
		<div class="lgn-form ">
		    <form id="login" action="" method="POST" onSubmit="return login();">
    			<input type="email" placeholder="Enter Email" name="email" required="required"/>
    			<input type="password" placeholder="Enter Password" name="pass" required="required"/>
    			<input type="submit" value="LOGIN" class="button-design" name="login" ></input>
			</form>
		</div>		
		<div id="footer">	
			<hr width="75%">
			<span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span>
		</div>
		
	</div>
	

</body>
</html>

<?php
function isEmailValid($email){
    return filter_var( $email, FILTER_VALIDATE_EMAIL);
    }
   
include("includes/connection.php");

if(isset($_POST['login'])){
    session_start();
    $email = mysqli_real_escape_string($con, $_POST['email']);
    // if(isEmailValid($email)){
    //     return true;
    //         }
    // else{
    //     echo "<script>alert('Please enter a valid email')</script>";
    //     return false;
    //         }
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $get_user = "select * from users where user_email='$email' And user_password='$pass'";
    $run_user = mysqli_query($con,$get_user);
    $check = mysqli_num_rows($run_user);
    if($check==1){
        $_SESSION['user_email']=$email;
        echo"<script>window.open('individual_home.php','_self')</script>";

    }
    else{
        echo"<script>alert('Entered Email or Password is wrong.')</script>";
    }
}

?>
