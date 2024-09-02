<?php
require('db.php');





if (isset($_REQUEST['instructor'])) {

  $instructor_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);


  $update_query="update instructor set instructor_id='$instructor_id',name='$name',mobileno='$mobileno' where instructor_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Instructor Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from instructor where instructor_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>




<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>UPDATE INSTRUCTOR</h3>
		 <?php 
    echo @$err;

    ?>
		<label class="mt-3">INSTRUCTOR ID</label>
		<input type="text" name="id" value="<?php echo @$res['instructor_id'];?>" class="form-control">
		<label class="mt-3">INSTRUCTOR NAME</label>
		<input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control" pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number">
		<button class="btn btn-dark mt-3" type="submit" name="instructor">UPDATE</button>
	</form>
</div>