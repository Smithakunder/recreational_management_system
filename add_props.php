<?php
require('db.php');

$errors = array(); 
if (isset($_POST['props'])) {

  $props_id = mysqli_real_escape_string($conn, $_POST['id']);
  $props_name = mysqli_real_escape_string($conn, $_POST['name']);
  $mem_id = mysqli_real_escape_string($conn, $_POST['mem_id']);
  
  // Check if the props ID already exists
  $user_check_query = "SELECT * FROM props WHERE props_id='$props_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['props_id'] === $props_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    // Insert props data into the database
    $query = "INSERT INTO props (props_id, props_name, mem_id) VALUES ('$props_id', '$props_name', '$mem_id')";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
      $msg = "<div class='alert alert-success'><b>Props added successfully</b></div>";
    } else {
      $msg = "<div class='alert alert-warning'><b>Props not added</b></div>";
    }
  }
}
?>

<div class="container">
  <form class="form-group mt-3" method="post" action="">
    <div><h3><b>ADD PROPS</b></h3></div>
    <?php 
      include('errors.php'); 
      echo @$msg;
    ?>
    <label class="mt-3">PROPS ID</label>
    <input type="text" name="id" class="form-control" style="width:500px">
    <label class="mt-3">PROPS NAME</label>
		<select name="name" class="form-control mt-3" style="width:500px">
    <option value="WESTERN COSTUME">WESTERN COSTUME</option>
    <option value="CLASSICAL COSTUME">CLASSICAL COSTUME</option>
    <option value="THEATRE COSTUME">THEATRE COSTUME</option>
    <option value="INSTRUMENTS">INSTRUMENTS</option>
    </select> 
    <label class="mt-3">MEMBER ID</label>
    <input type="text" name="mem_id" class="form-control" style="width:500px"> <!-- Corrected name attribute -->
    <button class="btn btn-dark mt-3" type="submit" name="props"><b>ADD</b></button>
  </form>
</div>
