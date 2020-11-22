<?php
include_once("org-attendanceProcess.php")
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
            <div class="navbar-header" align="center">
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
                    <h1 class="page-head-line"><img src="img/uitmonly.png" alt="uitmlogo" width="20" /> Attendees for <?php echo $eName;?></h1>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-1"> </div>
                <div class="col-md-10"> <!--HT-->

                        <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">
                            <b>Participant Details</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student Name</th>
                                            <th>Student No</th>
                                            <th>Programme Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       $i = 1;
                                       $sql = "SELECT s.studentname, s.studentno, p.programmecode FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid = att.studentid JOIN eventqrsystem.authentication aut on att.qrCode = aut.qrCode JOIN eventqrsystem.event e on aut.eventID = e.eventID JOIN eventqrsystem.organizer org on e.organizerID = org.organizerID JOIN heasuratimran.programmes p on s.programmeid = p.programmeid WHERE org.organizerID='$organizerID' and e.eventID='$eventID'";
                                       
                                       $attend = mysqli_query($db_connect, $sql);
                                      //$attend = mysqli_query($db_connect, "SELECT student.sFirstname, student.studentID, student.sFaculty FROM organizer, event, authentication, attendance, student WHERE organizer.organizerID='$organizerID' and event.organizerID='$organizerID' and event.eventID='$eventID' and authentication.eventID='$eventID' and authentication.qrCode=attendance.qrCode and attendance.studentID=student.studentID");
                                        if(!$attend)
                                            {
                                                echo "Fail to Open";
                                            }

                                       while ($rep = mysqli_fetch_array($attend)) {
                                        ?>
                                          <tr>
                                                <td><?php echo $i?></td>
                                                
                                                <td><?php echo $rep['studentname']?></td>

                                                <td><?php echo $rep['studentno']?></td>

                                                <td><?php echo $rep['programmecode']?></td>
                                        <?php   
                                            $i++;
                                       }
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        
                        
                        <div class="row">
                             <div class="col-md-12" align="center">
                                <a href="javascript:alert('Please be sure to set your printer to Potrait.');window.print();" class="btn btn-info btn-lg">
                                    <span class="glyphicon glyphicon-print"></span> Print
                                </a>
                            </div>
                        </div>
                    
                    </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>

</body>
</html>
