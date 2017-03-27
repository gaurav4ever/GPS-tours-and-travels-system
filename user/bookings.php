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

        $wSql="SELECT * FROM applied_users WHERE inWishList='0'";
        $wRetavl=mysql_query($wSql);
        if(!$wRetavl)die("Server Error");

        $flag=0;
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
            padding: 20px;
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
        .wish_list_item{
            background: #fff;
            padding: 20px 10px 20px 10px;
            border-radius: 5px;
            margin-bottom: 15px;
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
            margin-top: 15px;
            margin-left: 20px;
        }
        td{
            padding-left: 5px;
            padding-right: 5px;
        }
        h5{
            margin: 0;
        }
        #logo_link{
            text-decoration: none;
        }
        #place_from_to{
            font-size: 20px;
            color: #2d67b2;
            font-weight:bold;
        }
        #confirm_button{
            background: #2d67b2;
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            margin-top: 10px;
            padding: 10px 20px 10px 20px;
        }
        #remove_button{
            background: #ab0303;
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            margin-top: 10px;
            padding: 10px 20px 10px 20px;
        }
        .bin:hover{
            cursor: pointer;
        }
        #status_text1{
            background: #2d67b2;
            padding: 10px;
            color: #fff;
            font-size: 15px;
            margin: 0;
            border-radius: 5px;
        }
        #status_text2{
            background: green;
            padding: 10px;
            color: #fff;
            font-size: 15px;
            margin: 0;
            border-radius: 5px;
        }
        #status_text3{
            background: #9C9C9C;
            padding: 10px;
            color: #fff;
            font-size: 15px;
            margin: 0;
            border-radius: 5px;
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

                
                
                <?php 
                    while($wVal=mysql_fetch_assoc($wRetavl)){
                        $user_id=$wVal['customer_id'];
                        $userSql="SELECT * FROM users WHERE id='$user_id'";
                        $userVal=mysql_fetch_assoc(mysql_query($userSql));

                        $car_id=$wVal['car_id'];
                        $carSql="SELECT * FROM cars_available WHERE id='$car_id'";
                        $carVal=mysql_fetch_assoc(mysql_query($carSql));

                 ?>
                <div class="row wish_list_item" id="row_<?php echo $wVal['id']?>">
                    <div class="col-md-3">
                        <div class="row">
                             <div class="col-md-12">
                                <span id="place_from_to"><?php echo ucfirst($wVal['place_from']) ?></span>
                                &nbsp;on
                                <strong><?php echo $wVal['date_from'] ?></strong>
                             </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <span id="place_from_to"><?php echo ucfirst($wVal['place_to']) ?></span>
                                &nbsp;on
                                <strong><?php echo $wVal['date_to'] ?></strong>
                             </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <span style="font-size: 12px;font-weight: bold;">Car Name</span>
                            <br/>
                            <p style="margin-top: 10px;font-weight: bold;font-size: 18px;"><?php echo $carVal['model']; ?></p>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <span style="font-size: 12px;font-weight: bold;">Booked On</span>
                            <br/>
                            <p style="margin-top: 10px;"><?php echo $wVal['booking_time']; ?></p>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <span style="font-size: 12px;font-weight: bold;">Status</span>
                            <br/>
                            <?php 
                                if($wVal['status']=='wfd'){
                                    ?>
                                    <h4 id="status_text1" style="margin-top: 10px;">Waiting For Driver</h5>
                                <?php
                                }
                                else if($wVal['status']=='confirmed'){
                                    $flag=1;
                                    ?>
                                    <h4 id="status_text2" style="margin-top: 10px;">Confirmed</h5>
                                <?php
                                }
                                else{
                                    $flag=1;
                                    ?>
                                    <h4 id="status_text3" style="margin-top: 10px;">Travelled</h5>
                                <?php
                                }
                             ?>
                            
                        </center>
                    </div>
                    <div class="col-md-6">
                        <hr>
                        <h3 style="margin: 0;padding: 0;">Traveller Details</h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td><h5 style="font-weight: bold;">Number of Travellers</h5></td>
                                    <td><label>:</label></td>
                                    <td><h5><?php echo $wVal['no_of_travellers'] ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 style="font-weight: bold;">Customer Name</h5></td>
                                    <td><label>:</label></td>
                                    <td><h5><?php echo $userVal['username'] ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 style="font-weight: bold;">Mobile Number</h5></td>
                                    <td><label>:</label></td>
                                    <td><h5><?php echo $wVal['email'] ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 style="font-weight: bold;">Email</h5></td>
                                    <td><label>:</label></td>
                                    <td><h5><?php echo $wVal['mobile'] ?></h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <hr>
                        <center>
                            <?php if($flag==1){
                                $driverId=$wVal['driver_id'];
                                $driverSql="SELECT * FROM driver_available WHERE driver_id='$driverId'";
                                $driverVal=mysql_fetch_assoc(mysql_query($driverSql));
                                ?>
                            <h5 style="font-weight: bold;">Driver Assigned</h5>
                            <br/>
                            <img src="../img/drivers/<?php echo $driverVal['img'];?>" style="width: 80px;margin: 5px;">
                            <h4>
                                <?php echo ucfirst($driverVal['driver_name']); ?>
                            </h4>
                            <?php
                                }
                            ?>
                        </center>
                    </div>
                </div>
                <?php } ?>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $(".bin").mouseover(function(){
                $(this).attr("src","../img/bin_open.png");
            });
            $(".bin").mouseout(function(){
                $(this).attr("src","../img/bin_close.png");
            });
            $(".bin").click(function(){
                $wishList_id=$(this).attr("id");
                $.ajax({
                    type:"POST",
                    url:"../controllers/deleteFromWishListHandler.php",
                    data:{
                        id:$wishList_id
                    },
                    success:function(data){
                        data=JSON.parse(data);
                        
                        if(data['status']=="success"){
                            var id=data['id'];
                            $("#row_"+id).slideUp(500,function(){
                                $(this).remove();
                            });
                        }
                    }
                });
            });
            
        });
    </script>
</body>
</html>
