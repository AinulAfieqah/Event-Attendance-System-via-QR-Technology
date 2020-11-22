<?php
//include_once("std-reportProcess.php")

session_start();

if(!$_SESSION['studentid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}
//including the database connection file
include_once("db_connection.php");

$studentID = $_SESSION['studentid'];

$dStd = mysqli_query($db_connect, "SELECT * FROM heasuratimran.students s WHERE s.studentid='$studentID'");

$sql = "SELECT e.category FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID'";
//echo $sql;
$result = mysqli_query($db_connect, $sql);
if(!$result)
        {
            echo "Fail to Open";
        }

$academic=0; 
$award=0;
$career=0;
$cultural=0;
$entre=0;
$innovation=0;
$leader=0;
$sport=0;
$volunteer=0;

    while($try = mysqli_fetch_array($result)){

    $cat = $try['category'];
        //echo $cat;

        if($cat == 'Academic'){
            $academic++;
            //echo $academic;
        }
        else if($cat == 'Award'){
            $award++;
            //echo $award;
        }
        else if($cat == 'Career'){
            $career++;
            //echo $career;
        }
        else if($cat == 'Cultural'){
            $cultural++;
            //echo $cultural;
        }
        else if($cat == 'Entrepreneurship'){
            $entre++;
            //echo $entre;
        }
        else if($cat == 'Innovation'){
            $innovation++;
            //echo $innovation;
        }
        else if($cat == 'Innovation'){
            $leader++;
            //echo $leader;
        }
        else if($cat == 'Sport'){
            $sport++;
            //echo $sport;
        }
        else{
            $volunteer++;
            //echo $volunteer;
        }
    }

    if($res = mysqli_fetch_array($dStd)){
    $studentID = $res['studentid'];
    $sName = $res['studentname'];
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
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
                </div>

            </div>
        </div>
    </header>-->
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

            <!--<div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <!--<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>-->
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a href="std-dashboard.php">DASHBOARD</a></li>
                            <li><a class="menu-top-active" href="std-viewreport.php">VIEW REPORT</a></li>
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
                    <h4 class="page-head-line">Report</h4>
                </div>
            </div>
            <div class="row">
                   <div class="col-md-3 col-sm-3 col-xs-6">
                   <div class="dashboard-div-wrapper bk-clr-one">
                        <h6 style="color: dimgrey"> TOTAL EVENTS ATTENDED </h6>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          </div>
                        </div> 
                        <h1> <a  style="color: blue"> <?php $totEve=mysqli_num_rows($result); echo $totEve;?> </a> </h1><!--can take from database?-->
                    </div>
                    </div>
                    <center><div id="chart_div"></div></center>
             </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form class="example">
                        Search by Date &nbsp;&nbsp;
                        <!--Search by Event Name &nbsp;&nbsp;action="std-report.php"
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter event names..">
                        Search by Date &nbsp;&nbsp;><input type="dropdown" name="valueToSearch" placeholder="Event Name" -->
                        <select name="datesearch" onchange="showDate(this.value)" placeholder="Event Date">
                            <option value="">Select Date Range:</option>
                            <option value="1">Last 7 days</option>
                            <option value="2">Last 14 days</option>
                            <option value="3">Last month</option>
                            <option value="4">View All</option>
                        </select>
                        <!--input type="submit" name="submit" value="Go">
                        <input type="submit" name="fourteen" value="Last 14 days">
                        <input type="submit" name="month" value="Last month">
                        <input type="submit" name="all" value="View all"-->
                    </form>
                    <br>
                    <div id="txtHint"><b>Attended events will be listed here...</b></div>
                <!--table-->
                <!--div class="panel panel-default">
                        <div class="panel-heading">
                            Attended Events
                        </div>
                    <div class="panel-body">
                <div class="table-responsive">
                                <table id= "subject-grid" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Activity</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i = 1;
                                       while ($rep = mysqli_fetch_array($list)) {
                                            $eID=$rep['eventID'];
                                        ?>
                                          <tr>
                                                <td><?php echo $i?></td>
                                                
                                                <td><?php echo $rep['eventName']?></td>

                                                <td><?php echo $rep['startDate']?></td>

                                                <td> <a href="std-printcert.php?id=<?php echo $eID; ?>"  class="btn btn-xs btn-success">E-cert</a> </td>
                                        <?php   
                                            $i++;
                                       }
                                       ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div-->
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
    <!--<script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = google.visualization.arrayToDataTable([
                ['Category', 'Total Attended',],
                ['Academic',10],
                ['Award', '<?php //echo $award?>'],
                ['Career', 3],
                ['Cultural', 2],
                ['Entrepreneurship', 20],
                ['Innovation', 15],
                ['Leadership', 2],
                ['Sport', '<?php //echo $sport?>'],
                ['Volunteer', 15]
            ]);

            var options = {
                title: 'Events Attended by <?php //echo $sName?>',
                chartArea: {width: '50%'},
                hAxis: {
                title: 'Total Attended',
                minValue: 0
                },
                vAxis: {
                title: 'Category'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, options);
            }
    </script>-->
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

        var data = new google.visualization.arrayToDataTable([
            ['Category', 'Total Attended',],
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
        title: 'Total Events Attended by <?php echo $sName?>',
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
<script type="text/javascript">
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("subject-grid");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];

        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>
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
        xmlhttp.open("GET","std-reportProcess.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>