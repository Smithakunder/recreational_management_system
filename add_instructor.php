<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['instructor'])) {

  $instructor_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
   
  
  
  $user_check_query = "SELECT * FROM instructor WHERE instructor_id='$instructor_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['instructor'] === $instructor_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO instructor (instructor_id,name,mobileno) 
          VALUES('$instructor_id','$name','$mobileno')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Instructor Added Successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Instructor Not Added</b></div>";
    }
  }
}



?>





<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3><b>ADD INSTRUCTOR</b></h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">INSTRUCTOR ID</label>
		<input type="text" name="id" class="form-control" style="width:500px">
		<label class="mt-3">INSTRUCTOR NAME</label>
		<input type="text" name="name" class="form-control" style="width:500px">
		<label class="mt-3">MOBILE NO</label>
    <input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control" pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number" style="width:500px">
		<button class="btn btn-dark mt-3" type="submit" name="instructor"><b>ADD</b></button>
	</form>
</div>