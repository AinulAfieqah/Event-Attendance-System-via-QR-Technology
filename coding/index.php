<?php
session_start();//session starts here

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>UiTM Raub Event Attendance System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <style>

        body {
            background-image: url("assets/img/bg.jpg");
        }
        
    </style>
</head>
<body>
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container" align="center" style="margin-top:3%">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line" style="color:white; border-bottom:none; font-size:30px;">UiTM Event Attendance System</h4>
                </div>
            </div>

            <div class="row" align="center">
                <div class="container" style="width:45%; border:solid; border-radius: 25px; background-color:lightgrey; padding:3%;">
                    <img src="img/uitmlogo.png" style="padding-bottom:8%; width:50%"/><br />
					<form role="form" method="post" action="index.php">
						<fieldset>
							<label>User ID : </label>
							<input type="text" class="form-control" name="username" autofocus />
							<label>Password :  </label>
							<input type="password" class="form-control" name="password" value=""/>
							<hr />
							<input class="btn btn-lg btn-success btn-block" style="background-color:#3D3D3D" type="submit" value="Login" name="login" >
						</fieldset>
					</form>
				</div></div>
            </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12" align="center" >
                    &copy; 2019 | UiTM Cawangan Pahang Kampus Raub
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>

<?php

include("db_connection.php");

if(isset($_POST['login']))
{
    $username=addslashes($_POST['username']);
    $password=addslashes($_POST['password']);

    //echo $username;
    //echo $password;

    $run1=mysqli_query($db_connect,"SELECT * FROM  eventqrsystem.admin ad WHERE ad.username='$username' AND ad.password='$password'");
    if(!$run1){
        echo "Fail retrieve admin";
    }
    $run2=mysqli_query($db_connect,"SELECT * FROM  eventqrsystem.organizer org WHERE org.username='$username' AND org.password='$password'");
    if(!$run1){
        echo "Fail retrieve organizer";
    }
    $run3=mysqli_query($db_connect,"SELECT * FROM  heasuratimran.students std WHERE std.studentno='$username' AND std.studenticno='$password'");

    if(mysqli_num_rows($run1) > 0)
    {
		$row = mysqli_fetch_assoc($run1);
		$adminID = $row['adminID'];

        $fTime = $row['firstTime'];
        
        while($fTime == 0){
           
            echo "<script>window.open('ad-changepass.php','_self')</script>";
            $_SESSION['adminID']=$adminID; 
        }

        $_SESSION['adminID']=$adminID;
		echo "<script>window.open('ad-dashboard.php','_self')</script>";
	}
		
	else if (mysqli_num_rows($run2) > 0)
    {
        $row = mysqli_fetch_assoc($run2);
        $organizerID = $row['organizerID'];
        if(!$organizerID){
            echo " no org";
        }

        $fTime = $row['firstTime'];
        
        while($fTime == 0){
           
            echo "<script>window.open('org-changepass.php','_self')</script>";
            $_SESSION['organizerID']=$organizerID; 
        }
        $_SESSION['organizerID']=$organizerID;
        //echo $organizerID;
        echo "<script>window.open('org-dashboard.php','_self')</script>";
            
	}
		
	else if (mysqli_num_rows($run3) > 0)
    {
        $row = mysqli_fetch_assoc($run3);
        $studentID = $row['studentid'];

        $_SESSION['studentid']=$studentID;
        echo "<script>window.open('std-dashboard.php','_self')</script>";
            
	}
		
    else
    {
      echo "<script>alert('Username or password is incorrect!')</script>";
    }
}
?>