<?php 

	require '../connection.php';
	mysql_select_db('tour and travel');
 	session_start();

 		$id=$_POST['id'];
 		$sql="DELETE FROM `applied_users` WHERE id='$id'";
 		$retval=mysql_query($sql);
 		if(!$retval)die("Server Error");
		$a=array("status"=>"success","id"=>$id);
 		echo json_encode($a);

 ?>