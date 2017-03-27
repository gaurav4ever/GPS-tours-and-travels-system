<?php 
    $userExist;
	session_start();
	if(isset($_SESSION['user_id'])){
		$userExist=1;
		$user_id=$_SESSION['user_id'];
		$user_type=$_SESSION['user_type'];
		require '../connection.php';
		mysql_select_db('tour and travel');
		$sql="SELECT * from `users` where id='$user_id'";	
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles5.css">
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="../js/jquery-1.12.3.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#table').DataTable();
      } );
    </script>
    <style type="text/css">
    	body{
    		background: #efefef;
    	}
    	h1,h2,h3,h4{
    		padding: 0;
    		margin: 0;
    	}
        .header{
            padding: 20px;
            background: #2d67b2;
        }
        .header h4,.header h3{
            color: #fff;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }
        .footer{
            background: #aaa;
            padding: 40px;
        }
        .footer h3{
            text-shadow: 1px 1px 10px #000;
        }
        .profile_body{
        	margin-top: 30px;
        	margin-bottom: 30px;
        }
        .side-bar{
        	
        	background: #fff;
        	height: 80vh;
        	padding: 10px;
        	border-radius: 5px;
        	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
        }
        .main-body{
        	background: #fff;
        	height: 80vh;
        	padding: 20px;
        	border-radius: 5px;
        	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
        }
        .side-bar ul{
        	padding: 0;
        	margin: 0;
        }
        .side-bar ul li{
        	list-style: none;
        	padding: 10px;
        	font-size: 16px;
        }
        .side-bar ul li a{
        	margin-left: 5px;
        }
        #profile_options{
        	padding: 10px;
        	margin-top: 5px;
        	color: #fff;
        	font-size: 16px;
        }
        #dLabel{
        	background: #2d67b2;
        	border: 0;
        	color: #fff;
        	box-shadow: 0;
        	padding-left: 10px;
        	padding-right: 10px;
        }
        #dlabel li{
        	padding: 5px;
        	background-color: #2d67b2;
        	color: #2d67b2;
        }
        table{
        	margin-top: 20px;
        }
        td{
        	padding: 5px;
        }
        #logo_link{
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="row">
        	<div class="col-md-6">
        		<a href="../index.php" id="logo_link"><h3>GPS Tours and Travels &nbsp;| &nbsp; My Trips</h3></a>
        	</div>
        	
        	<div class="col-md-2 pull-right">

        		<div class="row">
        			
        			<div class="col-md-12">
        				<div class="dropdown">
						  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	profile
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dLabel">
						    	<li><a href="profile.php">Profile</a></li>
						    	<li><a href="../index.php">Home</a></li>
						    	<li><a href="../logout.php">Logout</a></li>
						  </ul>
						</div>		
        			</div>
        		</div>
        	</div>
        </div>
    </div>

    <div class="row profile_body">
    	<div class="col-md-2">
    		<div class="side-bar">
		    	<ul>
		    		<li>
		    			<img src="../img/pi1.png" style="width: 20px;">
		    			<a href="wishList.php">My Wish list</a>
		    		</li>
		    		<li>
		    			<img src="../img/pi2.png" style="width: 20px;">
		    			<a href="bookings.php">My Trips</a>
		    		</li>
		    		<li>
		    			<img src="../img/pi3.png" style="width: 20px;">
		    			<a href="settings.php">Settings</a>
		    		</li>
		    		<li><hr style="margin: 1px;"></li>
		    		<li><a href="profile.php">Profile</a></li>
		    	</ul>
		    </div>		
    	</div>
    	<div class="col-md-10">
    		<div class="main-body">
    			<h1>My Information</h1>	
    			<table>
    				<tbody>
    					<tr>
    						<td><label>Name</label></td>
    						<td>:</td>
    						<td><?php echo $user_vals['username']; ?></td>
    					</tr>
    					<tr>
    						<td><label>Email ID</label></td>
    						<td>:</td>
    						<td><?php echo $user_vals['email']; ?></td>
    					</tr>
    					<tr>
    						<td><label>Mobile</label></td>
    						<td>:</td>
    						<td><?php echo $user_vals['mobile']; ?></td>
    					</tr>
    				</tbody>
    			</table>
    		</div>		
    	</div>
    </div>
    
    
        
    <div class="footer">
        <h3 class="text-center" style="color: #2d67b2;">GPS Tours and Travel © 2017 | Privacy Policy</h3>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <img src="../img/facebook.png" style="width: 60px; margin: 10px;">
                    <img src="../img/instagram.png" style="width: 60px; margin: 10px;">
                </center>
            </div>
        </div>
    </div>
    
    <script src="../js/bootstrap.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>
