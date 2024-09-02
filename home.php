<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>RECREATIONAL CLUB MANAGEMENT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="style.css"> 
</head>
    
<body style="background:url(download.jpeg);">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php" style="padding-left: 450px;"><b>RECREATIONAL CLUB MANAGEMENT-ADMIN ACCESS</b></a>
            <a href="logout.php" class="nav nav-link"><b>LOG OUT</b></a>
        </div>
    </nav>
    

    <div class="row mt-3">
        <div class="col-2">
        <div id="accordion">
    <div class="list-group">
      <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseTwo">
        <i class="fas fa-user-alt"></i><b>CLASS</b></a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_class" class="text-light"><b>ADD CLASS</b></a>
          </div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_class" class="text-light"><b>VIEW CLASSES</b></a></div>
        </div>
      <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseThree">
          <i class="fas fa-user-graduate"></i> <b>PAYMENT DEPARTMENT</b>
</a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="list-group-item" style="background-color: #303030;">
          <a href="home.php?info=add_payment" class="text-light"><b>ADD PAYMENT</b></a>
        </div>
        <div class="list-group-item" style="background-color: #303030;">
          <a href="home.php?info=manage_payment" class="text-light"><b>VIEW PAYMENT</b></a>
        </div>
      </div>
         <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsefive">
        <i class="fas fa-book"></i><b> MEMBERS</b></a>
      </div>
      <div id="collapsefive" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_member" class="text-light"><b>ADD MEMBER</b></a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_member" class="text-light"><b>VIEW MEMBERS</b></a></div>
        </div>
         <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsesix">
        <i class="fas fa-users"></i><b> INSTRUCTOR</b></a>
      </div>
      <div id="collapsesix" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_instructor" class="text-light"><b>ADD INSTRUCTORS</b></a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_instructor" class="text-light"><b>VIEW INSTRUCTORS</b></a></div>
        </div>
        <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseseven">
        <i class="fas fa-book"></i><b>PROPS</b></a>
      </div>
      <div id="collapseseven" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_props" class="text-light"><b>ADD PROPS</b></a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_props" class="text-light"><b>VIEW PROPS</b></a></div>
        </div>
    </div>
</div>
  </div>
  <div class="col-10">
   
  <?php
@$info=$_GET['info'];
if ($info!=="") {
             if ($info=="add_class") {
             include('add_class.php');
                }
             else if($info=="add_payment")
             {
             include('add_payment.php');
             }
             elseif ($info=="manage_payment") {
               include ('manage_payment.php');
             }elseif ($info=="add_member") {
               include ('add_member.php');
             }elseif ($info=="manage_member") {
               include ('manage_member.php');
             }elseif ($info=="add_instructor") {
               include ('add_instructor.php');
             }else if($info=="add_props")
             {
             include('add_props.php');
             }
             elseif ($info=="manage_props") {
               include ('manage_props.php');
             }elseif ($info=="manage_instructor") {
               include ('manage_instructor.php');
             }elseif ($info=="manage_class") {
               include ('manage_class.php');
             }elseif ($info=="update_payment") {
               include ('update_payment.php');
             }elseif ($info=="delete_payment") {
               include ('delete_payment.php');
             }elseif ($info=="update_class") {
               include ('update_class.php');
             }elseif ($info=="delete_class") {
               include ('delete_class.php');
             }elseif ($info=="update_member") {
               include ('update_member.php');
             }elseif ($info=="delete_member") {
               include ('delete_member.php');
             }elseif ($info=="update_props") {
               include ('update_props.php');
             }elseif ($info=="delete_props") {
               include ('delete_props.php');
             }elseif ($info=="update_instructor") {
               include ('update_instructor.php');
             }elseif ($info=="delete_instructor") {
               include ('delete_instructor.php');
             }elseif ($info=="change_password") {
               include ('change_password.php');
             }elseif ($info=="class_search") {
               include ('class_search.php');
             }elseif ($info=="member_search") {
               include ('member_search.php');
             }elseif ($info=="payment_search") {
               include ('payment_search.php');
             }elseif ($info=="instructor_search") {
               include ('instructor_search.php');
             }elseif ($info=="props_search") {
               include ('props_search.php');
             }
             }
?>

</div>
</div>

</body>
</html>
          






