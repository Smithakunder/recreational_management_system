<?php
session_start();
require('db.php');

$errors = array(); 

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    if (count($errors) == 0) {
        $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['uname'] = $row['uname'];
            if ($username === 'admin') {
                header("location: home.php");
            } elseif ($username === 'user') {
                header("location: userhome.php");
            }
        } else {
            array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");
        }
    }
}
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
    <style type="text/css">
        
    .background{
      position: fixed;
      z-index: -1000;
      width: 100%;
      height: 100%;
      overflow: hidden;
      top: 0;
      left: 0;
    }
	.form{
		width:30%;
		margin-left:35%;
		margin-top:7%;
	}
	
	
    .navbar{
      background-color: transparent !important;
    }
  
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="padding-left: 500px;"><h3><b>RECREATIONAL CLUB MANAGEMENT</b></h3></a>
        </div>
    </nav>
    <h2 style="color:white; text-align:center;"><b> Access To Admin or User</b></h2>
    <form class="form" action="" method="post">
        <input type="text" class="form-control mb-2 mr-sm-2" name="username" placeholder="USERNAME" required> <br/>
        <input type="password" class="form-control mb-2 mr-sm-2" name="pwd" placeholder="PASSWORD" required> <br/>
        <button type="submit" class="btn btn-outline-light mb-2" name="login_user"><b>LOGIN</b></button>
    </form>
    <div class="background">
  <img src="dark_nature_background_hd_dark.jpg">
</div>
</body>
</html>





