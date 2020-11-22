<?php
session_start();//session starts here
include_once("loginSProcess.php")
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
					<form role="form" method="post" action="loginS.php?id=<?php echo $id ; ?>">
						<fieldset>
							<label>User ID : </label>
							<input type="text" class="form-control" name="username" autofocus />
							<label>Password :  </label>
							<input type="password" class="form-control" name="password" value=""/>
                            <label hidden=""><?php $decode=base64_decode($id); echo $decode?>  </label>
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