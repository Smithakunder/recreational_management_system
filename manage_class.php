<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=class_search">
		<h3 class="lead">SEARCH CLASS</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER CLASS NAME OR CLASS ID">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>CLASS ID</th>
				<th>CLASS NAME</th>
				<th>CLASS SCHEDULE</th>
				<th>CLASS TIMING</th>
			</tr>
			<?php
           require('db.php');

$all="SELECT * FROM class";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
		echo "<td>".$row['class_id']."</td>";
		echo "<td>".$row['class_name']."</td>";
		echo "<td>".$row['class_schedule']."</td>";
		echo "<td>".$row['class_timing']."</td>";
		echo "</tr><br>";
    }
} else {
    echo "0 results";
}

?>
		</table>
	</div>
</div>