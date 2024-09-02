<?php
require('db.php');




if (isset($_REQUEST['payment'])) {

  $pay_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);
  $mem_id = mysqli_real_escape_string($conn, $_REQUEST['mem_id']);

  $update_query="update payment set pay_id='$pay_id',amount='$amount',mem_id='$mem_id' where pay_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Payment Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from payment where pay_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>


<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>UPDATE PAYMENT</h3>
		 <?php 
    echo @$err;

    ?>
		<label class="mt-3">PAYMENT ID</label>
		<input type="text" name="id" value="<?php echo @$res['pay_id'];?>" class="form-control">
		<label class="mt-3">AMOUNT</label>
		<input type="text" name="amount" value="<?php echo @$res['amount'];?>" class="form-control">
		<label class="mt-3">MEMBER ID</label>
		<input type="text" name="mem_id" value="<?php echo @$res['mem_id'];?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="payment">UPDATE</button>
	</form>
</div>