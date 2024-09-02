<?php
require('db.php');


$id="";



if (isset($_POST['id'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Props_Id</th>";
	echo "<th>Props_Name</th>";
	echo "<th>Member_Name</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$id=$_POST['id'];


		$que=mysqli_query($conn,"SELECT * FROM `props` WHERE CONCAT(`props_id`,`props_name`,`mem_id`) LIKE '%".$id."%'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['props_id']."</td>";
		echo "<td>".$row['props_name']."</td>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td><a href='home.php?id=$row[props_id]&info=update_props'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[props_id]&info=delete_props'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}




	
?>
