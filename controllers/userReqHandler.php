<?php 

	require '../connection.php';
	mysql_select_db('tour and travel');
 	session_start();

 		$from=$_POST['from'];
 		$to=$_POST['to'];
 		$date_from=$_POST['date_from'];
 		$date_to=$_POST['date_to'];
 		$car_type=$_POST['car_type'];
 		$travellers=$_POST['travellers'];

 		$sql="SELECT * FROM `cars_available` WHERE type='$car_type'";
 		$retval=mysql_query($sql);
 		if(!$retval){
 			$a=array("status"=>"ggg");
 			echo json_encode($a);	
 		}

 		$a=array();
 		$val=mysql_fetch_assoc($retval);
 		while($val=mysql_fetch_assoc($retval)){
 			$b=array($from,$date_from,$to,$date_to,$val['model'],$val['id']);
			array_push($a,$b);
 		}
 		
 		echo json_encode($a);
 	

 ?>