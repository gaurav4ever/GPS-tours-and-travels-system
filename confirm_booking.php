<?php

	require 'connection.php';
	mysql_select_db('tour and travel');
 	session_start();

    $booking_id=$_GET['booking_id'];

	$sql="SELECT * FROM `applied_users` WHERE id='$booking_id'";
 	$retval=mysql_query($sql);
 	if(!$retval)die("Server Error");
 	$booking_detail=mysql_fetch_assoc($retval);

 	$user_id=$_SESSION['user_id'];
 	$sql="SELECT * from `users` where id='$user_id'";	
 	$user_val=mysql_fetch_assoc(mysql_query($sql));
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GPS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles5.css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="js/jquery-1.12.3.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
	  $(document).ready(function() {
	    $('#table').DataTable();
	  } );
	</script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
        body{
        	font-family: 'Raleway', sans-serif;
		    font-weight: 100;
		    
		    margin: 0;
		    /*background-image: url("img/2.png");*/
		    /*background: url("img/back2.png");*/
		    background: #efefef;
		    background-repeat: no-repeat;
		    background-position: center 0;
		    background-size: cover;
		    background-attachment: fixed;
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
        #profile_options{
        	padding: 10px;
        	margin-top: 5px;
        	color: #fff;
        	font-size: 16px;
        }
        .wrapper{
        	width: 80%;
        	margin: auto;
        }
        .body_area{
        	margin: 20px;
        	background: #fff;
        	padding: 10px;
            height: 80vh;
        	border-radius: 5px;
        	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
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
        td{
            padding: 10px;
            font-size: 18px;
        }
        td span{
            font-size: 14px;
        }
        button{
            padding: 10px 15px 10px 15px;
            border:1px solid #fff;
            border-radius: 10px;
            background-color: #2d67b2;
            color: #fff;
        }
        
    </style>
</head>
<body>
	<div class="header">
        <div class="row">
        	<div class="col-md-3">
        		<h3>GPS Tours and Travels</h3>
        	</div>
        	
        	<div class="col-md-2 pull-right">
        		<div class="row">
        			<div class="col-md-3">
        				<img src="img/wishlist_icon.png" style="width: 20px;">		
        			</div>
        			<div class="col-md-9">
        				<div class="dropdown">
						  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	profile
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dLabel">
						    	<li><a href="user/profile.php">Profile</a></li>
						    	<li><a href="index.php">Home</a></li>
						    	<li><a href="logout">Logout</a></li>
						  </ul>
						</div>		
        			</div>
        		</div>
        	</div>
        </div>
    </div>

    <div class="wrapper">
    	
        <div class="row body_area">
            <div class="col-md-12">
                <center>

                    <h1 style="color: #2d67b2;font-weight: bold;padding: 0;margin: 10;font-size: 60px;">Booking Confirmed :)</h1>
                    <hr>

                <table>
                    <tbody>
                        <tr>
                            <td><label>Booking ID</label></td>
                            <td>:</td>
                            <td><?php echo $booking_detail['id']; ?></td>
                        </tr>
                        <tr>
                            <td><label>From</label></td>
                            <td>:</td>
                            <td><?php echo $booking_detail['place_from']; ?> &nbsp;<span>@<?php echo $booking_detail['date_from']; ?></span></td>
                        </tr>
                        <tr>
                            <td><label>To</label></td>
                            <td>:</td>
                            <td><?php echo $booking_detail['place_to']; ?> &nbsp;<span>@<?php echo $booking_detail['date_to']; ?></span></td>
                        </tr>
                        <tr>
                            <td><label>Price</label></td>
                            <td>:</td>
                            <td>$400</td>
                        </tr>
                        <tr>
                            <td><label>Status</label></td>
                            <td>:</td>
                            <td><?php echo $booking_detail['status']; ?></td>
                        </tr>
                    </tbody>
                </table>

                    <hr>
                    
                    <button>Print Ticket</button>
                    <button>Home</button>

                    <br/><br/>

                    <h4 style="margin: 0;color: #ab0303;font-weight: bold;">You will get a message when driver is assigned to you</h4>
                    
                </center>
            </div>
        </div>

    </div>  
    <hr style="margin: 80px;"> 
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
   
</body>
</html>
