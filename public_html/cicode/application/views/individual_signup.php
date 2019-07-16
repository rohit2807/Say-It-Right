
<!DOCTYPE html>

<head>
	
	<title> Home Page </title>
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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

		<div class="signup-main-ind">
			<div class="signup-head">
				<div>Select the type of user</div>
				<div class="subscribe-a">
					<a href="individual_signup.php" >INDIVIDUAL</a>
					<a href="events_signup.php" >EVENT</a>
					<a href="business_signup.php" >BUSINESS</a>	
				</div>
			</div>
		

			<div class="signup-ind">
				<hr class="ind-style">
				<form id="createIndivFrm" action="" method="POST" onSubmit="return createIndividual();" novalidate>
				<div class="ind-title">Welcome to the individual registration</div>

				<input type="text" placeholder="Enter first name" name="u_fname" id="u_fname" required="required"/>
				<input type="text" placeholder="Enter last name" name="u_lname" id="u_lname" required="required"/>
				<input type="text" placeholder="Enter place work" name="u_place" required="required"/>
				<input type="text" placeholder="Enter school" name="u_school" required="required"/>
				<input type="email" placeholder="Enter email" name="u_email" id="u_email"required="required"/>
				<input type="password" placeholder="Enter password" name="u_pass" id="u_pass" required="required"/>
			
				<div class="subscribe-a">
				<button type ="submit" name="createInd">SEND</button>
				</div>
				</form>
				<!--<script>-->
				<!--    function createIndividual(){-->
				<!--        var fname = document.getElementById('u_fname');-->
				        
				<!--        if(fname.value){-->
				<!--            var lname = document.getElementById('u_lname');-->
    <!--				        if(lname.value){-->
    <!--				            return true;-->
				<!--            }-->
				<!--            else{-->
				<!--            alert("Please enter Last name");-->
				<!--            return false;-->
				<!--            }-->
				<!--        }-->
				<!--        else{-->
				<!--            alert("Please enter First name");-->
				<!--            return false;-->
				<!--        }-->
				        
				        
				        
				        
				<!--    }-->
				    
				<!--</script>-->
			</div>	
		
		</div>
		<div id="footer">

			<hr width="75%">

			<span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span>
		</div>

	</div>

</div>	


</body>

</html>

<?php
include("includes/connection.php");

function isEmailValid($email){
    return filter_var( $email, FILTER_VALIDATE_EMAIL);
    }
   
if(isset($_POST['createInd'])){
            
            $fname = mysqli_real_escape_string($con, $_POST['u_fname']);
            $lname = mysqli_real_escape_string($con, $_POST['u_lname']);
            $place = mysqli_real_escape_string($con, $_POST['u_place']);
            $school = mysqli_real_escape_string($con, $_POST['u_school']);
            $email = mysqli_real_escape_string($con, $_POST['u_email']);
            if(isEmailValid($email)){
                return true;
            }
            else{
                echo "<script>alert('Please enter a valid email')</script>";
                return false;
            }
            
            $pass = mysqli_real_escape_string($con, $_POST['u_pass']);
            $role = "User";
            $btype= "No";
            
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
                        echo "<script>window.open('individual_php.html','_self')</script>";
                }
                
            }

}
?>
            
                
        