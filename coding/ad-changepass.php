<?php
include_once("ad-changepassProcess.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>UiTM EVENT ATTENDANCE SYSTEM</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css-ht/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css-ht/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css-ht/style.css" rel="stylesheet" />
	
</head>
<body>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">  
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <h1><img src="img/uitmonly.png" alt="uitmlogo" width="50" /> | EVENT ATTENDANCE SYSTEM</h1>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a class="menu-top-active" href="ad-dashboard.php">Dashboard</a></li>
                            <li><a href="ad-manageorganizer.php">Manage Organizer</a></li>
                            <li><a href="ad-managevenue.php?page=1">Manage Venue</a></li>
                            <li><a href="ad-managestudent.php?page=1">View Student</a></li>
                            <li><a href="ad-manageprogrammes.php">View Programmes</a></li>
                            <li><a href="ad-report.php">View Report</a></li>
                        </ul>
                        
                        <ul id="menu-top" class="nav navbar-nav navbar-right"> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" style="font-size: 15px;"></span> <!--HT-->
                                </a>
                                <div class="dropdown-menu dropdown-settings">
                                    <div class="media" style="width: 250px; text-align:center;">
                                        <div class="media-body" style="padding-top: 2%">
                                            <?php
                                                $admin = mysqli_fetch_array($dAdmin);
                                                $adminName = $admin['adminName'];
                                                echo $adminName;
                                                echo "<br>";
                                                echo "Administrator";
                                            ?>
                                            <br><br>
                                            <a href="logout.php" class="btn btn-warning btn-sm"> <i class="glyphicon glyphicon-log-out"></i> Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Admin Details &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> &nbsp;Change Password </h1>
                    </div>
            </div>
			<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8"> 
						  <!--    Striped Rows Table  -->
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center">
								<b><i class="glyphicon glyphicon-plus"></i> Change Password</b> <!--Retrieve from database-->
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" name="formAddE">
									<div class="row form-group">
										<label class="col-md-4" align="right">Old Password</label>
										<div class="col-md-6">
											<input type="password" class="form-control" placeholder="Enter old password" name="oldPassword"> 
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-4" align="right">New Password</label>
										<div class="col-md-6">
											<input type="password" class="form-control" placeholder="Enter new password" name="newPassword">
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-4" align="right">Re-enter New Password</label>
										<div class="col-md-6">
											<input type="password" class="form-control" placeholder="Enter new password again" name="repeatnewPassword">
										</div>
									</div>
									<div class="row">
										<div class="col-md-10"></div>
										<div class="col-md-2" align="left">
                                            <form class="form-horizontal" action="ad-dashboard.php" method="get" name="changePass">
											     <button type="submit" class="btn btn-warning" name="submit">SUBMIT</button>
                                            </form>
										</div>
									</div>	
								</form>
							</div>
						</div>
					</div>
				<br/>
            </div> 
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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