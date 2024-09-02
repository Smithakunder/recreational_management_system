<div class="container">

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>PROPS ID</th>
				<th>PROPS NAME</th>
				<th>MEMBER ID</th>
			</tr>
			<?php
           require('db.php');


$all="SELECT * FROM props";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
		echo "<td>".$row['props_id']."</td>";
		echo "<td>".$row['props_name']."</td>";
		echo "<td>".$row['mem_id']."</td>";
	   echo "</tr><br>";
    }
} else {
    echo "0 results";
}



?>
			
		</table>
	</div>
</div>
