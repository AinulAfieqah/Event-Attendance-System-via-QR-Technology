<?php
include_once("ad-editvenueProcess.php")
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
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <!--<a class="navbar-brand" href="index.html">-->
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
                            <li><a href="ad-dashboard.php">Dashboard</a></li>
                            <li><a href="ad-manageorganizer.php">Manage Organizer</a></li>
                            <li><a class="menu-top-active" href="ad-managevenue.php?page=1">Manage Venue</a></li>
                            <li><a href="ad-managestudent.php?page=1">View Student</a></li>
                            <li><a href="ad-manageprogrammes.php">View Programme</a></li>
                            <li><a href="ad-report.php">View Report</a></li>
						</ul>
						<ul id="menu-top" class="nav navbar-nav navbar-right"> 
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
									<span class="glyphicon glyphicon-user" style="font-size: 15px;"></span> 
								</a>
								<div class="dropdown-menu dropdown-settings">
									<div class="media" style="width: 250px; text-align:center;">
										<div class="media-body" style="padding-top: 2%">
											<?php 
                                                $admin = mysqli_fetch_array($dAdmin);
                                                $adminName = $admin['adminName'];
												echo $adminName;
												echo "<br>";
												echo "\nAdministrator";
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
                        <h1 class="page-head-line">Manage Venue &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> &nbsp; Edit Venue </h1>
                    </div>
            </div>
			<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8"> 
						  <!--    Striped Rows Table  -->
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center">
								<b><i class="glyphicon glyphicon-pencil"></i> Edit Venue</b> <!--Retrieve from database-->
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" name="editV">
									<div class=" row form-group">
										<label class="col-md-4" align="right">Venue Code</label>
										<div class="col-md-6">
											<input type="text" class="form-control" value="<?php echo $vCode;?>" name="vCode" readonly /> <!--from database-->
										</div>
									</div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Room Name</label>
                                        <div class="col-md-6">
                                            <input type="text" style="text-transform:uppercase" class="form-control"  value="<?php echo $rName;?>" name="rName"> 
                                        </div>
                                    </div>
									<div class="row form-group">
										<label class="col-md-4" align="right">Room Size</label>
										<div class="col-md-6">
											<input type="text" class="form-control"  value="<?php echo $rSize;?>" name="rSize"> 
										</div>
									</div>
                                    <div class=" row form-group">
                                        <label class="col-md-4" align="right">Location</label>
                                        <div class="col-md-6">
                                            <input type="text" style="text-transform:uppercase" class="form-control" value="<?php echo $locate;?>" name="locate"> <!--from database-->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Note</label>
                                        <div class="col-md-6">
                                            <input type="text" style="text-transform:uppercase" class="form-control"  value="<?php echo $note;?>" name="note"> 
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Category</label>
                                        <div class="col-md-6">
                                            <input type="text" style="text-transform:uppercase" class="form-control"  value="<?php echo $category;?>" name="category"> 
                                        </div>
                                    </div>
									<div class="row" align="center">
										<!--div class="col-md-10"></div-->
										<!--div class="col-md-2" align="center" -->
                                            <form class="form-horizontal" action="ad-managevenue.php?page=1" method="get" name="mngV" >
											<input type="hidden" name="progID" value="<?php echo $_GET['id'];?>">
											<button type="submit" class="btn btn-success " name="update">UPDATE</button>
                                            <a href="ad-managevenue.php?page=1" class="btn btn-danger "> CANCEL</a>
                                            
										<!--/div-->
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