<?php
// session_start();

// include("includes/connection.php");
// if(isset($_POST['orderPost'])){
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $fname = mysqli_real_escape_string($con, $_POST['fname']);
//     $lname = mysqli_real_escape_string($con, $_POST['lname']);
//     $address = mysqli_real_escape_string($con, $_POST['address']);
//     $apt = mysqli_real_escape_string($con, $_POST['apt']);
//     $city = mysqli_real_escape_string($con, $_POST['city']);
//     $zip = mysqli_real_escape_string($con, $_POST['postal']);
//     $amount = $_SESSION['total'];
    
    
//     $insert = "insert into orders(o_email,o_fname,o_lname,o_address,o_apartment,o_city,o_postal,o_amount) values ('$email','$fname','$lname','$address','$apt','$city','$zip','$amount')";
    
                
//     $run_insert = mysqli_query($con,$insert);
//     if($run_insert){
                        
//         echo "<script>alert(' Congratulations!!! Your order has been placed successfully')</script>";
//         echo "<script>window.open('logout.php','_self')</script>";
//     }
// }
//     $sql="select * from products where p_id IN (" .implode(",",array_keys($_SESSION['cart'])).")";
//     $run_user= mysqli_query($con,$sql);

?>



<!--<!DOCTYPE html>-->
<!--<head>-->
<!--    <title> Home Page </title>-->
<!--    <link rel="stylesheet" href="<?php echo base_url().'sayitright.css' ?>" media="all" />-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<!--    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />-->
<!--</head>-->
<!--<body>-->
<!--    <div id="container">-->
<!--        <div id="header">-->
<!--            <nav class="navigation">-->
<!--                <img src="imgsay/logo.png">-->
<!--                <a href="index.php" >HOME</a>-->
<!--                <a href="aboutus.php">ABOUT US</a>-->
<!--                <a href="/wordpress">BLOG</a>-->
<!--                <a href="buyfromus.php" class="active">BUY FROM US</a>-->
<!--                <a href="contact.php">CONTACT</a>-->
<!--                <a href="signup.php">SIGN UP</a>-->
<!--                <a href="login.php">LOGIN</a>-->
<!--            </nav>-->
<!--        </div>-->
        <div class="cart-body" >
            <div class="bfu-bodyhead cart">
                <div class="front-text">Buy From Us</div>
                <div class="back-text">Buy From Us</div>
                
            <div class="cart-box">
                <div class="customer-details">
                    <form action="<?php echo base_url().'cart/cart_validation'; ?>" method="POST" id="cust-form"  >
                        <?php
                            echo validation_errors();
                            if(isset($error)){
                                echo $error;
                            }
                        ?>
                        
                        <div class="cust-form-head">Contact Information</div>
                        <input class="cust-input" type="email" placeholder="Enter Email" name="email" value="<?php echo set_value('email'); ?>"></input>       
                        <div class="cust-form-head">Shipping Information</div>
                        <div class="cust-input-half">
                            <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo set_value('fname'); ?>"></input>
                            <input type="text" placeholder="Enter Last Name" class="secnd" name="lname" value="<?php echo set_value('lname'); ?>"></input>
                        </div>
                        <input class="cust-input" type="text" placeholder="Enter Address" name="address" value="<?php echo set_value('address'); ?>"></input>
                        <input class="cust-input" type="text" placeholder="Enter Apartment, suite, etc." name="apt" value="<?php echo set_value('apt'); ?>"></input>
                        <input class="cust-input" type="text" placeholder="Enter City" name="city" value="<?php echo set_value('city'); ?>"></input>
                        <div>
                            <select name="language" id="cust-lang">
                                <option selected="selected">English</option>
                            </select> 
                            <input type="text" placeholder="Enter Postal Code" class="cust-zcode" name="postal" value="<?php echo set_value('postal'); ?>"></input>
                        </div>
                        <div class="cart-submit">
                        <input type="submit" class="subscribe" value="SEND MESSAGE" name="orderPost" ></input>
                        </div>
                    </form>
                </div>
                <div class="cart-box-product">                  
                    <div class="cart-table">
                        <div class="cart-row mov">
                            <div class="cart-col " align="center">ID</div>
                            <div class="cart-col" align="center">Units</div>
                            <div class="cart-col" align="center">Name</div>
                            <div class="cart-col" align="center">Price</div>
                         </div>
                         <?php
                            
                            // while ($row = mysqli_fetch_array($run_user)){ 
                            //     $qnt = $_SESSION['cart'][ $row['p_id'] ]; 
                                
                            //     echo "<div class='cart-row'>";
                            //         echo "<div class='cart-col'>";
                            //             echo "<img src='imgsay/" .$row['p_image']. "'></img>";
                            //         echo "</div>";
                            //         echo "<div class='cart-col'>" .$row['p_name']. "</div>";
                            //         echo "<div class='cart-col'>" .$qnt. "</div>";
                            //         echo "<div class='cart-col'>" .$row['p_price']. "</div>";
                            //     echo "</div>";
                            //     $total = $total + ($qnt*$row['p_price']);
                                
                            // }
                            // $_SESSION['total'] = $total;
                            
                            
                            $total = 0;
                            foreach($products as $row) { 
                                $qnt = $_SESSION['cart'][ $row->p_id ];  
                                
                                echo "<div class='cart-row'>";
                                    echo "<div class='cart-col'>";
                                        echo "<img src='".base_url()."imgsay/" .$row->p_image. "'></img>";
                                    echo "</div>";
                                    echo "<div class='cart-col'>" .$row->p_name. "</div>";
                                    echo "<div class='cart-col'>" .$qnt. "</div>";
                                    echo "<div class='cart-col'>" .$row->p_price. "</div>";
                                echo "</div>";
                                $total = $total + ($qnt*$row->p_price);
                            }
                            $_SESSION['total'] = $total;
                         ?>
                        <!--<div class="cart-row">-->
                        <!--    <div class="cart-col">-->
                        <!--        <img src="imgsay/taza2.png"></img>-->
                        <!--    </div>-->
                        <!--    <div class="cart-col">2</div>-->
                        <!--    <div class="cart-col">Cup</div>-->
                        <!--    <div class="cart-col">$ 28.89</div>-->
                        <!--</div>-->
                        <!--<div class="cart-row">-->
                        <!--    <div class="cart-col">-->
                        <!--        <img src="imgsay/franela1.jpg"></img>-->
                        <!--    </div>-->
                        <!--    <div class="cart-col">1</div>-->
                        <!--    <div class="cart-col">Flannel</div>-->
                        <!--    <div class="cart-col">$ 51.99</div>-->
                        <!--</div>-->
                        
                        <hr class="cart-style">
                        <div class="cart-row">
                            <div class="cart-col"><b>Total</b></div>
                            <div class="cart-col">&nbsp;</div>
                            <div class="cart-col">USD</div>
                            <div class="cart-col">$ <?php echo $total ?></div>
                        </div>
                      
                        
                    </div>
                </div>
                
            </div>
        </div>
            
    <!--    <div id="footer">-->
    <!--        <hr width="75%">-->
    <!--        <span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span></span>-->
    <!--    </div>-->
    <!--</div>-->
    

    <!--</body>-->
    <!--</html>-->
