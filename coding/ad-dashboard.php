<?php
include_once("ad-dashboardProcess.php")
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
    <div class="navbar navbar-inverse set-radius-zero">  <!--HT-->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="index.html">-->
                    <h1><img src="img/uitmonly.png" alt="uitmlogo" width="60" /> | EVENT ATTENDANCE SYSTEM</h1>
                <!--</a>-->

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
                                            <a href="ad-editprofile.php?id=<?php echo $adminID;?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-user"></i> Edit Profile</a><br>
                                            <a href="ad-changepass.php?id=<?php echo $adminID;?>" class="btn btn-info btn-sm"> <i class="glyphicon glyphicon-lock"></i> Change Password</a>
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
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <h1> <a href="ad-manageorganizer.php" style="color: dimgrey"> <?php $totOrg=mysqli_num_rows($dOrg); echo $totOrg;?> </a> </h1><!--can take from database?-->
                        <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						  </div>
                        </div> 
                        <h5 style="color: dimgrey"> ORGANIZER </h5>
                    </div>
				</div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <h1><a href="ad-managestudent.php?page=1" style="color: dimgrey"> <?php $totStud=mysqli_num_rows($dStud); echo $totStud;?></a></h1>
                        <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						  </div>
                        </div> 
                        <h5 style="color: dimgrey"> STUDENT </h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <h1> <a href="ad-report.php" style="color: dimgrey"> <?php $totEve=mysqli_num_rows($dEve); echo $totEve;?> </a> </h1>
                        <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						  </div>
						</div>
                        <h5 style="color: dimgrey"> EVENT </h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <h1> <a href="ad-managevenue.php" style="color: dimgrey"> <?php $totVen=mysqli_num_rows($dVen); echo $totVen;?> </a> </h1>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          </div>
                        </div>
                        <h5 style="color: dimgrey"> VENUE </h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <h1> <a href="ad-manageprogrammes.php" style="color: dimgrey"> <?php $totProg=mysqli_num_rows($dProg); echo $totProg;?> </a> </h1>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          </div>
                        </div>
                        <h5 style="color: dimgrey"> PROGRAMME </h5>
                    </div>
                </div>
			</div>
            <div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>List of Admin</b> <!--HT: Retrieve from database-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id= "subject-grid" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Admin ID</th>
                                            <th>Admin Name</th>
                                            <th>Telephone No</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            $dAdmin = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin");
                                            while($ad = mysqli_fetch_array($dAdmin)){ 
                                                //index
                                                echo "<tr>";
                                                echo "<td>".$i."</td>";
                                                
                                                //Admin ID
                                                $adID = $ad['adminID'];
                                                echo "<td>".$adID."</td>";
                                                
                                                //Admin Name
                                                $adName= $ad['adminName'];
                                                echo "<td>".$adName."</a></td>";

                                                //Admin ID
                                                $adPhone = $ad['adPhone'];
                                                echo "<td>".$adPhone."</td>";
                                                
                                                //Admin Name
                                                $adEmail= $ad['adEmail'];
                                                echo "<td>".$adEmail."</a></td>";

                                                //Action
                                                echo "<td><a href=\"ad-deleteadmin.php?id=$adID\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='glyphicon glyphicon-trash'></i></a></td>";
                                                
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
		</div>
        <div class="row" align="center">
            <form class="form-horizontal" action="ad-addadmin.php" method="get" name="form1">
                 <button type="submit" class="btn btn-warning" name="Submit" value="addOrg">Add Admin</button>
            </form>
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