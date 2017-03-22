<?php

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
        .header h1{
            color: #fff;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }
        #form1{
        	display: none;
        }
        #form2{
        	min-height: 75vh;
        }
        .input_field{
        	background: transparent;
        	border:1px solid #000;
        	color: #000;
        	padding:15px;
        	font-size: 12px;
        	width: 100%;
        	margin: 10px;
        	border-radius: 5px;
        }
        #form1 button, #form2 button{
        	background: #fff;
        	border:1px solid #2d67b2;
        	color: #2d67b2;
        }
        #form1 button:hover, #form2 button:hover{
        	background: #2d67b2;
        	border:1px solid #fff;
        	color: #fff;	
        }
        
        input::-webkit-input-placeholder,textarea::-webkit-input-placeholder { /* WebKit, Blink, Edge */
		    color:    #000;
		}
		input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
		   color:    #000;
		   opacity:  1;
		}
		input::-moz-placeholder { /* Mozilla Firefox 19+ */
		   color:    #000;
		   opacity:  1;
		}
		input:-ms-input-placeholder { /* Internet Explorer 10-11 */
		   color:    #000;
		}
        .head{
        	height: 20vh;
        }
        .search {
        	margin: 20px;
        	background: #fff;
        	padding: 10px;
        	border-radius: 5px;
        	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
        }
        .search div{
        	padding: 5px;
        }
        .result{
        	margin: 20px;
        	padding: 10px;
        	display: none;
        }
        #data_row{
        	background: #fff;
        	padding: 20px;
        	border-radius: 5px;
        	margin-top: 15px;
        	margin-bottom: 15px;
        	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);	
        }
        #result_data{
        	width: 80%;
        	margin: auto;
        }
        td{
        	padding: 10px;
        }
        .book_button{
        	background: #2d67b2;
        	color: #fff;
        	border-radius: 5px;
        	border:0;
        	box-shadow: 0;
        	padding: 10px;
        }
        #date{
        	font-size: 12px;
        }
        .empty{
        	border:1px solid #c12e2a;
        	box-shadow: 0px 0px 2px 1px #c12e2a;
        }
    </style>
</head>
<body>
	<div class="header">
		<h1 class="text-center">GPS Tours and Travels</h1>
	</div>
    <div class="wrapper">

        	<div class="row search">
	        	<form id="form1">
		        	
	    				<div class="col-md-2">
	    					<input id="form1_place_from" class="input_field"  name="from" placeHolder="From Place" type="text" required>
	    				</div>
	    				<div class="col-md-2">
	    					<input id="form1_place_to" class="input_field" name="to" placeHolder="To Place" type="text" required>
	    				</div>
	    			
	    				<div class="col-md-1">
	    					<input id="form1_date_from" class="input_field" name="date_from" placeHolder="Date From" type="text" required>
	    				</div>
	    				<div class="col-md-1">
	    					<input id="form1_date_to" class="input_field" name="date_to" placeHolder="Date To" type="text" required>
	    				</div>
	    				<div class="col-md-2">
	    					<input id="form1_travellers" class="input_field" name="travellers" placeHolder="Travellers" type="number" min="1" max="4" required>
	    				</div>
	    				<div class="col-md-2">
	    					<select class="input_field" id="form1_car_type" name="car_type" required>
	    						<option>economic</option>
	    						<option>standard</option>
	    						<option>luxury</option>
	    					</select>
	    				</div>
	    				<div class="col-md-2">
	    					<button class="input_field" type="button" id="search_button1" name="search_cars_button1" style="font-size: 12px;font-weight: bold;border:2px solid #2d67b2;">Search</button>
	    				</div>
		        	
		        </form>

		        <form id="form2" method="POST" action="controllers/userReqHandler.php">
		        	<div class="col-md-12">
		        		<h1 class="text-center">Book a Car</h1>
		        		<div class="row">
		        			<div class="col-md-3">
		        				
		        			</div>
		        			<div class="col-md-6">
		        				<div class="row">
		        					<div class="col-md-12">
		        						
				    					<input id="form2_place_from" class="input_field" name="from" placeHolder="From Place" type="text" required>
				    				</div>
				    				<div class="col-md-12">
				    					
				    					<input id="form2_place_to" class="input_field" name="to" placeHolder="To Place" type="text" required>
				    				</div>
				    			
				    				<div class="col-md-6">
				    					
				    					<input id="form2_date_from" class="input_field" name="date_from" placeHolder="Date From" id="datepicker3" type="text" required>
				    				</div>
				    				<div class="col-md-6">
				    					<input name="date_to" class="input_field" placeHolder="Date To" type="text" id="form2_date_to" required>
				    				</div>
				    				<div class="col-md-6">
				    					<input id="form2_travellers" class="input_field" name="travellers" placeHolder="Travellers" type="number" min="1" max="4" required>
				    				</div>
				    				<div class="col-md-6">
				    					<select class="input_field" id="form2_car_type" name="car_type" required>
				    						<option>economic</option>
				    						<option>standard</option>
				    						<option>luxury</option>
				    					</select>
				    				</div>
				    				<div class="col-md-12">
				    					<button class="input_field" type="button" id="search_button2" name="search_cars_button" style="font-size: 18px;font-weight: bold;border:2px solid #2d67b2;">Search</button>
				    				</div>

		        				</div>
		        			</div>
		        			<div class="col-md-3">
		        				
		        			</div>
		        		</div>

		        	</div>

		        </form>
	        </div>	 
        
        	<div class="result row" id="result">
        		<div class="col-md-12">

        			<div id="loading" style="margin: 40px;">
        				<center>
	        				<img src="img/processing.gif" style="width: 60px;margin: 10px;" />
	        				<h3>Searching Cars</h3>
	        			</center>	
        			</div>
        			<div id="result_data">
        				
        			</div>
        			
        		</div>
        	</div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center" id="myModalLabel" style="font-weight: bold;">Car Details</h3>
                  </div>
                  <div class="modal-body" id="car_details">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                  </div>
                </div>
              </div>
            </div>
      
    </div>   
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){

    		$("#search_button2").click(function(){
    			var flag=1;
    			var place_from=$("#form2_place_from").val();
    			if(place_from.length<1){
    				$("#form2_place_from").addClass("empty");
    				flag=0;
    			}else $("#form2_place_from").removeClass("empty");
    			var place_to=$("#form2_place_to").val();
    			if(place_to.length<1){
    				$("#form2_place_to").addClass("empty");
    				flag=0;
    			}else $("#form2_place_to").removeClass("empty");
    			var date_from=$("#form2_date_from").val();
    			if(date_from.length<1){
    				$("#form2_date_from").addClass("empty");
    				flag=0;
    			}else $("#form2_date_from").removeClass("empty");
    			var date_to=$("#form2_date_to").val();
    			if(date_to.length<1){
    				$("#form2_date_to").addClass("empty");
    				flag=0;
    			}else $("#form2_date_to").removeClass("empty");

    			var car_type=$("#form2_car_type").val();

    			var travellers_count=$("#form2_travellers").val();
    			if(travellers_count.length<1){
    				$("#form2_travellers").addClass("empty");
    				flag=0;
    			}else $("#form2_travellers").removeClass("empty");

    		
    			if(flag==1){
    				$("#result").slideDown(500);
	    			$("#form2").css({"display":"none"});
	    			$("#form1").slideDown(800);

    				$.ajax({
	    				type:"POST",
	    				url:"controllers/userReqHandler.php",
	    				data:{
	    					from:place_from,
	    					to:place_to,
	    					date_from:date_from,
	    					date_to:date_to,
	    					car_type:car_type,
	    					travellers:travellers_count
	    				},
	    				success:function(data){

	    					$("#loading").css({"display":"none"});
	    					data=JSON.parse(data);
	    					var html_data="	<center><div class='row'>"+
	    									"<div class='col-md-3'>From</div>"+
	    									"<div class='col-md-3'>To</div>"+
	    									"<div class='col-md-3'>Car Model</div>"+
	    								"</div>";	

	    					for(var i=0;i<data.length;i++){

	    						var from=data[i][0];
	    						var date_from=data[i][1];
	    						var to=data[i][2];
	    						var date_to=data[i][3];
	    						var model=data[i][4];
	    						var car_id=data[i][5];

	    						html_data+="<div class='row' id='data_row'>";	
	    						html_data+="<div class='col-md-3'><h3>"+ from +"</h3><span id='date'>on "+ date_from +"</span></div>";
	    						html_data+="<div class='col-md-3'><h3>"+ to +"</h3><span id='date'>on "+ date_to +"</span></div>";
	    						html_data+="<div class='col-md-3'><h4>"+ model +"</h4><a href='#' data-toggle='modal' data-target='#myModal'>Details</a></div>";
	    						html_data+="<div class='col-md-3'>"+
                                                "<form method='POST' action='user_req_review.php'>"+
                                                    "<input type='text' name='from' value='"+from+"' hidden>"+
                                                    "<input type='text' name='to' value='"+to+"' hidden>"+
                                                    "<input type='text' name='date_from' value='"+date_from+"' hidden>"+
                                                    "<input type='text' name='date_to' value='"+date_to+"' hidden>"+
                                                    "<input type='text' name='travellers' value='"+travellers_count+"' hidden>"+
                                                    "<input type='text' name='car_id' value='"+car_id+"' hidden>"+
    	    										"<button type='submit' name='submit' class='book_button' id='"+ car_id +"'>Book Now</button>"+
                                                "</form>"+
	    									"</div>";
	    						html_data+="</div>";	
	    					}
	    					html_data+="</center>";
	    					$("#result_data").html(html_data);

	    				}
	    			});	
    			}
    			
    		});

    		$("#search_button1").click(function(){

    			var flag=1;
    			var place_from=$("#form1_place_from").val();
    			if(place_from.length<1){
    				$("#form1_place_from").addClass("empty");
    				flag=0;
    			}else $("#form1_place_from").removeClass("empty");
    			var place_to=$("#form1_place_to").val();
    			if(place_to.length<1){
    				$("#form1_place_to").addClass("empty");
    				flag=0;
    			}else $("#form1_place_to").removeClass("empty");
    			var date_from=$("#form1_date_from").val();
    			if(date_from.length<1){
    				$("#form1_date_from").addClass("empty");
    				flag=0;
    			}else $("#form1_date_from").removeClass("empty");
    			var date_to=$("#form1_date_to").val();
    			if(date_to.length<1){
    				$("#form1_date_to").addClass("empty");
    				flag=0;
    			}else $("#form1_date_to").removeClass("empty");
    			var car_type=$("#form1_car_type").val();
    			if(car_type.length<1){
    				$("#form1_car_type").addClass("empty");
    				flag=0;
    			}else $("#form1_car_type").removeClass("empty");
    			var travellers_count=$("#form1_travellers").val();
    			if(travellers_count.length<1){
    				$("#form1_travellers").addClass("empty");
    				flag=0;
    			}else $("#form1_travellers").removeClass("empty");

    			if(flag==1){
    				$.ajax({
	    				type:"POST",
	    				url:"controllers/userReqHandler.php",
	    				data:{
	    					from:place_from,
	    					to:place_to,
	    					date_from:date_from,
	    					date_to:date_to,
	    					car_type:car_type,
	    					travellers:travellers_count
	    				},
	    				success:function(data){
	    					console.log(data);
	    					$("#result_data").empty();
	    					$("#result_data").css({"display":"none"});
	    					data=JSON.parse(data);
	    					var html_data="	<center><div class='row'>"+
	    									"<div class='col-md-3'>From</div>"+
	    									"<div class='col-md-3'>To</div>"+
	    									"<div class='col-md-3'>Car Model</div>"+
	    								"</div>";	

	    					for(var i=0;i<data.length;i++){

	    						var from=data[i][0];
	    						var date_from=data[i][1];
	    						var to=data[i][2];
	    						var date_to=data[i][3];
	    						var model=data[i][4];
	    						var car_id=data[i][5];

	    						html_data+="<div class='row' id='data_row'>";	
	    						html_data+="<div class='col-md-3'><h3>"+ from +"</h3><span id='date'>on "+ date_from +"</span></div>";
	    						html_data+="<div class='col-md-3'><h3>"+ to +"</h3><span id='date'>on "+ date_to +"</span></div>";
	    						html_data+="<div class='col-md-3'><h4>"+ model +"</h4><a href='#' data-toggle='modal' data-target='#myModal'>Details</a></div>";
	    						html_data+="<div class='col-md-3'>"+
	    										"<button class='book_button' id='"+ car_id +"'>Book Now</button>"+
	    									"</div>";
	    						html_data+="</div>";	
	    					}
	    					html_data+="</center>";
	    					$("#result_data").html(html_data).slideDown(500);

	    				}
	    			});	
    			}
    			
    		});
    	});
    </script>
</body>
</html>
