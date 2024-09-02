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
<body style="background:url(assets.jpg);">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="userhome.php" style="padding-left: 450px;"><b>RECREATIONAL CLUB MANAGEMENT-USER ACCESS</b></a>
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
          <div class="list-group-item" style="background-color: #303030;"><a href="userhome.php?info=usermanage_class" class="text-light"><b>VIEW CLASSES</b></a></div>
        </div>
         <div class="list-group-item bg-dark">
         <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsesix">
        <i class="fas fa-users"></i><b> INSTRUCTOR</b></a>
      </div>
      <div id="collapsesix" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="userhome.php?info=usermanage_instructor" class="text-light"><b>VIEW INSTRUCTORS</b></a></div>
        </div>
        <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseseven">
        <i class="fas fa-book"></i><b>PROPS</b></a>
      </div>
      <div id="collapseseven" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="userhome.php?info=usermanage_props" class="text-light"><b>VIEW PROPS</b></a></div>
        </div>
    </div>
</div>
  </div>
  <div class="col-10">
   
  <?php
@$info=$_GET['info'];
if ($info!=="") {
        
             if ($info=="manage_member") {
               include ('manage_member.php');
             }elseif ($info=="usermanage_props") {
               include ('usermanage_props.php');
             }elseif ($info=="usermanage_instructor") {
               include ('usermanage_instructor.php');
             }elseif ($info=="usermanage_class") {
               include ('usermanage_class.php');
             }elseif ($info=="change_password") {
               include ('change_password.php');
             }elseif ($info=="class_search") {
               include ('class_search.php');
             }
             }
?>

</div>
</div>

</body>
</html>
            





