<?php
session_start();
include("includes/connection.php");
    
    $sql="select * from products  ";
    $run_user= mysqli_query($con,$sql);

    $p_id = $row['p_id'];
    $p_name = $row['p_name'];
    $p_description = $row['p_description'];
    $p_image = $row['p_image'];
    $p_type = $row['p_type'];
    $p_quantity = $row['p_quantity'];
    $p_price = $row['p_price'];
                   
    
    
    
    if (!is_array($_SESSION['cart'])){
      $_SESSION['cart'] = array();
    }
    
    
    if(isset($_POST['newItem'])){   
        $_SESSION['cart'][$_POST['cartProdId']] = $_POST['quantity'];
        
    }
    
    if(isset($_POST['submit'])){
        echo "<script>window.open('cart.php','_self')</script>";
    }
    
    
    



?>

<!DOCTYPE html>

<head>
	
	<title> Home Page </title>
	
	<link rel="stylesheet" href="styles/sayitright.css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

</head>

<body>
	
	<div id="container">
		
		<div id="header">	
			<nav class="navigation">				
				<img src="imgsay/logo.png">
				<a href="index.php" >HOME</a>
				<a href="aboutus.php">ABOUT US</a>
				<a href="blog.php">BLOG</a>
				<a href="buyfromus.php" class="active">BUY FROM US</a>
				<a href="contact.php">CONTACT</a>
				<a href="signup.php">SIGN UP</a>
				<a href="login.php">LOGIN</a>
			</nav>
		</div>
		

		<div id="bfu-mybody">	
			<div class="nav">	
				Home <span>&rarr;</span> Buy From Us
			</div>
			<div class="title">
				BUY FROM US
			</div>

			<div class="bfu-bodyhead">
				<div class="front-text">Buy From Us</div>
				<div class="back-text">Buy From Us</div>
				
			<?php
                    while ($row = mysqli_fetch_array($run_user)){
                        echo "<div class='product'>";
                            echo "<img src='imgsay/".$row['p_image']."'></img>";
                            echo "<div class='p-price'>$".$row['p_price']."</div>";
                            echo "<div class='p-description'>".$row['p_description']."</div>";
                            echo "<input type='hidden' class='prodId' value='".$row['p_id']."'/>";
                            echo "<input type='button' value='ADD TO CART' class='subscribe s-change'></input>";
                        echo "</div>";
                    }
                 ?>
			</div>
			<!--	<div class="product">-->
			<!--		<img src="imgsay/franela1.jpg"></img>-->
			<!--		<div class="p-price">-->
			<!--			$24.99-->
			<!--		</div>-->
			<!--		<div class="p-description">-->
			<!--			Some quick example to build on the card title and make up the bulk of the card's content -->
			<!--		</div>-->
			<!--		<button class="subscribe s-change"  onclick="rdrct_page()">ADD TO CART</button>-->
			<!--	</div>-->

			<!--	<div class="product">-->
			<!--		<img src="imgsay/taza1.png"></img>-->
			<!--		<div class="p-price">-->
			<!--			$24.99-->
			<!--		</div>-->
			<!--		<div class="p-description">-->
			<!--			Some quick example to build on the card title and make up the bulk of the card's content -->
			<!--		</div>-->
			<!--		<button class="subscribe s-change"  onclick="rdrct_page()">ADD TO CART</button>-->
			<!--	</div>-->

			<!--	<div class="product">-->
			<!--		<img src="imgsay/franela2.jpg"></img>-->
			<!--		<div class="p-price">-->
			<!--			$24.99-->
			<!--		</div>-->
			<!--		<div class="p-description">-->
			<!--			Some quick example to build on the card title and make up the bulk of the card's content -->
			<!--		</div>-->
			<!--		<button class="subscribe s-change"  onclick="rdrct_page()">ADD TO CART</button>-->
			<!--	</div>-->

			<!--	<div class="product">-->
			<!--		<img src="imgsay/taza2.png"></img>-->
			<!--		<div class="p-price">-->
			<!--			$24.99-->
			<!--		</div>-->
			<!--		<div class="p-description">-->
			<!--			Some quick example to build on the card title and make up the bulk of the card's content -->
			<!--		</div>-->
			<!--		<button class="subscribe s-change"  onclick="rdrct_page()">ADD TO CART</button>-->
			<!--	</div>-->

			<!--	<div class="product">-->
			<!--		<img src="imgsay/franela3.jpg"></img>-->
			<!--		<div class="p-price">-->
			<!--			$24.99-->
			<!--		</div>-->
			<!--		<div class="p-description">-->
			<!--			Some quick example to build on the card title and make up the bulk of the card's content -->
			<!--		</div>-->
			<!--		<button class="subscribe s-change"  onclick="rdrct_page()">ADD TO CART</button>-->
			<!--	</div>-->

			<!--	<div class="product">-->
			<!--		<img src="imgsay/taza3.png"></img>-->
			<!--		<div class="p-price">-->
			<!--			$24.99-->
			<!--		</div>-->
			<!--		<div class="p-description">-->
			<!--			Some quick example to build on the card title and make up the bulk of the card's content -->
			<!--		</div>-->
			<!--		<button class="subscribe s-change"  onclick="rdrct_page()">ADD TO CART</button>-->
			<!--	</div>-->

			<!--</div>-->

       
                <div id="i-popup" class="popup">

                 
                  <div class="popup-body">
                    <span class="close">&times;</span>
                    <p>Add to Cart</p>
                    <hr class="ind-style">
                    <form action="" method="POST" id="myForm" onsubmit="return validateItem();">
                        <div class="popup"></div>
                        <img class="popup-image" src="imgsay/franela1.jpg" />
                        <div class="popup-data">
                            <div class="product-quantity">
                                <span>Product Quantity</span>
                                
                                <input type="hidden" id="cartProdId" name="cartProdId"></input>
                                <input type="number" min="1" id="quantity" name="quantity"></input>
                                
                            </div>
                            <div class="cnfrm-itm-note">
                                Note: Some quick example text to build on the card title and make up the bulk of the card's content!
                            </div>
                        </div>
                        <div class="ind-style"></div>
                        <div class="button-bfupop">
                            <input type="submit" value="Add to Cart" class="button-bfupop add-bfu" name="newItem"></input>
                            <input type="button" value="Close" class="button-bfupop close-bfu"></input>
                        </div>
                    </form>
                  </div>

                </div>
                
                
                <script>
                    
                    $( ".s-change" ).on('click', function() {
                      $('#myForm .popup-image').attr('src', $(this).closest('.product').find('img').attr('src'));  
                        
                       $('#i-popup').css('display', 'block');
                       
                       var prodId = $(this).closest('.product').find('.prodId').val();
                       $("#cartProdId").val(prodId);
                    });
                    
                    $(".close, .close-bfu").on('click', function() {
                        $('#i-popup').css('display', 'none');
                    });
                    
                    $(window).click(function(e) {
                        if($(e.target).hasClass('popup')){
                            $('#i-popup').css('display', 'none');
                        }   
                    });
                    
                    function validateItem(){
                        qnty = document.getElementById("quantity").value;
                        if(!isNaN(qnty) && qnty < 1){
                            alert("Please enter a valid quantity for the product!");
                            console.log("Invalid number!");
                        }
                        else{
                            document.getElementById("myForm").submit();
                        }
                    }
                </script>
                
            </div>
			<div class="subscribe buyfrmus-subscrb">				
				<table>					
					<tr>
						<td class="td-class">	
							<span><h2 class="sub-left-span">View Shopping Cart</h2></span>							
							<span class="sub-left-span2">You can see the products that you added to your cart</span>
						</td>
						<td>
							<div class="sub-right-div">
							    <form action="" method="POST">		
								<input type="submit" name="submit" class="bfu-button"/>
								
								</form>
							</div>
						</td>
					</tr>
				</table>
			</div>
			
		

		<div id="footer">
			<hr width="75%">
			<span>Copyright ©2019 All rights reserved | This web is made with ♡ by <span>DiazApps</span></span>
		</div>

	</div>

	<script>
		function rdrct_page() {
			location.replace("buyfromus_popup.html")
		}
	</script>	
	
</body>

</html>
