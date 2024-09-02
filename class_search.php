<?php
require('db.php');


$name="";



if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Class_Id</th>";
	echo "<th>Class_Name</th>";
	echo "<th>Class_Schedule</th>";
	echo "<th>class_Timing</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


		$que=mysqli_query($conn,"SELECT * FROM `class` WHERE CONCAT(`class_id`,`class_name`,`class_schedule`,`class_Timing`) LIKE '%".$name."%'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['class_id']."</td>";
		echo "<td>".$row['class_name']."</td>";
		echo "<td>".$row['class_schedule']."</td>";
		echo "<td>".$row['class_timing']."</td>";
		echo "<td><a href='home.php?id=$row[class_id]&info=update_class'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[class_id]&info=delete_class'><i class='fas fa-trash-alt'></i></a></td>";
		echo "</tr>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}




	
?>
