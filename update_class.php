<?php
require('db.php');





if (isset($_REQUEST['class'])) {
  $class_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $class_schedule = mysqli_real_escape_string($conn, $_REQUEST['class_schedule']);
  $class_timing = mysqli_real_escape_string($conn, $_REQUEST['class_timing']);


  $update_query="update class set class_id='$class_id',class_name='$name',class_schedule='$class_schedule',class_timing='$class_timing' where class_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>CLASS DETAILS UPDATED</b></div>";
}
$con=mysqli_query($conn,"select * from class where class_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>






<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE CLASS</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">CLASS ID</label>
		<input type="text" name="id" value="<?php echo @$res['class_id'];?>" class="form-control">
		<label class="mt-3">CLASS NAME</label>
		<select name="name" value="<?php echo @$res['class_name'];?>" class="form-control">
		<option value="WESTERN DANCE">WESTERN DANCE</option>
    	<option value="CLASSICAL DANCE">CLASSICAL DANCE</option>
    	<option value="THEATRE">THEATRE</option>
    	<option value="INSTRUMENTAL MUSIC">INSTRUMENTAL MUSIC</option>  
    	<option value="WESTERN SINGING">WESTERN SINGING</option>
    	<option value="EASTERN SINGING">EASTERN SINGING</option>
    	<option value="YOGA">YOGA</option>
    	</select>  
		<label class="mt-3">CLASS SCHEDULE</label>
		<select name="class_schedule" value="<?php echo @$res['class_schedule'];?>" class="form-control">
	 	<option value="sunday">SUNDAY</option>
    	<option value="monday">MONDAY</option>
    	<option value="tuesday">TUESDAY</option>
    	<option value="wednesday">WEDNESDAY</option>  
    	<option value="thursday">THURSDAY</option>
    	<option value="friday">FRIDAY</option>
    	<option value="saturday">SATURDAY</option>
    	</select>  
		<label class="mt-3">CLASS TIME</label>
		<input type="time" name="class_timing" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="class">UPDATE</button>
	</form>
</div>



