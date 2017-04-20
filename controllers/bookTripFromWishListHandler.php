<?php 

	require '../connection.php';
	mysql_select_db('tour and travel');
 	session_start();

 		$id=$_POST['id'];
 		$pm=$_POST['pm'];

 		date_default_timezone_set('Asia/Kolkata');
	 	$added_on=date('d/m/y h:i:sa');

 		$sql="UPDATE `applied_users` SET `status`='wfd', `payment_method`='$pm',`inWishlist`='0',`booking_time`='$added_on' WHERE id='$id'";

 		$retval=mysql_query($sql);
 		if(!$retval){
 			die("Server Error");
 		}
 		
		$a=array("status"=>"success","booking_id"=>$id);

 		echo json_encode($a);

 ?>