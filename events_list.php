<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
else if(isset($_POST['regconf'])){
    $eventId = $_POST['index'];
    
    $sql = "select userid FROM users WHERE user_email='".$_SESSION['user_email']."'";
    $run_user= mysqli_query($con,$sql);
    $row = mysqli_fetch_array($run_user);
    
    $userid = $row['userid'];
    
 
    
    $sql= "select * from activity where a_userid = ".$userid." and a_event = ".$eventId;
    $run_user= mysqli_query($con,$sql);
    $row = mysqli_fetch_array($run_user);
    $count = mysqli_num_rows($run_user);
    
    if($count == 0){
        
        $type = "Event";
        
        
        $sql = "insert into activity (a_event, a_type, a_userid) VALUES ('$eventId','$type','$userid')";
        $run_user= mysqli_query($con,$sql);
        
        
        if( $run_user ){
            echo "<script>alert('You have been registered for the Event successfully!')</script>";
            echo "<script>window.open('my_events.php','_self')</script>";
        }
        else{
            echo "<script>alert('Error occurred while registering for the Event')</script>";
        }
        
        
    }
    else{
        echo "<script>alert('You have already registered for this Event!')</script>";
        $sql = "select e_id, e_name, e_date, e_sede, e_desc FROM event" ;
        $run_user= mysqli_query($con,$sql);
        $row = mysqli_fetch_array($run_user);
        
    }
}

?>




<!DOCTYPE html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
	<title> Home Page </title>
	
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />

</head>

<body>
	
	<div id="container">
		
		<div id="header">
			
			<nav class="navigation">
				
				<img src="imgsay/logo.png">
				
				<a href="individual_home.php"  >HOME</a>
				<a href="conf_list.php">CONFERENCES</a>
				<a href="events_list.php" class="active">EVENTS</a>
				<a href="my_conf.php">MY CONFERENCES</a>
				<a href="my_events.php">MY EVENTS</a>
				<a href="user_profile.php" >SETTINGS</a>

			</nav>

		</div>

		<div class="title">
			LIST OF EVENTS
		</div>

		<div class="bfu-bodyhead">
			<div class="front-text">List Of Events</div>
			<div class="back-text">List Of Events</div>


			<table class="t1">
				<tr>
					<th>Events</th>
					<th>Description</th>
					<th>Date</th>
					<th>Sede</th>
					<th>Confirmation</th>
				</tr>
				<tbody>
				    <form action="" onsubmit="return register();" method="POST" id="confFrm">
                             <?php
                                
                                $sql = "select e_id, e_name, e_date, e_sede, e_desc FROM event" ;
                                $run_user= mysqli_query($con,$sql);
                                while ($row = mysqli_fetch_array($run_user)) {
                                    
                                    echo "<tr>";
                                        echo "<td>" . $row['e_name'] . "</td>";
                                        echo "<td>" . $row['e_desc'] . "</td>";
                                        echo "<td>" . $row['e_date'] . "</td>";
                                        echo "<td>" . $row['e_sede'] . "</td>";
                                        echo "<td><input class='cnfrm' type='submit' name='regconf' onclick='setValue(".$row['e_id'].")'  value='Confirm'></input></td>";
                                        
                                    echo "</tr>";
                                }
                             ?>
                             <input type='hidden' name='index' id='index'/>
                         </form>
				</tbody>
				<!--<tr>-->
				<!--	<td>Oratory</td>-->
				<!--	<td>Is the art of making formal speeches which strongly affect people's feelings and beliefs.</td>-->
				<!--	<td>25 April 2019</td>-->
				<!--	<td>Boton</td>-->
				<!--	<td>Confirm</td>-->
				<!--</tr>-->
				<!--<tr>-->
				<!--	<td>Vocalization</td>-->
				<!--	<td>A sound, you use your voice to make it, especially by singing it.</td>-->
				<!--	<td>25 April 2019</td>-->
				<!--	<td>Texas</td>-->
				<!--	<td>Confirm</td>-->
				<!--</tr>-->

				<!--<tr>-->
				<!--	<td>Social Communication</td>-->
				<!--	<td>The formation of a stable structure of relations inside a group, which provides a basis of order and patterns relationships of new members.</td>-->
				<!--	<td>25 April 2019</td>-->
				<!--	<td>Detroit</td>-->
				<!--	<td>Confirm</td>-->
				<!--</tr>-->
			</table>          
		</div>
		<div id="footer">

			<hr width="75%">

			<span>Copyright ©2019 All rights reserved | This web is made with ? by <span>DiazApps</span></span>

		</div>
        <script>
		    function setValue(index){
                document.getElementById('index').value = index;
            }
            function register(){
                return true;
                
            }
		</script>
		




	</body>
	
	</html>
