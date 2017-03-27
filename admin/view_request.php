<?php 
    require("../connection.php");
    mysql_select_db('tour and travel');
    $id=$_GET['id'];
    $sql="SELECT * FROM applied_users WHERE id='$id'";
    $retval=mysql_query($sql);
    if(!$retval)die("server error");

    $DriverSql="SELECT * FROM driver_available WHERE Available='yes'";
    $DriverRetval=mysql_query($DriverSql);
    if(!$DriverRetval)die("server error");
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
            width: 100%;
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
            padding: 20px;
        }
        .options{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .main-content{
            background: #fff;
            
        }
        #active{
            color: #2d67b2;
            font-weight: bold;
        }
        .main-content{
            padding: 10px;
        }
        #table_area{
            width: 70%;
            margin: auto;
        }
        td{
            padding: 5px;
        }
        #button{
            background: #2d67b2;
            color: #fff;
            padding: 20px;
            border:0;
            box-shadow: 0;
            border-radius: 5px;
        }
        #button:hover{
            background: #2d67b2;
            color: #fff;
            padding: 20px;
            border:0;
            box-shadow: 0;
            border-radius: 5px;
        }
        .assign_button{
            background: #2d67b2;
            color: #fff;
            margin: 0;
            padding: 5px;
            cursor: pointer;
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
                        <a href="adminPortal.php" id="active">Pending Booking</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="history.php">Booking History</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="cars_available.php">Available Cars</a>
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
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center">Booking Details</h3>
                    <hr>
                    <table>
                        <tbody>
                            <?php 
                                $val=mysql_fetch_assoc($retval);
                                $user_id=$val['customer_id'];
                                $userSql="SELECT * FROM users WHERE id='$user_id'";
                                $userVal=mysql_fetch_assoc(mysql_query($userSql));

                                $car_id=$val['car_id'];
                                $carSql="SELECT * FROM cars_available WHERE id='$car_id'";
                                $carVal=mysql_fetch_assoc(mysql_query($carSql));
                             ?>
                             <tr>
                                 <td><strong>From</strong></td>
                                 <td>:</td>
                                 <td><?php echo $val['place_from']; ?> on <?php echo $val['date_from']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>To</strong></td>
                                 <td>:</td>
                                 <td><?php echo $val['place_to']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Traveller Name</strong></td>
                                 <td>:</td>
                                 <td><?php echo $userVal['username']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Email ID</strong></td>
                                 <td>:</td>
                                 <td><?php echo $val['email']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Mobile</strong></td>
                                 <td>:</td>
                                 <td><?php echo $val['mobile']; ?></td>
                             </tr>
                            <tr>
                                 <td><strong>Travellers</strong></td>
                                 <td>:</td>
                                 <td><?php echo $val['no_of_travellers']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Car Booked</strong></td>
                                 <td>:</td>
                                 <td><?php echo $carVal['model']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Car Type</strong></td>
                                 <td>:</td>
                                 <td><?php echo $carVal['type']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Driver Assigned</strong></td>
                                 <td>:</td>
                                 <td id="assigned_driver">No</td>
                             </tr>
                             <tr>
                                 <td><strong>Payment Status</strong></td>
                                 <td>:</td>
                                 <td>Payed</td>
                             </tr>
                        </tbody>
                    </table>
                    <br/>
                    <button id="button">Confirm Booking</button>
                </div>
                <div class="col-md-8" style="border-left: 1px solid #000;">
                    <h3 class="text-center">Find Driver</h3>
                    <hr>
                    <div class="row">
                        <?php 
                            while($DriverVal=mysql_fetch_assoc($DriverRetval)){
                         ?>
                        <div class="col-md-2" style="padding: 0;border:1px solid #2d67b2;margin: 12px;border-radius: 5px;">
                            <center>
                                <img src="../img/drivers/1.jpg" style="width: 100px;">
                                <h4 id="driver_<?php echo $DriverVal['driver_id'];?>"><?php echo ucfirst($DriverVal['driver_name']); ?></h4>
                                <h5 id="<?php echo $DriverVal['driver_id'];?>" class="assign_button">Assign</h5>
                            </center>
                        </div>
                        <?php 
                            }
                         ?>
                    </div>
                    
                    
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
            $(".assign_button").click(function(){
                var driver_id=$(this).attr("id");
                console.log(driver_id);
                var driver_name=$("#driver_"+driver_id).text();
                var driverAssigned=driver_name+" ("+driver_id+")";
                $("#assigned_driver").text(driverAssigned);
            });
        });
    </script>
</body>
</html>
