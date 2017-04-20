<?php 

	require '../connection.php';
	mysql_select_db('tour and travel');
 	session_start();

 		$driver_id=$_POST['driver_id'];
 		$booking_id=$_POST['booking_id'];

	 	$toDateSql="SELECT * from `applied_users` WHERE id='$booking_id'";
	 	$toDateRetavl=mysql_query($toDateSql);
	 	if(!$toDateRetavl)die("Server Error");
	 	$toDate=mysql_fetch_assoc($toDateRetavl);
	 	$toDateVal=$toDate['date_to'];
	 	$car_id=$toDate['car_id'];
	 	
	 	//update applied_users table
 		$sql1="UPDATE `applied_users` SET `driver_id`='$driver_id',`status`='confirmed',`inWishlist`='0' WHERE id='$booking_id'";
 		$retval1=mysql_query($sql1);
 		if(!$retval1)die("Server Error");

 		//update driver_available table
 		$sql2="UPDATE `driver_available` SET `Available`='no',`booked_till`='$toDateVal' WHERE driver_id='$driver_id'";
 		$retval2=mysql_query($sql2);
 		if(!$retval2)die("Server Error");

 		//update cars_available table
 		$sql3="UPDATE `cars_available` SET `Available`='no',`booked_till`='$toDateVal' WHERE id='$car_id'";
 		$retval3=mysql_query($sql3);
 		if(!$retval3)die("Server Error");

		$a=array("status"=>"success");
 		echo json_encode($a);

 ?>