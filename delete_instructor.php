<?php
require('db.php');


$inf=$_GET['id'];


$sql_mem="DELETE FROM member WHERE instructor_id=(select instructor_id from instructor where instructor_id='$inf')";
$sql_query_mem=mysqli_query($conn,$sql_mem);
if ($sql_query_mem) {


	$sql_query="DELETE FROM instructor WHERE instructor_id='$inf'";
	$delete=mysqli_query($conn,$sql_query);
	if ($delete) {
		$err="<div class='alert alert-success'><b>Instructor Deleted Successfully</b></div>";
	echo $err;  
	}else{
		echo "error".mysqli_error($conn);
	}
	
	
}else{
	echo "Not deleted";
}

	

?>