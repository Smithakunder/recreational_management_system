<?php
require('db.php');

$errors = array(); 

if (isset($_POST['member'])) {
    $mem_id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $package = mysqli_real_escape_string($conn, $_POST['package']);
    $mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
    $pay_id = mysqli_real_escape_string($conn, $_POST['pay_id']);
    $instructor_id = mysqli_real_escape_string($conn, $_POST['instructor_id']);
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
    $props_id = mysqli_real_escape_string($conn, $_POST['props_id']);

    
    // Check if the member ID already exists
    $user_check_query = "SELECT * FROM member WHERE mem_id='$mem_id' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { 
        if ($user['mem_id'] === $mem_id) {
            array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
        }
    }

    // If there are no errors, insert the member into the database
    if (count($errors) == 0) {
        $query = "INSERT INTO member (mem_id, name, dob, age, package, mobileno, pay_id, instructor_id, class_id, props_id) VALUES ('$mem_id', '$name', '$dob', '$age', '$package', '$mobileno', '$pay_id', '$instructor_id', '$class_id', '$props_id')";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            $msg = "<div class='alert alert-success'><b>Member added successfully</b></div>";
        } else {
            $msg = "<div class='alert alert-warning'><b>Member not added</b></div>";
        }
    }
}

?>

<div class="container">
    <form class="form-group mt-3" method="post" action="">
        <div><h3><b>ADD MEMBER</b></h3></div>
        <?php 
        include('errors.php'); 
        echo @$msg;
        ?>
        <label class="mt-3">MEMBER ID</label>
        <input type="text" name="id" class="form-control" style="width:500px">
        <label class="mt-3">MEMBER NAME</label>
        <input type="text" name="name" class="form-control" style="width:500px">
        <label class="mt-3">DOB</label>
        <input type="date" name="dob" class="form-control" style="width:500px">
        <label class="mt-3">AGE</label>
        <input type="text" name="age" class="form-control" style="width:500px">
        <label class="mt-3">PACKAGE</label>
        <input type="text" name="package" class="form-control" style="width:500px">
        <label class="mt-3">MOBILE NO</label>
        <input type="text" name="mobileno" class="form-control" style="width:500px">
        <label class="mt-3">PAYMENT ID</label>
        <input type="text" name="pay_id" class="form-control" style="width:500px">
        <label class="mt-3">INSTRUCTOR ID</label>
        <input type="text" name="instructor_id" class="form-control" style="width:500px">
        <label class="mt-3">CLASS ID</label>
        <input type="text" name="class_id" class="form-control" style="width:500px">
        <label class="mt-3">PROPS ID</label>
        <input type="text" name="props_id" class="form-control" style="width:500px">
       
        <button class="btn btn-dark mt-3" type="submit" name="member"><b>ADD</b></button>
    </form>
</div>
