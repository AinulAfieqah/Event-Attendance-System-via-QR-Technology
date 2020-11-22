<?php
include_once("org-addeventProcess.php")
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
                            <li><a href="org-dashboard.php">Dashboard</a></li>
                            <li><a class="menu-top-active" href="org-manageevent.php">Manage Event</a></li>
                            <li><a class="nav navbar-nav navbar-left" href="org-report.php">VIEW REPORT</a></li>
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
												$org = mysqli_fetch_array($dOrg);
                                                $picName = $org['picFirstname'];
                                                echo $picName;
                                                echo "<br>";
                                                echo "\nOrganizer";
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
                        <h1 class="page-head-line">Manage Event &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> &nbsp;Add Event </h1>
                    </div>
            </div>
			<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8"> 
						  <!--    Striped Rows Table  -->
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center">
								<b><i class="glyphicon glyphicon-plus"></i> Add Event</b> <!--Retrieve from database-->
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" name="formAddE">
									<div class="row form-group">
										<label class="col-md-4" align="right" for="eve_name">Event Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Enter event name" name="eName"> 
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-4" align="right" for="desc">Description</label>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Enter description of event" name="eDesc" value="">
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-4" align="right" for="category">Category</label>
										<div class="col-md-6">
											<select class="form-control" placeholder="Enter category" name="eCat" value="">
												<option>Academic</option>
												<option>Award</option>
                                                <option>Career</option>
                                                <option>Cultural</option>
                                                <option>Entrepreneurship</option>
                                                <option>Innovation</option>
                                                <option>Leadership</option>
                                                <option>Sport</option>
                                                <option>Volunteer</option>
                                            </select>
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-4" align="right" for="eVenue">Venue Code</label>
										<div class="col-md-6">
											<select class="form-control" placeholder="Enter venue" name="eVenue" value="">
                                            <?php
                                                $dVen = mysqli_query($db_connect, "SELECT ven.venueCode  FROM eventqrsystem.venue ven");
                                                while($ven = mysqli_fetch_array($dVen)){
                                                    echo "<option value='".$ven['venueCode']."'>".$ven['venueCode']."</option>";
                                            }
                                            ?>
                                            </select>
                                            <a href="#" onclick="window.open('org-selectvenue.php','newwindow','width=500,height=1000');" > >> List of Venues << </a>
										</div>
									</div>
									<div class="row form-group">
										<label class="col-md-4" align="right" for="eSDate">Start Date</label>
										<div class="col-md-6">
											<input type="date" class="form-control" name="eSDate" value="">
											</div>
									</div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right" for="eEDate">End Date</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="eEDate" value="">
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right" for="eTime">Time</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="eTime" value="">
                                            </div>
                                    </div>
									<div class="row">
										<div class="col-md-10"></div>
										<div class="col-md-2" align="left">
                                            <form class="form-horizontal" action="org-manageevent.php" method="get" name="addEve">
											     <button type="submit" class="btn btn-warning" name="Create">CREATE</button>
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
