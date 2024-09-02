<?php
require('db.php');


$inf=$_GET['id'];

	
	
	$sql_query="DELETE FROM member WHERE mem_id='$inf'";
	$delete=mysqli_query($conn,$sql_query);
	if ($delete) {
		$err="<div class='alert alert-success'><b>Member Deleted Successfully</b></div>";
	echo $err;  
	}else{
		echo "error".mysqli_error($conn);
	}
	
?>