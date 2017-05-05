<?php 

	$userExist;
	session_start();
	if(isset($_SESSION['user_id'])){
		$userExist=1;
		$user_id=$_SESSION['user_id'];
		$user_type=$_SESSION['user_type'];
		require 'connection.php';
		mysql_select_db('tour and travel');
		if($user_type=="admin"){
			$sql="SELECT * from `agent` where id='$user_id'";
			$userExist=1;
		}else if($user_type=="customer"){
			$sql="SELECT * from `users` where id='$user_id'";	
		}
		$user_vals=mysql_fetch_assoc(mysql_query($sql));
	}
	else{
		$userExist=0;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GPS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles6.css">
    <style type="text/css">
		    .flex-center {
		    align-items: center;
		    display: flex;
		    justify-content: center;
		    background-image: url("img/logo5.png");
		    background-repeat: no-repeat;
		    background-position: center 0;
		    background-attachment: fixed;
		    background-size: cover;
		}
        #team a{
            color: #000;
            text-decoration: none;
        }
        #team a:hover{
            color: #A52222;
        }
        #logo_text{
        	text-shadow: 2px 2px 15px #000;
        }
        .links a{
        	text-shadow: 2px 2px 10px #000;
        }
        #f_img{
        	width: 150px;
        	margin-top: 10px;
        }
        #about-us, .testimonials{
        	background: #2d67b2;
        	padding: 30px;
        }
        #about-us h1,#about-us h4{
        	color: #fff;
        	font-weight: bold;
        }
        .testimonials h1,.testimonials h4{
        	color: #fff;
        	font-weight: bold;
        }
        .testimonials p{
        	color: #fff;
        	font-weight: bold;
        }
        #contact{
        	background: #fff;
        	padding: 30px;
        }
        .footer{
        	background: #aaa;
        	padding: 40px;
        }
        .footer h3{
        	font-weight: bold;
        	
        }
        .options{
        	margin-top: 40px;
        	margin-bottom: 40px;
        }
        #logout_button{
        	color: #fff;
        	background: transparent;
        	border:0;
        	font-weight: bold;
        	box-shadow: 0;
        	text-shadow: 1px 1px 5px #000;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                   <span style="color: #fff;" id="logo_text">GPS</span><br>
                   <span style="color: #fff;" id="logo_text">Tours and Travels</span>
                </div>

                <div class="links">
                	<?php 

                		if($userExist==1 || $user_type=="customer"){
                			?>
                				<!-- <a href="user_request.php">Book a Car</a>			 -->
                				<a href="user/profile.php">
                					<?php echo $user_vals['username']; ?>
                				</a>			
                			<?php
                		}else if($userExist==1 && $user_type=="admin"){
                			?>
                				<a href="admin/adminPortal.php">Admin Portal</a>		
                			<?php
                		}else{
                			?>
                				<a href="login.php">Log In / Register</a>		
                			<?php
                		}
                	 ?>
                    <a href="cars.php">Cars</a>
                    <a href="login.php">Log In / Register</a>		
                    <a href="#about-us">About Us</a>
                    <a href="#contact">Contact Us</a>
                    <?php 
                    	if($userExist==1){
                    		?>
                    			<a href="logout.php">Logout</a>
                    		<?php
                    	}
                    	else{
                    		?>
                    			<a href="admin_login.php">Admin Login</a>		
                    		<?php
                    	}
                     ?>
                    
                </div>
            </div>
        </div>

        <div class="content">
        <hr style="background: #f0f0f0;">
        	<div class="row">

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img id="f_img" src="img/f1.png" alt="...">
				      <div class="caption">
				        <h3 class="text-center">Fast and Safe</h3>

				        <p class="text-center" style="padding: 20px;">
				        	With our support, having awesome experience of travelling has never been easier, faster and safer.
				        </p>
				      </div>
				    </div>
				  </div>
				  
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img id="f_img" src="img/f2.png" alt="...">
				      <div class="caption">
				        <h3 class="text-center">Best Prices</h3>
				        <p class="text-center" style="padding: 20px;">
					        With our support, having awesome experience of travelling has never been easier, faster and safer.
				        </p>
				      </div>
				    </div>
				  </div>

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img id="f_img" src="img/f3.png" alt="...">
				      <div class="caption">
				        <h3 class="text-center">Package Delivery</h3>
				        <p class="text-center" style="padding: 20px;">
					        With our support, having awesome experience of travelling has never been easier, faster and safer.
				        </p>
				      </div>
				    </div>
				  </div>

			</div>

			<hr style="background: #f0f0f0;">

			<div id="about-us">
				<h1>Who We Are?</h1>
				<hr style="background: #2d67b2;margin: 40px;">
				<div class="row">
					<div class="col-sm-6">
						<img src="img/1.jpg">
					</div>
					<div class="col-sm-6">
						<h4 style="padding: 10%; word-spacing: 2px;line-height: 25px;">
							GPS Tours and Travels is an aggregator of car rentals and taxis in India. We work with various taxi operators and enable them with technology to ensure customers get an easily accessible, safe & reliable taxi ride ‘for sure’.
						</h4>
					</div>
				</div>	
				<hr style="background: #2d67b2;margin: 40px;">
			</div>

			<div class="options">
			<hr style="background: #f0f0f0;">
				<h1>Choose what is best for you</h1>
				<hr style="background: #f0f0f0;">
				<div class="row">
					<div class="col-md-4">
						<center>
							<img src="img/car1.png" style="width: 420px;">

						<br>
						
							<h4>
								Economy Cars
							</h4>
						</center>
					</div>
					<div class="col-md-4">
						<center>
							<img src="img/car2.png" style="width: 420px;">

						<br>
						
							<h4>
								Standard Cars
							</h4>
						</center>
					</div>
					<div class="col-md-4">
						<center>
							<img src="img/car3.png" style="width: 420px;">

						<br>
						
							<h4>
								Luxury Cars
							</h4>
						</center>
					</div>
				</div>
			</div>

			<div class="testimonials">
				<div class="row">
					<h1>Testimonials</h1>
					<hr style="background: #2d67b2;margin: 40px;">
					<div class="col-md-3">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
						<h4>
							- Gaurav Sharma
						</h4>
					</div>
					<div class="col-md-3">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
						<h4>
							- Gaurav Sharma
						</h4>
					</div>
					<div class="col-md-3">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
						<h4>
							- Gaurav Sharma
						</h4>
					</div>
					<div class="col-md-3">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
						<h4>
							- Gaurav Sharma
						</h4>
					</div>
				</div>
				<hr style="background: #2d67b2;margin: 40px;">
			</div>

			<div id="contact">

				
				<h1 style="color: #000; text-shadow: 0px 0px 0px ;">Contact Us</h1>
				<hr style="background: #fff;margin: 40px;height: 2px;">

				<div class="row">
					<div class="col-md-3">
						
					</div>
                    <div class="col-md-6">
                        <div class="row form">
                            <form method="POST" action="message/">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Your Email ID" required>
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" name="msg" class="form-control" placeholder="Your Message" style="height: 100px;" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="submit" value="Send Message" id="button">
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
						
					</div>

                </div>
                
			</div>
		
		</div>
       
        <div class="footer">
        	<h3 class="text-center" style="color: #2d67b2;">GPS Tours and Travel © 2017 | Privacy Policy</h3>
        	<div class="row">
        		<div class="col-md-12">
        			<center>
        				<img src="img/facebook.png" style="width: 60px; margin: 10px;">
        				<img src="img/instagram.png" style="width: 60px; margin: 10px;">
        			</center>
        		</div>
        	</div>
        </div>

    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
