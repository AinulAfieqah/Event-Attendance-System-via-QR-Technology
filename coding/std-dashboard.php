<?php
//include_once("std-dashboardProcess.php")
session_start();

if(!$_SESSION['studentid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}
//including the database connection file
include_once("db_connection.php");

$studentID = $_SESSION['studentid'];
$dStd = mysqli_query($db_connect, "SELECT * FROM heasuratimran.students s WHERE s.studentid='$studentID'"); // using mysqli_query instead
$event= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event");
$dEvent= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event e WHERE e.endDate >= CURDATE() ORDER BY e.startDate and e.eTime");
$dPassEve= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event e WHERE e.endDate <= CURDATE() ORDER BY e.startDate and e.eTime");
if(!$dPassEve)
        {
            echo "Fail to Open";
        }
$dAtt = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.attendance att WHERE att.studentid='$studentID'");
$table = mysqli_query($db_connect, "SELECT e.eventName, e.startDate, e.endDate, e.eTime, e.category, att.studentid FROM  eventqrsystem.attendance att JOIN eventqrsystem.authentication aut on att.qrCode = aut.qrCode JOIN eventqrsystem.event e on aut.eventID = e.eventID");
if(!$table)
        {
            echo "Fail to Open Table";
        }

if($res = mysqli_fetch_array($dStd)){
    $studentID = $res['studentid'];
    $sName = $res['studentname'];
}
else if($row = mysqli_fetch_array($dEvent)){
    $eName = $row['eventName'];
    $sDate = $row['startDate'];
    //$formattedsDate = $sDate->format('d/m/Y');
    $eDate = $row['endDate'];
    //$formattedeDate = $eDate->format('d/m/Y');
    $time = $row['eTime'];
    //$formattedTime = $time->format('HH:MM');
    $category = $row['category'];
}
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
                            <li><a class="menu-top-active" href="std-dashboard.php">DASHBOARD</a></li>
                            <li><a href="std-report.php">VIEW REPORT</a></li>
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
                                                echo $sName;
												echo "<br>";
												echo "Student";
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
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Welcome back, <?php echo $sName;?>! :)
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                     <form class="example">
                        Search by Date &nbsp;&nbsp;
                        <!--Search by Event Name &nbsp;&nbsp;action="std-report.php"
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter event names..">
                        Search by Date &nbsp;&nbsp;><input type="dropdown" name="valueToSearch" placeholder="Event Name" -->
                        <select name="datesearch" onchange="showDate(this.value)" placeholder="Event Date">
                            <option value="">Select Date Range:</option>
                            <option value="1">This week</option>
                            <option value="2">This two weeks</option>
                            <option value="3">This month</option>
                            <option value="4">View All</option>
                        </select>
                    </form>
                    <br>
                    <div id="txtHint"><b>Upcoming events will be listed here...</b></div>
                      <!--    Striped Rows Table  -->
                    
                    <!--  End  Striped Rows Table  -->
		      </div>	
	       </div>	

           
	   </div>
    </div>		

    <div class="text-center alert alert-warning">
                        <a href="https://www.facebook.com/uitm.raub.9" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="https://pahang.uitm.edu.my/v3/index.php/direktori/kampus-raub" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                    </div>		
    <!-- CONTENT-WRAPPER SECTION END -->
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
    <script>
    function showDate(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","std-dashboardProcess.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>
</body>
</html>