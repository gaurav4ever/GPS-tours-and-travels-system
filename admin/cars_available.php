<?php 
	require("../connection.php");
	mysql_select_db('tour and travel');
	$sql="SELECT * FROM cars_available WHERE 1";
	$retval=mysql_query($sql);
	if(!$retval)die("server error");
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

        .header{
        	padding: 20px;
        	background: #2d67b2;
        }
        .header h1{
        	color: #fff;
        	font-weight: bold;
            padding: 0;
            margin: 0;
        }
        .wrapper{
            width: 90%;
            margin: auto;
        	padding: 10px;
        }
        ul{
            padding: 0;
            margin: 0;
        }
        ul li{
            display: inline;
            padding: 5px;
        }
        ul li a{
            font-size: 16px;
        }
        .footer{
        	background: #aaa;
        	padding: 40px;
        }
        .footer h3{
        	text-shadow: 1px 1px 10px #000;
        }
        .options{
        	margin-top: 10px;
        	margin-bottom: 10px;
        }
        .main-content{
            background: #fff;
            height: 100vh;
        }
        #active{
            color: #2d67b2;
            font-weight: bold;
        }
        .main-content{
        	padding: 10px;
        }
        .table{
        	width: 70%;
        	margin: auto;
        	margin-top: 10px;
        	padding: 20px;
        }
    </style>
</head>
<body>

	<div class="header">
		<h1 class="text-center">GPS Tours and Travel | Admin Handler</h1>
	</div>

    
        <div class="options">
            <center>
                <ul>
                    <li>
                        <a href="adminPortal.php">Pending Booking</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="history.php">Booking History</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="cars_available.php" id="active">Available Cars</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="drivers_available.php">Available Drivers</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="../logout.php">Logout</a>
                    </li>
                </ul>
            </center>
        </div>

        <div class="main-content">
        		<div class="table">
        			<table id="table">
	            		<thead>
	            			<tr>
	            				<td><label> id </label></td>
	            				<td><label> Model </label></td>
	            				<td><label> Type </label></td>
	            				<td><label> Available </label></td>
	            				<td><label> Booked Till </label></td>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php 
	            				while($val=mysql_fetch_assoc($retval)){
	            			 ?>
	            			<tr>
	            				<td><label><?php echo $val['id']; ?></label></td>
	            				<td><?php echo $val['model']; ?></td>
	            				<td><?php echo $val['type']; ?></td>
	            				<td><?php echo $val['Available']; ?></td>
	            				<td><?php echo $val['booked_till']; ?></td>
	            			</tr>
	            			<?php 
	            				}
	            			 ?>
	            		</tbody>
	            	</table>
        		</div>
        </div>
       
    <div class="footer">
    	<h3 class="text-center" style="color: #ecd409;">GPS Tours and Travel © 2017 | Privacy Policy</h3>
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
