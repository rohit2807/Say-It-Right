<!--<!DOCTYPE html>-->
<!--<head>-->
<!--	<title> Home Page </title>-->
<!--	<link rel="stylesheet" href="<?php echo base_url().'styles/sayitright.css';?>" media="all" />-->
<!--</head>-->
<!--<body>-->
<!--	<div id="container">-->
<!--		<div id="header">-->
<!--			<nav class="navigation">-->
<!--				<img src="imgsay/logo.png">-->
<!--				<a href="<?php echo base_url().'homepage';?>" class="active">HOME</a>-->
<!--				<a href="<?php echo base_url().'aboutus';?>" >ABOUT US</a>-->
<!--				<a href="/wordpress">BLOG</a>-->
<!--				<a href="<?php echo base_url().'buyfromus';?>">BUY FROM US</a>-->
<!--				<a href="<?php echo base_url().'contact';?>">CONTACT</a>-->
<!--				<a href="<?php echo base_url().'signup';?>">SIGN UP</a>-->
<!--				<a href="<?php echo base_url().'login';?>">LOGIN</a>-->
<!--			</nav>-->
<!--		</div>-->




		<div id="mybody">
			<div id="tableclass">
				<center>
					<table>
						<tr>
							<td>
								<img class="body-para-img" src="<?php echo base_url().'imgsay/phone.png';?>">
							</td>
							<td>
								<span class="body-txt">For good communication <span class="body-say-red">Say it Right</span> is <br> a tool that you should use </span><br><span class='body-sub-txt'>You can see out video tutorial with just pressing this button.</span> <br>
								<div class="body-a-line">
									<a href="page.html">
										<img class="body-a-img" src="<?php echo base_url().'imgsay/vid.png';?>">
										<span>WATCH THE VIDEO</span>
									</a>
								</div>
							</td>
						</tr>
					</table>
				</center>
			</div>
		</div>
		<div class="subscribe">
				<table>
					<tr>
						<td class="td-class">
							<span><h2 class="sub-left-span">Subscribe our Newsletter</h2></span>
							<span class="sub-left-span2">We wont send any kind of spam</span>
						</td>
						<td>
							<div class="sub-right-div">
							    <form action="" method="GET" onSubmit="return doSubmit();" id="myForm">
								<input type="email" name="email" class="email" placeholder="Enter email address">
								<button type="submit" name="subscribe" value="Subscribe" class="btn grad">Subscribe</button>
								</form>
							</div>
						</td>
					</tr>
				</table>
		</div>
		
		
		
		
		
		
		
	<!--	<div id="footer">-->
	<!--		<hr width="75%">-->
 <!--           <span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span></span>-->
	<!--	</div>-->
	<!--</div>-->
	
	
	
	
	<script>
        function doSubmit(){
            console.log('in JS');
            email = document.getElementById("email").value;
            console.log(email)
            
            if( validateEmail(email)){
                console.log('Email Valid!');
                document.getElementById("myForm").submit();
            }
            else{
                alert("Invalid Email (JS)");
                console.log('Email invalid!');
            }
            return false;
        }
        
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    </script>

	</body>
	</html>




<?php
    if( isset( $_GET['subscribe'])){
        $email = $_GET['email'];
        
        if ( !filter_var( $email, FILTER_VALIDATE_EMAIL)) {
            setAlert("Invalid Email-ID please check once again !!!"); 
        }
        else{
            
            $msg = "Thanks a lot folk, \n You have been succesfully subscribed to SAY IT RIGHT !!!\n\n Thank you for your precious time !!!";

            $res = mail( $email, "SAY IT RIGHT!", $msg);
            
            setAlert( " Email has been sent to your Email-ID !!! ");
        }
    }
    
    function setAlert($msg){
        echo "<script>alert('".$msg."')</script>";
    }
?>