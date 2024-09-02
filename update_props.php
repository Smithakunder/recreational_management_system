<?php
require('db.php');

$err = ''; // Define error message variable

if (isset($_REQUEST['props'])) {
    $props_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $props_name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $mem_id = mysqli_real_escape_string($conn, $_REQUEST['mem_id']);

    $update_query = "UPDATE props SET props_id='$props_id', props_name='$props_name' WHERE props_id='" . $_GET['id'] . "'";
    $update_sql = mysqli_query($conn, $update_query);
    if ($update_sql) {
        $err = "<div class='alert alert-success'><b>Props Area Details updated</b></div>";
    } else {
        $err = "<div class='alert alert-danger'><b>Error updating props details</b></div>";
    }
}

$con = mysqli_query($conn, "SELECT * FROM props WHERE props_id='" . $_GET['id'] . "'");
$res = mysqli_fetch_assoc($con);
?>

<div class="container">
    <form class="form-group mt-3" method="post" action="">
        <div><h3>UPDATE PROPS</h3></div>
        <?php echo isset($err) ? $err : ''; ?>
        <label class="mt-3">PROPS ID</label>
        <input type="text" name="id" value="<?php echo htmlspecialchars(@$res['props_id']); ?>" class="form-control">
        <label class="mt-3">PROPS NAME</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars(@$res['props_name']); ?>" class="form-control">
        <label class="mt-3">MEMBER ID</label>
        <input type="text" name="mem_id" value="<?php echo htmlspecialchars(@$res['mem_id']); ?>" class="form-control">
        <button class="btn btn-dark mt-3" type="submit" name="props">UPDATE</button>
    </form>
</div>
