<?php
include_once("org-manageeventProcess.php")
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
					<h1 class="page-head-line">Manage Event</h1>
				</div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
					<form class="example" action="ad-manageevent.php" method="post">
						Search by Event Name &nbsp;&nbsp;
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter event names.."> 
					</form> <br>
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>List of Event</b> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id= "subject-grid" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Event ID</th>
                                            <th>Event Name</th>
                                            <th>Venue</th>
											<th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$i = 1;
                                            $dEve = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event eve JOIN eventqrsystem.venue ven ON eve.venueCode=ven.venueCode JOIN eventqrsystem.organizer org ON eve.organizerID=org.organizerID WHERE eve.organizerID='$organizerID'");
											while($eve = mysqli_fetch_array($dEve)){ 
												//index
												echo "<tr>";
												echo "<td>".$i."</td>";
												
												//Event ID
												$eID = $eve['eventID'];
												echo "<td>".$eID."</td>";
												
												//Event Name
												$eName= $eve['eventName'];
												echo "<td>".$eName."</td>";
												
                                                //Event Venue
                                                $venue = $eve['roomName'];
                                                echo "<td>".$venue."</td>";

												//Event Category
												//$category = $eve['category'];
												//echo "<td>".$category."</td>";	
												
												//Event Start Date
												$sDate = $eve['startDate'];
												echo "<td>".$sDate."</td>";

                                                //Event End Date
                                                $eDate = $eve['endDate'];
                                                echo "<td>".$eDate."</td>";

                                                //Event time
                                                //$time = $eve['eTime'];
                                                //echo "<td>".$time."</td>";

                                                //Action
                                                echo "<td><a href=\"org-generateQR.php?id=$eID\"><i class='glyphicon glyphicon-qrcode'></i></a> | <a href=\"org-editevent.php?id=$eID\"><i class='glyphicon glyphicon-edit'></i></a> | <a href=\"org-printgeneratedQR.php?id=$eID\"><i class='glyphicon glyphicon-print'></i></a> | <a href=\"org-deleteevent.php?id=$eID\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='glyphicon glyphicon-trash'></i></a></td>";
												
												$i++;
											}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  End  Striped Rows Table  -->
                </div>
            </div>
        </div>
        <div class="row" align="center">
            <form class="form-horizontal" action="org-addevent.php" method="get" name="formAddE">
                 <button type="submit" class="btn btn-warning" name="Submit" value="addEve">Add  Event</button>
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
    <script>
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("subject-grid");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];

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
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('#postContent').html(html);
            $('.loading-overlay').fadeOut("slow");
        }
    });
}
</script-->
</body>
</html>