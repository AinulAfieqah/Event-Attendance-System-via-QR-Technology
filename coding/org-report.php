<?php
include_once("org-reportProcess.php")
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
                            <li><a href="org-dashboard.php">Dashboard</a></li>
                            <li><a href="org-manageevent.php">Manage Event</a></li>
                            <li><a class="menu-top-active" href="org-report.php">VIEW REPORT</a></li>
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
                    <h4 class="page-head-line">VIEW REPORT</h4>
                    <!--<center><div id="chart_div"></div></center>-->
                </div>
            </div>

            <center><div class="row">
                   <div class="col-md-3 col-sm-3 col-xs-6">
                   <div class="dashboard-div-wrapper bk-clr-one">
                        <h6 style="color: dimgrey"> TOTAL EVENTS ORGANISED </h6>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          </div>
                        </div> 
                        <h1> <a  style="color: blue"> <?php $totEve=mysqli_num_rows($orgEve); echo $totEve;?> </a> </h1><!--can take from database?-->
                    </div>
                    </div>
                    <center><div id="chart_div"></div></center>
                </div>
            </center>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                <!--table-->
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Organized Events
                        </div>
                    <div class="panel-body">
                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Activity</th>
                                            <th>Venue</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>List of Attendees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i = 1;
                                       $table = mysqli_query($db_connect, "SELECT e.eventName, v.roomName, e.eTime, e.startDate, e.eventID FROM eventqrsystem.organizer org JOIN eventqrsystem.event e on org.organizerID = e.organizerID JOIN eventqrsystem.venue v ON e.venueCode = v.venueCode WHERE org.organizerID='$organizerID'");

                                       if(!$table)
                                        {
                                            echo "Fail to Open DB";
                                        }

                                       while ($rep = mysqli_fetch_array($table)) {
                                        $eventID = $rep['eventID'];
                                        //echo $eventID;
                                        ?>
                                          <tr>
                                                <td><?php echo $i?></td>
                                                <td><?php echo $rep['eventName']?></td>
                                                <td><?php echo $rep['roomName']?></td>
                                                <td><?php echo $rep['startDate']?></td>
                                                <td><?php echo $rep['eTime']?></td>
                                                <td> <a href="org-attendance.php?id=<?php echo $eventID; ?>"  class="btn btn-xs btn-success">View</a> </td>
                                        <?php   
                                            $i++;
                                       }
                                       ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

        var data = new google.visualization.arrayToDataTable([
            ['Category', 'Total Organised',],
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
        title: 'Total Events Organised by <?php echo $org['orgName']?>',
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>

</body>
</html>