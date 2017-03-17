<?php 

	require 'connection.php';
	mysql_select_db('tour and travel');
 	session_start();

 	if(isset($_POST['search_cars_button'])){
 		$form=$_POST['from'];
 		$to=$_POST['to'];
 		$date_from=$_POST['date_from'];
 		$date_to=$_POST['date_to'];
 		$car_type=$_POST['car_type'];
 		$travellers=$_POST['travellers'];

 		$sql="SELECT * FROM `cars_available` WHERE 1";
 		$retval=mysql_query($sql);
 		if(!$retval){
 			$a=array("status"=>"ggg");
 			echo json_encode($a);	
 		}

 		$a=array();
 		$val=mysql_fetch_assoc($retval);
 		while($val=mysql_fetch_assoc($retval)){
 			// echo $val['id']." ".$val['model']."<br>";
 			$b=array($val['model']);
			array_push($a,$b);
 		}
 		
 		// echo json_encode($a);	
 		echo "hello";
 		
 	}

 ?>