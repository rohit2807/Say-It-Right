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

				<a href="signup.php" class="active">SIGN UP</a>

				<a href="login.php">LOGIN</a>
				
			</nav>
			
		</div>
		
		
		<div id="lgn-mybody">
			
			<div class="nav">
				Home<span>&rarr;</span>Sign Up
			</div>
			<div class="title">SIGN UP
			</div>
		</div>

		<div class="signup-main-evn">
			<div class="signup-head">
			   
				<div>Select the type of User</div>
				<div class="subscribe-a">
					<a href="individual_signup.php" >INDIVIDUAL</a>
					<a href="events_signup.php" >EVENT</a>
					<a href="business_signup.php" >BUSINESS</a>	
				</div>
			</div>
			
			<div class="signup-ind">
				<hr class="ind-style">
                <form id="createEventFrm" action="" method="POST" onSubmit="return IsEmpty();" novalidate>
    				<div class="ind-title">Welcome to the event log</div>
    
    				<input id="fname" type="text" placeholder="Enter first name" name="u_fname" required="required"/>
    				<input id="lname" type="text" placeholder="Enter last name" name="u_lname" required="required"/>
    				<input id="email" type="email" placeholder="Enter email" name="u_email" required="required"/>
    				<input id="password" type="password" placeholder="Enter password" name="u_pass" required="required"/>
    
    				<div class="subscribe-a">
    					<button type ="submit" name="createEvent">SEND</button>
    				</div>
				</form>
			</div>
		</div>
		<div id="footer">

			<hr width="75%">

			<span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span>
		</div>

	</div>

</div>	
<script>
    function IsEmpty(){
        
        if (document.getElementById("fname").value=='') 
        {
         alert( "First name is empty!" );
         return false;
        }
        if (document.getElementById("lname").value=='')
        {
            alert( "Last name is empty!" );
            return false;
            
        }
        ema = document.getElementById("email");
        if (ema.value=='')
        {
            alert( "Email is empty!" );
            return false;
            
        }
        else if (!validateEmail(ema.value))
        {
                alert( "Email is not valid!" );
                return false;
        }
        
        if (document.getElementById("password").value=='')
        {
            alert( "Password is empty!" );
            return false;
            
        }
      return true;
      
    }
    function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
</script>

</body>

</html>

<?php
include("includes/connection.php");
function isEmailValid($email){
    return filter_var( $email, FILTER_VALIDATE_EMAIL);
    }
if(isset($_POST['createEvent'])){
            
            $fname = mysqli_real_escape_string($con, $_POST['u_fname']);
            $lname = mysqli_real_escape_string($con, $_POST['u_lname']);
            $email = mysqli_real_escape_string($con, $_POST['u_email']);
            if(isEmailValid($email)){
                return true;
            }
            else{
                echo "<script>alert('Please enter a valid email')</script>";
                return false;
            }
            $pass = mysqli_real_escape_string($con, $_POST['u_pass']);
            $btype= "No";
            
            
            $place = "No";
            $school = "No";
            $role = "event";
            
            $get_email = "select * from users where user_email='$email'";
            $run_email = mysqli_query($con,$get_email);

            $check = mysqli_num_rows($run_email);
            
            if($check==1){
                echo "<script>alert('Already registered email. Please use other email or try to login with the existing one')</script>";
                exit();
            }
                            

            if(strlen($pass)<8){
                echo "<script>alert('Please enter a password of minimum 8 characters')</script>";
            }
            else{
            
                $insert = "insert into users(user_fname,user_lname,user_work,user_school,user_email,user_password,user_role,user_business_type,user_image) values ('$fname','$lname','$place','$school','$email','$pass','$role','$btype','default.jpg')";
                
                $run_insert = mysqli_query($con,$insert);
                if($run_insert){
                        $_SESSION['user_email']=$email;
                        echo "<script>alert(' Congratulations!!! You have registered successfully')</script>";
                        echo "<script>window.open('individual_home.php','_self')</script>";
                }
                
            }

}
?>
