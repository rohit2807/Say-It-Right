<!DOCTYPE html>

<head>
	
	<title> Home Page </title>
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />

</head>

<body>
	
	<div id="c-container">
		
		<div id="header">
			<nav class="navigation">
				<img src="imgsay/logo.png">
				
				<a href="index.php" >HOME</a>
				
				<a href="aboutus.php">ABOUT US</a>

				<a href="/wordpress">BLOG</a>

				<a href="buyfromus.php">BUY FROM US</a>

				<a href="contact.php" class="active">CONTACT</a>

				<a href="signup.php">SIGN UP</a>

				<a href="login.php">LOGIN</a>
				
			</nav>	
		</div>
		<div id="lgn-mybody">
			<div class="nav">
				Home <span>&rarr;</span>Contact Us
			</div>
			<div class="title">CONTACT US</div>
		</div>
		<div class="contact-block">
		    <form id="createMessage" action="" method="POST" onSubmit="return createMessage();">
    			<div class="c-details">
    				<input type="text" placeholder="Enter your name" class="cfields" name="c_fname" required="required" />
    				<input type="text" placeholder="Enter Last name" class="cfields" name="c_lname" required="required" />
    				<input type="text" placeholder="Telephone" class="cfields" name="c_phone" required="required" />
    			</div>
    			<div class="c-message">
    				<textarea placeholder="Enter Message" name="c_message" required="required"></textarea>
    			</div>
    			<div class="message-button">
    				<input type="submit" value="SEND MESSAGE" class="button-design" name="createMessage"  >
    			</div>
    		</form>
		</div>
	</div>
	<div id="footer">
		
		<hr width="75%">
		
		<span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span>
	</span>
	
    </div>




</body>

</html>


<?php
include("includes/connection.php");
if(isset($_POST['createMessage'])){
            
            $fname = mysqli_real_escape_string($con, $_POST['c_fname']);
            $lname = mysqli_real_escape_string($con, $_POST['c_lname']);
            $phone = mysqli_real_escape_string($con, $_POST['c_phone']);
            $message = mysqli_real_escape_string($con, $_POST['c_message']);
            $insert = "insert into contact(c_fname,c_lname,c_phone,c_message) values ('$fname','$lname','$phone','$message')";
            $run_insert = mysqli_query($con,$insert);
            echo "<script>alert(' Congratulations!!! Message Submitted')</script>";
            echo "<script>window.open('index.php','_self')</script>";
                
                
            

}
?>

