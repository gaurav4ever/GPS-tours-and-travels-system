<?php 
    require("../connection.php");
    mysql_select_db('tour and travel');
    $sql="SELECT * FROM applied_users WHERE status='confirmed' or status='travelled'";
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
        #view_request_button{
            background: #2d67b2;
            color: #fff;
            padding: 5px 10px 5px 10px;
            border:0;
            box-shadow: 0;
            border-radius: 5px;
        }
        .modal h3,.modal h4{
            margin: 0;
            padding: 0;
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
                        <a href="history.php" id="active">Booking History</a>
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
                <div class="table">
                    <center>
                    <table id="table">

                        <thead>
                            <tr>
                                <td><label> id </label></td>
                                <td><label> From </label></td>
                                <td><label> To </label></td>
                                <td><label> Email </label></td>
                                <td><label> Status </label></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($val=mysql_fetch_assoc($retval)){
                             ?>
                            <tr>
                                <td><label><?php echo $val['id']; ?></label></td>
                                <td><?php echo $val['place_from']; ?></td>
                                <td><?php echo $val['place_to']; ?></td>
                                <td><?php echo $val['email']; ?></td>
                                <?php 
                                    if($val['status']=="confirmed"){
                                 ?>
                                    <td><h5 style="font-weight: bold;color: green;padding: 5px;"><?php echo $val['status']; ?></h5></td>
                                <?php 
                                    }else{
                                 ?>
                                    <td><h5 style="font-weight: bold;color: #dcdcdc;padding: 5px;"><?php echo $val['status']; ?></h5></td>
                                 <?php 
                                    }
                                  ?>
                                <td>
                                    <button id="view_request_button" data-toggle='modal' data-target='#myModal1'>View</button>
                                </td>
                            </tr>

                            <!-- details of the trip -->
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title text-center" id="myModalLabel" style="font-weight: bold;">Booking Details</h3>
                                  </div>
                                  <div class="modal-body" id="car_details">
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h4>From :</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h3><?php echo ucfirst($val['place_from']); ?></h3>
                                        </div>
                                        <div class="col-md-3">
                                            <center><img src="../img/arrow.png" style="width: 30px;"></center>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>To :</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h3><?php echo ucfirst($val['place_to']); ?></h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <center>
                                                <h5>on <?php echo $val['date_from']; ?></h5>
                                            </center>
                                        </div>
                                        <div class="col-md-3">
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <center>
                                                <h5>on <?php echo $val['date_to']; ?></h5>
                                            </center>
                                        </div>
                                    </div>
                                    <hr style="margin: 5px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 style="font-weight: bold;">No of Travelers : </h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5><?php echo $val['no_of_travellers']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 style="font-weight: bold;">Customer Name : </h5>
                                        </div>
                                        <div class="col-md-8">
                                        <?php 
                                            $user_id=$val['customer_id'];
                                            $userSql="SELECT * From users where id='$user_id'";
                                            $userVal=mysql_fetch_assoc(mysql_query($userSql));

                                         ?>
                                            <h5><?php echo $userVal['username']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 style="font-weight: bold;">Email : </h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5><?php echo $val['email']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 style="font-weight: bold;">Mobile : </h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5><?php echo $val['mobile']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 style="font-weight: bold;">Status : </h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5><?php echo $val['status']; ?></h5>
                                        </div>
                                    </div>

                                    <?php 
                                        $driver_id=$val['driver_id'];
                                        $driverSql="SELECT * From driver_available where driver_id='$driver_id'";
                                        $driverVal=mysql_fetch_assoc(mysql_query($driverSql));

                                        $car_id=$val['car_id'];
                                        $carSql="SELECT * From cars_available where id='$car_id'";
                                        $carVal=mysql_fetch_assoc(mysql_query($carSql));
                                     ?>
                                     <hr style="margin: 5px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 style="margin-bottom: 5px;">Driver Assigned</h5>
                                            <h3><?php echo $driverVal['driver_name']; ?></h3>
                                            <img style="width: 100px;" src="../img/drivers/<?php echo $driverVal['img'];?>">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 style="margin-bottom: 5px;">Car Assigned</h5>
                                            <br>
                                            <h3><?php echo $carVal['model']; ?></h3>
                                        </div>
                                    </div>

                                  </div>
                                  
                                </div>
                              </div>
                            </div>


                            <?php 
                                }
                             ?>
                        </tbody>
                    </table>




                    </center>
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
