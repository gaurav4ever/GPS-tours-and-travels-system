<?php

	require 'connection.php';
	mysql_select_db('tour and travel');
 	session_start();

  if(!isset($_SESSION['user_id'])){
    die("You are not logged in");
  }

	if(isset($_POST['submit'])){
		$from=$_POST['from'];
 		$to=$_POST['to'];
 		$date_from=$_POST['date_from'];
 		$date_to=$_POST['date_to'];
 		$car_id=$_POST['car_id'];
 		$travellers=$_POST['travellers'];

 		$sql="SELECT * FROM `cars_available` WHERE id='$car_id'";
 		$retval=mysql_query($sql);
 		if(!$retval)die("Server Error");
 		$car=mysql_fetch_assoc($retval);

 		$user_id=$_SESSION['user_id'];
 		$sql="SELECT * from `users` where id='$user_id'";	
 		$user_val=mysql_fetch_assoc(mysql_query($sql));
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
      <script>
      $( function() {
        $( "#form1_date_from" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $( "#form1_date_to" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $( "#form2_date_from" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $( "#form2_date_to" ).datepicker({ dateFormat: 'dd-mm-yy' });
      } );
      </script>
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
        .review,.payment,.customer{
        	margin: 20px;
        	background: #fff;
        	padding: 10px;
        	border-radius: 5px;
        	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
        }
        .payment{
        	padding-top: 20px;
        }
        .review_area{
        	margin: 20px;
        	padding: 20px;
        	border:1px solid #efefef;
        }
        td{
        	padding: 10px;
        }
        .style_input{
        	border-radius: 5px;
        	border: 1px solid #2d67b2;
        	padding: 5px;
        	width: 250px;
        }
        .options_area{
        	margin-top: 20px;
        }
        .options_area button{
        	background: #2d67b2;
        	border: 0;
        	margin: 10px;
        	border-radius: 5px;
        	color: #fff;
        	font-size: 16px;
        	padding: 15px 25px 15px 25px;
        }
        .payment_options{
        	margin-top: 40px;
        }
        .po img,.po h5{
        	cursor: pointer;
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
        				<img src="img/wishlist_icon.png" id="wish_list_img" style="width: 20px;">		
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
    <div class="row options_area">
              <div class="col-md-12">
                <center>

                <!-- field to add in database -->

                
                  
                  <input type="text" name="p_from" id="id_pfrom" value="<?php echo $from; ?>" hidden="">
                  <input type="text" name="p_to" id="id_pto" value="<?php echo $to; ?>" hidden="">
                  <input type="text" name="d_from" id="id_dfrom" value="<?php echo $date_from; ?>" hidden="">
                  <input type="text" name="d_to" id="id_dto" value="<?php echo $date_to; ?>" hidden="">
                  <input type="text" name="t_count" id="id_tcount" value="<?php echo $travellers; ?>" hidden="">
                  <input type="text" name="user_id" id="id_u_id" value="<?php echo $user_id; ?>" hidden="">
                  <input type="text" name="car_id" id="id_c_id" value="<?php echo $car_id; ?>" hidden="">
                  <input type="text" name="price" id="id_price" value="400" hidden="">
                  <input type="text" name="payment_method" id="pm" hidden="">

                  <h5 id="exist" style="display:none;color: #ab0303;font-weight: bold;">Trip Already in you wish list</h5>

                  <button id="wish_list_button">Add to Wish List</button>

                 


                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button id="make_payment_button">Make Payment</button>
                  <div class="alert alert-danger" id="error_text" role="alert" style="margin-top: 10px;display: none;">
                    please select Payment Option
                  </div>
                </center>
              </div>
            </div>
    	<h3>Review Your Booking</h3>
      	<div class="review row">
      		<div class="col-md-12">
      			<div class="row review_area">
      				<div class="col-md-3">
      					<div class="from pull-right">
      						<label><?php echo $date_from; ?></label>
	      					<h4><?php echo $from; ?></h4>		
      					</div>
	      				
		      		</div>
		      		<div class="col-md-1">
		      			<center>
		      				<img src="img/arrow.png" style="width:30px; margin-top: 40%;">
		      			</center>
		      		</div>
		      		<div class="col-md-4">
		      			<center>
		      				<h3 style="margin: 5px;"><?php echo $car['model'] ?></h3>
		      				<span><?php echo $travellers; ?> person</span>
		      			</center>
		      		</div>
		      		<div class="col-md-1">
		      			<center>
		      				<img src="img/arrow.png" style="width:30px; margin-top: 40%;">
		      			</center>
		      		</div>
		      		<div class="col-md-3">
		      			<label><?php echo $date_to; ?></label>
		      			<h4><?php echo $to; ?></h4>
		      		</div>		
      			</div>
      		</div>
      		
      	</div>

      	<h3>Customer Details</h3>
      	<div class="row customer">
      		<div class="col-md-12">
      			<table>
      				<tbody>
      					<tr>
      						<td><h5 style="font-weight: bold;">Customer Name</h5></td>
      						<td><label>:</label></td>
      						<td><h5><?php echo $user_val['username'] ?></h5></td>
      					</tr>
      					<tr>
      						<td><h5 style="font-weight: bold;">Email</h5></td>
      						<td><label>:</label></td>
      						<td>
      							<input type="text" class="style_input" id="id_u_email" name="user_email" value="<?php echo $user_val['email'] ?>">
      							&nbsp;&nbsp;<input type="checkbox" name="send_details"> Email Me the details
      						</td>
      					</tr>
      					<tr>
      						<td><h5 style="font-weight: bold;">Mobile</h5></td>
      						<td><label>:</label></td>
      						<td>
      							<input type="text" class="style_input" name="user_mobile" id="id_u_mobile" value="<?php echo $user_val['mobile'] ?>" required>
      							&nbsp;&nbsp;<a href="#">verify</a>
      						</td>
      					</tr>
      					<tr>
      						<td><h5 style="font-weight: bold;">Pick Up Location</h5></td>
      						<td><label>:</label></td>
      						<td>
      							<input type="text" class="style_input" name="user_location" id="id_u_location" placeholder="Write Here" required>
      							&nbsp;&nbsp;<a href="#">user my current location</a>
      						</td>
      					</tr>
      				</tbody>
      			</table>

      			<div class="alert alert-danger" role="alert" style="margin-top: 10px;">
      				<label>NOTE : </label>&nbsp; Any changes here will not be saved in you account
      			</div>
      		</div>
      	</div>

      	<h3>Payment Details</h3>
      	<div class="row payment">
      		<div class="col-md-12">
      			<div class="row">
      				<div class="col-md-1">
      					<img src="img/money.png" style="width: 50px;">
      				</div>
      				<div class="col-md-3">
      					<h3><strong>Grand Total :</strong> &nbsp; $400</h3>
      				</div>
      				<div class="col-md-3">
      					<h5 style="margin-top: 25px;color: #2d67b2;cursor: pointer;" id="coupon_text" data-toggle='modal' data-target='#myModal'>Have Coupon ?</h5>
      				</div>
      			</div>
      			
      			<div class="row payment_options">
      				<div class="col-md-12">
      					<center>	
      					<h3 style="margin-bottom: 20px;color: #2d67b2;font-weight: bold;">Payment Options</h3>
      					<hr>
      					<div class="row">
      						<div class="col-md-3 po" id="cc">
      							<img id="cc_img" src="img/po1.png" style="width: 50px;">
      							<h5>Credit Card</h5>
      						</div>
      						<div class="col-md-3 po" id="dc">
      							<img id="dc_img" src="img/po2.png" style="width: 50px;">
      							<h5>Debit Card</h5>
      						</div>
      						<div class="col-md-3 po" id="nb">
      							<img id="nb_img" src="img/po3.png" style="width: 50px;">
      							<h5>Net Banking</h5>
      						</div>
      						<div class="col-md-3 po" id="coc">
      							<img id="coc_img" src="img/po4.png" style="width: 50px;">
      							<h5>Cash On Completion</h5>
      						</div>
      					</div>
      					</center>
      				</div>
      			</div>
      			<hr style="margin-top: 5px;">
      			
      		</div>
      	</div>

      	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body" id="car_details">
              	<div class="row">
              		<div class="col-md-6">
              			<center>
              				<img src="img/happy_face.jpg" style="width: 80%">
              			</center>
              		</div>
              		<div class="col-md-6">
              			<div class="coupon_area" style="margin-top: 20%;">
              				<center>
		                		<input type="text" name="coupon_code" id="style_input" placeholder="coupon code" style="padding: 15px;">
		                		<br><br>
		                		<button type="button" class="btn btn-primary" data-dismiss="modal">Apply</button>
		                	</center>		
              			</div>
              		</div>
              	</div>
                	
              </div>
            </div>
          </div>
        </div>


    </div>  
    <hr style="margin: 80px;"> 
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <script src='js/fly_to_cart3.js'></script>
    <script type="text/javascript">
    	$(document).ready(function(){
        var wish_list_done="0";
    		$("#cc").click(function(){
    			$("#cc_img").attr("src","img/po1_.png");
    			$("#dc_img").attr("src","img/po2.png");
    			$("#nb_img").attr("src","img/po3.png");
    			$("#coc_img").attr("src","img/po4.png");
    			$("#pm").val("cc");
    		});
    		$("#dc").click(function(){
    			$("#cc_img").attr("src","img/po1.png");
    			$("#dc_img").attr("src","img/po2_.png");
    			$("#nb_img").attr("src","img/po3.png");
    			$("#coc_img").attr("src","img/po4.png");
    			$("#pm").val("dc");
    		});
    		$("#nb").click(function(){
    			$("#cc_img").attr("src","img/po1.png");
    			$("#dc_img").attr("src","img/po2.png");
    			$("#nb_img").attr("src","img/po3_.png");
    			$("#coc_img").attr("src","img/po4.png");
    			$("#pm").val("nb");
    		})
    		$("#coc").click(function(){
    			$("#cc_img").attr("src","img/po1.png");
    			$("#dc_img").attr("src","img/po2.png");
    			$("#nb_img").attr("src","img/po3.png");
    			$("#coc_img").attr("src","img/po4_.png");
    			$("#pm").val("coc");
    		});

        // make payment button
    		$("#make_payment_button").click(function(){
    			var payment_method_val=$("#pm").val();
    			if(payment_method_val<1){
    				$("#error_text").slideDown(200);	
    			}
    			else{
    				$("#error_text").css({"display":"none"});		
            $("#error_text").slideUp(100);  

            var flag=1;
            // send data to database
            var user_id=$("#id_u_id").val();
            var user_email=$("#id_u_email").val();
            var user_mobile=$("#id_u_mobile").val();
            var user_location=$("#id_u_location").val();
            if(user_location<1){
              flag=0;
              alert("please enter your location");
            }
            var car_id=$("#id_c_id").val();
            var p_from=$("#id_pfrom").val();
            var p_to=$("#id_pto").val();
            var d_from=$("#id_dfrom").val();
            var d_to=$("#id_dto").val();
            var t_count=$("#id_tcount").val();
            var payment_method=$("#pm").val();

            console.log(user_id+" "+user_email+" "+user_mobile+" "+user_location+" "+car_id+" "+p_from+" "+p_to+" "+d_from+" "+d_to+" "+t_count+" "+payment_method);

            if(flag==1){

                $.ajax({
                    type:"POST",
                    url:"controllers/bookTripHandler.php",
                    data:{
                        user_id:user_id,
                        user_email:user_email,
                        user_mobile:user_mobile,
                        user_location:user_location,
                        car_id:car_id,
                        p_from:p_from,
                        p_to:p_to,
                        d_from:d_from,
                        d_to:d_to,
                        t_count:t_count,
                        payment_method:payment_method
                    },
                    success:function(data){
                        data=JSON.parse(data);
                        var booking_id=data['booking_id'];
                        window.location.replace("confirm_booking.php?booking_id="+booking_id+"");        
                    }
                });  
            }
            
    			}
    		});
    	});
    </script>
</body>
</html>
