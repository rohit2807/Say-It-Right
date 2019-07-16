<?php
session_start();
include("includes/connection.php");
if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
else{
    
    $sql = "select userid FROM users WHERE user_email='".$_SESSION['user_email']."'";
    $run_user= mysqli_query($con,$sql);
    $row = mysqli_fetch_array($run_user);
    
    $userid = $row['userid'];
    
    $sql = "select * from conference where conf_id IN (select a_conf from activity WHERE a_userid='$userid' and a_type='Conference') and conf_date <= CURDATE()";
    $run_user= mysqli_query($con,$sql);
    $count_confat = mysqli_num_rows($run_user);
    
    $sql = "select * from event where e_id IN (select a_event from activity WHERE a_userid='$userid' and a_type='Event') and e_date <= CURDATE()";
    $run_user= mysqli_query($con,$sql);
    $count_eventat = mysqli_num_rows($run_user);
    
    
    $count_all= $count_confat + $count_eventat;
    
    $sql = "select * from conference";
    $run_user= mysqli_query($con,$sql);
    $count_confall = mysqli_num_rows($run_user);
    
    $sql = "select * from event";
    $run_user= mysqli_query($con,$sql);
    $count_eventall = mysqli_num_rows($run_user);
    
    $count_pending = ($count_confall + $count_eventall) - ($count_confat + $count_eventat);
    
}
?>


<!DOCTYPE html>
<head>
	<title> Home Page </title>
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
</head>
<body>
	<div id="container" >
		<div id="header">
			<nav class="navigation">
				<img src="imgsay/logo.png">
				<a href="individual_home.php" class="active" >HOME</a>
				<a href="conf_list.php">CONFERENCES</a>
				<a href="events_list.php">EVENTS</a>
				<a href="my_conf.php">MY CONFERENCES</a>
				<a href="my_events.php">MY EVENTS</a>
				<a href="user_profile.php" >SETTINGS</a>
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
                                        <h3 class="count"><?php echo $count_all ?></h3>
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
                                        <h3 class="count"><?php echo $count_confat ?></h3>
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
                                        <h3 class="count"><?php echo $count_eventat ?></h3>
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
                                        <h3 class="count"><?php echo $count_pending ?></h3>
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
                <?php
                
                $sql = "select * from conference where conf_id IN (select a_conf from activity WHERE a_userid='$userid' and a_type='Conference') and conf_date <= CURDATE()";
                $run_user= mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($run_user)){
                
                $head = 'Conference';
                $title = $row['conf_name'];
                $desc = $row['conf_desc'];
                }
                ?>
                <div class="all-tiles-block">
                    <div class="tile color-blue">
                        <div class="tile-header"><?php echo $head ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title ?></div>
                            <div>
                                <?php echo $desc ?>
                            </div>
                        </div>
                    </div>
                    <?php
                
                        $sql = "select * from conference where conf_id IN (select a_conf from activity WHERE a_userid='$userid' and a_type='Conference')";
                        $run_user= mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($run_user);
                        
                        $head1 = 'Conference';
                        $title1 = $row['conf_name'];
                        $desc1 = $row['conf_desc'];
                
                    ?>
                    <div class="tile color-grey">
                        <div class="tile-header"><?php echo $head ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title1 ?></div>
                            <div>
                                <?php echo $desc1 ?>
                            </div>
                        </div>
                    </div>
                    <?php
                
                        $sql = "select * from event where e_id IN (select a_event from activity WHERE a_userid='$userid' and a_type='Event') and e_date <= CURDATE()";
                        $run_user= mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($run_user)){
                        
                        $head2 = 'Event';
                        $title2 = $row['e_name'];
                        $desc2 = $row['e_desc'];
                        }
                    ?>
                    <div class="tile color-green">
                        <div class="tile-header"><?php echo $head2 ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title2 ?></div>
                            <div>
                                <?php echo $desc2 ?>
                            </div>
                        </div>
                    </div>
                    <?php
                
                        $sql = "select * from event where e_id IN (select a_event from activity WHERE a_userid='$userid' and a_type='Event') ";
                        $run_user= mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($run_user);
                        
                        $head3 = 'Event';
                        $title3 = $row['e_name'];
                        $desc3 = $row['e_desc'];
                        
                    ?>
                    <div class="tile color-red">
                        <div class="tile-header"><?php echo $head2 ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title3 ?></div>
                            <div>
                                <?php echo $desc3 ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-yellow">
                        <div class="tile-header"><?php echo $head2 ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title3 ?></div>
                            <div>
                                <?php echo $desc3 ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-paint">
                        <div class="tile-header"><?php echo $head ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title ?></div>
                            <div>
                                <?php echo $desc ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-light">
                        <div class="tile-header dark"><?php echo $head ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title dark"><?php echo $title1 ?></div>
                            <div class="dark">
                                <?php echo $desc1 ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tile color-dark">
                        <div class="tile-header"><?php echo $head2 ?></div>
                        <div class="tile-line"></div>
                        
                        <div class="cards">
                            <div class="card-title"><?php echo $title3 ?></div>
                            <div>
                                <?php echo $desc3 ?>
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

