<?php 

	require '../connection.php';
	mysql_select_db('tour and travel');
 	session_start();

 		$user_id=$_POST['user_id'];
 		$user_email=$_POST['user_email'];
 		$user_mobile=$_POST['user_mobile'];
 		$user_location=$_POST['user_location'];
 		$car_id=$_POST['car_id'];
 		$p_from=$_POST['p_from'];
 		$p_to=$_POST['p_to'];
 		$d_from=$_POST['d_from'];
 		$d_to=$_POST['d_to'];
 		$t_count=$_POST['t_count'];
 		$payment_method=$_POST['payment_method'];

 		date_default_timezone_set('Asia/Kolkata');
	 	$added_on=date('d/m/y h:i:sa');

 		$sql="INSERT INTO `applied_users`(`customer_id`,`mobile`, `email`,`location`, `car_id`, `date_from`, `date_to`, `place_from`, `place_to`, `no_of_travellers`, `status`, `payment_method`, `inWishlist`,`booking_time`) VALUES ('$user_id','$user_mobile','$user_email','$user_location','$car_id','$d_from','$d_to','$p_from','$p_to','$t_count','wfd','$payment_method','0','$added_on')";
 		$retval=mysql_query($sql);
 		if(!$retval){
 			die("Server Error");
 		}
 		
 		$sql_="SELECT * from `applied_users` where booking_time='$added_on'";
 		$retval_=mysql_query($sql_);
 		if(!$retval_)die("Server Error");
 		$val=mysql_fetch_assoc($retval_);
		$a=array("status"=>"success","booking_id"=>$val['id']);

 		echo json_encode($a);

 ?>