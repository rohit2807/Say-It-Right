<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
else if(isset($_POST['delId'])){
    
    
    
    $sql = "select userid FROM users WHERE user_email='".$_SESSION['user_email']."'";
    $run_user= mysqli_query($con,$sql);
    $row = mysqli_fetch_array($run_user);
    
    $userid = $row['userid'];
    
    $delId = $_POST['delId'];
    $sql= "delete from activity where a_userid = '$userid' and a_conf = '$delId' ";
    $run_user= mysqli_query($con,$sql);
    if ($run_user){
        echo "<script>alert('Record deleted successfully ')</script>";
        echo "<script>window.open('my_events.php','_self')</script>";
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
				<a href="events_list.php">EVENTS</a>
				<a href="my_conf.php">MY CONFERENCES</a>
				<a href="my_events.php" class="active">MY EVENTS</a>
				<a href="user_profile.php" >SETTINGS</a>

			</nav>

		</div>


		<div class="title">
			LIST OF MY EVENTS
		</div>

		<div class="bfu-bodyhead">
			<div class="front-text">List Of My Events</div>
			<div class="back-text">List Of My Events</div>


			<table class="t1">
				<tr>
					<th>Events</th>
					<th>Description</th>
					<th>Date</th>
					<th>Sede</th>
					<th>Deletion</th>
				</tr>
				<tbody>
                         <form action="" method="POST" id="deleteFrm">
                         <?php
                                $sql = "select userid FROM users WHERE user_email='".$_SESSION['user_email']."'";
                                $run_user= mysqli_query($con,$sql);
                                $row = mysqli_fetch_array($run_user);
    
                                 $userid = $row['userid'];
                                 
                                $sql = "select e_id, e_name, e_date, e_sede, e_desc from event where e_id IN (select a_event from activity where a_userid = '".$userid."' and a_type = 'Event') " ;
                                $run_user= mysqli_query($con,$sql);
                                while ($row = mysqli_fetch_array($run_user))  {
                                    echo "<tr>";
                                        echo "<td>" . $row['e_name'] . "</td>";
                                        echo "<td>" . $row['e_desc'] . "</td>";
                                        echo "<td>" . $row['e_date'] . "</td>";
                                        echo "<td>" . $row['e_sede'] . "</td>";
                                        echo "<td><input class='cnfrm' type='submit' name='del' onclick='setDelValue(".$row['conf_id'].")' value='Delete'></input></td>";
                                        
                                    echo "</tr>";
                                    
                                }
                                
                            
                         ?>
                         <input type='hidden' name='delId' id='delId'/>
                         </form>
                         <script>
                             function setDelValue(id){
                                 
                                document.getElementById('delId').value = id;
                               
                                 
                             }
                         </script>
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

		




	</body>
	
	</html>
