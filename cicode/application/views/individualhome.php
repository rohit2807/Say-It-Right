<?php
// session_start();
// include("includes/connection.php");
// if(!isset($_SESSION['user_email'])){
//     header("location: index.php");
// }
// else{
    
//     $sql = "select userid FROM users WHERE user_email='".$_SESSION['user_email']."'";
//     $run_user= mysqli_query($con,$sql);
//     $row = mysqli_fetch_array($run_user);
    
//     $userid = $row['userid'];
    
//     $sql = "select * from conference where conf_id IN (select a_conf from activity WHERE a_userid='$userid' and a_type='Conference') and conf_date <= CURDATE()";
//     $run_user= mysqli_query($con,$sql);
//     $count_confat = mysqli_num_rows($run_user);
    
//     $sql = "select * from event where e_id IN (select a_event from activity WHERE a_userid='$userid' and a_type='Event') and e_date <= CURDATE()";
//     $run_user= mysqli_query($con,$sql);
//     $count_eventat = mysqli_num_rows($run_user);
    
    
//     $count_all= $count_confat + $count_eventat;
    
//     $sql = "select * from conference";
//     $run_user= mysqli_query($con,$sql);
//     $count_confall = mysqli_num_rows($run_user);
    
//     $sql = "select * from event";
//     $run_user= mysqli_query($con,$sql);
//     $count_eventall = mysqli_num_rows($run_user);
    
//     $count_pending = ($count_confall + $count_eventall) - ($count_confat + $count_eventat);
    
// }
?>


<!DOCTYPE html>
<head>
	<title> Home Page </title>
	<link rel="stylesheet" href="<?php echo base_url().'styles/sayitright.css';?>" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
</head>
<body>
	<div id="container" >
		<div id="header">
			<nav class="navigation">
				<img src="<?php echo base_url().'imgsay/logo.png';?>">
				<a href="<?php echo base_url().'individualhome';?>" class="active" >HOME</a>
				<a href="<?php echo base_url().'conflist';?>">CONFERENCES</a>
				<a href="<?php echo base_url().'eventlist';?>">EVENTS</a>
				<a href="<?php echo base_url().'myconf';?>">MY CONFERENCES</a>
				<a href="<?php echo base_url().'myevent';?>">MY EVENTS</a>
				<a href="<?php echo base_url().'userprofile';?>" >SETTINGS</a>
			</nav>
		</div>
		<div id="body">
            <div class="tiles-main-block">
                <div >
                    <div class="tile-activity-block">
                        <div class="tile-activity">
                            <div class="tile-activity-part color-blue">
                                <div class="icon">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <div class="tile-activity-count">
                                    <div>
                                        <h3 class="count">5</h3>
                                    </div>
                                    <div class="count-text">
                                        activities performed
                                    </div>
                                </div>
                            </div>
                            <div class="tile-text">
                                Total Made
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="tile-activity-block">
                        <div class="tile-activity">
                            <div class="tile-activity-part color-green">
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="tile-activity-count">
                                    <div>
                                        <h3 class="count">3</h3>
                                    </div>
                                    <div class="count-text">
                                        activities performed
                                    </div>
                                </div>
                            </div>
                            <div class="tile-text">
                                Conferences
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile-activity-block">
                        <div class="tile-activity">
                            <div class="tile-activity-part color-yellow">
                                <div class="icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="tile-activity-count">
                                    <div>
                                        <h3 class="count">2</h3>
                                    </div>
                                    <div class="count-text">
                                        activities performed
                                    </div>
                                </div>
                            </div>
                            <div class="tile-text">
                                Events
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="tile-activity-block">
                        <div class="tile-activity">
                            <div class="tile-activity-part color-grey">
                                <div class="icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="tile-activity-count">
                                    <div>
                                        <h3 class="count">2</h3>
                                    </div>
                                    <div class="count-text">
                                        activities to carry out
                                    </div>
                                </div>
                            </div>
                            <div class="tile-text">
                                Activities
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="all-tiles-block">
                    <div class="tile color-blue">
                        <div class="tile-header">Conference</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Oratory</div>
                            <div>
                                Is the art of making formal speeches which strongly affect people's feelings and beliefs.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-grey">
                        <div class="tile-header">Events</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Vocalization</div>
                            <div>
                                A sound, you use your voice to make it, especially by singing it.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-green">
                        <div class="tile-header">Events</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Oratory</div>
                            <div>
                                Is the art of making formal speeches which strongly affect people's feelings and beliefs.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-red">
                        <div class="tile-header">Conference</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Oratory</div>
                            <div>
                                Is the art of making formal speeches which strongly affect people's feelings and beliefs.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-yellow">
                        <div class="tile-header">Header</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Warning card title</div>
                            <div>
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-paint">
                        <div class="tile-header">Header</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Info card title</div>
                            <div>
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-light">
                        <div class="tile-header dark">Header</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title dark">Light card title</div>
                            <div class="dark">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-dark">
                        <div class="tile-header">Header</div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title">Dark card title</div>
                            <div>
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </div>
                        </div>
                    </div>
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

