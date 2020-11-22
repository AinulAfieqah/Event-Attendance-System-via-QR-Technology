<?php
include_once("ad-manageorganizerProcess.php")
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
                            <li><a class="menu-top-active" href="ad-manageorganizer.php">Manage Organizer</a></li>
                            <li><a href="ad-managevenue.php?page=1">Manage Venue</a></li>
                            <li><a href="ad-managestudent.php?page=1">View Student</a></li>
                            <li><a href="ad-manageprogrammes.php">View Programme</a></li>
                            <li><a href="ad-report.php">VIEW REPORT</a></li>
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
					<h1 class="page-head-line">Manage Organizer</h1>
				</div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
					<form class="example" action="ad-manageorganizer.php" method="post">
						Search by Organizer Name &nbsp;&nbsp;
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter org names..">
					</form> <br>
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>List of Organizer</b> <!--HT: Retrieve from database-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id= "subject-grid" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Organizer ID</th>
                                            <th>Organizer Name</th>
                                            <th>Person In Charge</th>
											<th>Total Events</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$i = 1;
											$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer");
											while($org = mysqli_fetch_array($dOrg)){ 
												//index
												echo "<tr>";
												echo "<td>".$i."</td>";
												
												//Organizer ID
												$orgID = $org['organizerID'];
												echo "<td>".$orgID."</td>";
												
												//Organizer Name
												$oName= $org['orgName'];
												echo "<td>".$oName."</a></td>";
												
												
												//Person in Charge
												$pic = $org['picFirstname'];
												echo "<td>".$pic."</td>";	
												
												//Total Event
												$oTE = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event eve WHERE eve.organizerID='$orgID'");
												$totEve= mysqli_num_rows($oTE);
												echo "<td>".$totEve."</td>";

                                                //Action
                                                echo "<td><a href=\"ad-editorganizer.php?id=$orgID\"><i class='glyphicon glyphicon-edit'></i></a> | <a href=\"ad-deleteorganizer.php?id=$orgID\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='glyphicon glyphicon-trash'></i></a></td>";
												
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
            <form class="form-horizontal" action="ad-addorganizer.php" method="get" name="form1">
                 <button type="submit" class="btn btn-warning" name="Submit" value="addOrg">Add  Organizer</button>
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
</body>
</html>