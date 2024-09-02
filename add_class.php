<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['class'])) {

  $class_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $class_schedule = mysqli_real_escape_string($conn, $_REQUEST['class_schedule']);
  $class_timing = mysqli_real_escape_string($conn, $_REQUEST['class_timing']);
  
  $user_check_query = "SELECT * FROM class WHERE class_id='$class_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['class_id'] === $class_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO class (class_id,class_name,class_schedule,class_timing) VALUES('$class_id','$name','$class_schedule','$class_timing')";
    $sql=mysqli_query($conn, $query);
    $msg = ($sql) ? "<div class='alert alert-success'><b>CLASS ADDED SUCCESSFULLY</b></div>" : "<div class='alert alert-warning'><b>CLASS NOT ADDED</b></div>";
  }
}

?>

<div class="w3-container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3><b>ADD CLASS</b></h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">CLASS ID</label>
		<input type="text" name="id" class="form-control" style="width:500px">
		<label class="mt-3">CLASS NAME</label>
		<select name="name" class="form-control mt-3" style="width:500px">
    <option value="WESTERN DANCE">WESTERN DANCE</option>
    <option value="CLASSICAL DANCE">CLASSICAL DANCE</option>
    <option value="THEATRE">THEATRE</option>
    <option value="INSTRUMENTAL MUSIC">INSTRUMENTAL MUSIC</option>  
    <option value="WESTERN SINGING">WESTERN SINGING</option>
    <option value="EASTERN SINGING">EASTERN SINGING</option>
    <option value="YOGA">YOGA</option>
    </select>  
		<label class="mt-3">CLASS SCHEDULE</label>
		<select name="class_schedule" class="form-control mt-3" style="width:500px">
    <option value="sunday">SUNDAY</option>
    <option value="monday">MONDAY</option>
    <option value="tuesday">TUESDAY</option>
    <option value="wednesday">WEDNESDAY</option>  
    <option value="thursday">THURSDAY</option>
    <option value="friday">FRIDAY</option>
    <option value="saturday">SATURDAY</option>
    </select>  
		<label class="mt-3">CLASS TIME</label>
    <input type="time" name="class_timing" class="form-control" style="width:500px" style="width:500px">
		<button class="btn btn-dark mt-3" type="submit" name="class"><b>ADD</b></button>
	</form>
</div>