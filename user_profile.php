<?php
session_start();
include("includes/connection.php");
if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
else{


?>


<?php
                    $user=$_SESSION['user_email'];
                    $get_user="select * from users where user_email='$user' ";
                    $run_user= mysqli_query($con,$get_user);
                    $row=mysqli_fetch_array($run_user);

                    $user_image = $row['user_image'];
                    $userid = $row['userid'];
                    $user_fname = $row['user_fname'];
                    $user_lname = $row['user_lname'];
                    $user_work = $row['user_work'];
                    $user_school = $row['user_school'];
                    $user_email = $row['user_email'];
                    $user_password = $row['user_password'];

    
                    
?>
<!DOCTYPE html>
<head>
	<title> Home Page </title>
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />
</head>
<body>
	<div id="container" >
		<div id="header">
			<nav class="navigation">
				<img src="imgsay/logo.png">
				<a href="individual_home.php"  >HOME</a>
				<a href="conf_list.php">CONFERENCES</a>
				<a href="events_list.php">EVENTS</a>
				<a href="my_conf.php">MY CONFERENCES</a>
				<a href="my_events.php">MY EVENTS</a>
				<a href="user_profile.php" class="active">SETTINGS</a>
			</nav>
		</div>
		<div class="main-settings">
			<div class="ind-title">Welcome to your Profile</div>
			<hr class="ind-style">
            <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
			<div class="tabs">
				<div class="display-pic">
					<?php
					echo"
					<img src='imgsay/$user_image'/>
					";
					?>
					<div class="subscribe-usr" style="margin-top:23%;" >
					    <label>CHANGE IMAGE<input id='fileid' type='file' name='user_image' ></label>
						
					</div>
				</div>
				
				<div class="user-details">
					<div>
						<input class="flname" type="text" name="u_fname"  required="required" value="<?php echo $user_fname ?>"></input>
						<input class="flname" type="text" name="u_lname"  required="required" value="<?php echo $user_lname ?>"></input>
					</div>
					<input class="r-details" type="text" name="u_work"  required="required" value="<?php echo $user_work ?>"/>
					<input class="r-details" type="text" name="u_school"  required="required" value="<?php echo $user_school ?>"/>
					<input class="r-details" type="email" name="u_email"   value="<?php echo $user_email ?>"readonly />
					<input class="r-details" type="password" name="u_pass"  required="required" value="<?php echo $user_password ?>"/>
					
				</div>
				
				<div class="subscribe-save">
				    <p><a href='logout.php'>Logout</a></p>
					<input type="submit" name="update" value="SAVE CHANGES"/>
				</div>
				</form>
			</div>
		</div>	
	</div>


	<div id="footer">
		<hr width="75%">
		<span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span></span>
	</div>
</div>


</body>
</html>
<?php
    if(isset($_POST['update'])){
        $u_fname =$_POST['u_fname'];
        $u_lname =$_POST['u_lname'];
        $u_work =$_POST['u_work'];
        $u_school =$_POST['u_school'];
        $u_email =$_POST['u_email'];
        $u_pass =$_POST['u_pass'];
        
        $user_image =$_FILES['user_image']['name'];
        if ($user_image){
            $image_temp = $_FILES['user_image']['tmp_name'];
    
            move_uploaded_file($image_temp,"imgsay/$user_image");
            $update = "update users set user_fname='$u_fname',user_lname='$u_lname',user_work='$u_work',user_school='$u_school',user_email='$u_email',user_password='$u_pass', user_image='$user_image' where userid='$userid'";
            $update_commit = mysqli_query($con, $update);
            if($update_commit){
                echo "<script>alert('You have updated your profile'</script>";
                echo"<script>window.open('individual_home.php','_self')</script>";
            }
        }
        else{
            $update = "update users set user_fname='$u_fname',user_lname='$u_lname',user_work='$u_work',user_school='$u_school',user_email='$u_email',user_password='$u_pass' where userid='$userid'";
            $update_commit = mysqli_query($con, $update);
            if($update_commit){
                echo "<script>alert('You have updated your profile'</script>";
                echo"<script>window.open('individual_home.php','_self')</script>";
            }
        }

    }
?>

<?php } ?>
