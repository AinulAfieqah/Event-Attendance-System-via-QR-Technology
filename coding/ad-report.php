<?php
include_once("ad-reportProcess.php")
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
                            <li><a href="ad-managevenue.php?page=1">Manage Venue</a></li>
                            <li><a href="ad-managestudent.php?page=1">View Student</a></li>
                            <li><a href="ad-manageprogrammes.php">View Programme</a></li>
                            <li><a class="menu-top-active" href="ad-report.php">View Report</a></li>
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
                    <h4 class="page-head-line">Report</h4>
                </div>
            </div>

           <div class="row">
                <div class="col-md-6">
                    <div id="donutchart" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="col-md-6">
                    <div id="donutchart1" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="col-md-6">
                    <div id="donutchart2" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="col-md-6">
                    <div id="donutchart3" style="width: 900px; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</body>

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Organizer Name', 'Total Events Organized'],
          ['HEA UiTM Raub',     <?php echo $hea?>],
          ['HEP UiTM Raub',      <?php echo $hep?>]
        ]);

        var options = {
          title: 'Events Organized According to Organizer',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Programme Code', 'Students Attended Events'],
          ['AM110',     <?php echo $am110?>],
          ['BM119',      <?php echo $bm119?>],
          ['BM111',     <?php echo $bm111?>],
          ['CS110',      <?php echo $cs110?>],
          ['CS111',     <?php echo $cs111?>],
          ['BA111',      <?php echo $ba111?>],
          ['BA119',      <?php echo $ba119?>]
        ]);

        var options = {
          title: 'Students Attended Events By Programme Code',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Programme Name', 'Students Attended Events'],
          ['DIPLOMA PENTADBIRAN AWAM',     <?php echo $awam?>],
          ['DIPLOMA PENGAJIAN PERBANKAN',      <?php echo $bank?>],
          ['DIPLOMA PENGAJIAN PERNIAGAAN',     <?php echo $niaga?>],
          ['DIPLOMA SAINS KOMPUTER',      <?php echo $cs?>],
          ['DIPLOMA STATISTIK',     <?php echo $stat?>]
        ]);

        var options = {
          title: 'Students Attended Events By Programme Name',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Category', 'Students Attended Events',],
            ['Academic', <?php echo $academic?>],
            ['Award', <?php echo $award?>],
            ['Career', <?php echo $career?>],
            ['Cultural', <?php echo $cultural?>],
            ['Entrepreneurship', <?php echo $entre?>],
            ['Innovation', <?php echo $innovation?>],
            ['Leadership', <?php echo $leader?>],
            ['Sport', <?php echo $sport?>],
            ['Volunteer', <?php echo $volunteer?>],
        ]);

        var options = {
          title: 'Students Attended Events By Category',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
        chart.draw(data, options);
      }
    </script>

</body>
</html>