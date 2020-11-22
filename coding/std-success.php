<?php
include_once("std-successProcess.php")
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
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a class="menu-top-active" href="std-success.php?id=<?php echo $id ; ?>">DASHBOARD</a></li>
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
                        <?php 
                            $eID=$_GET['id'];
                            $decode=base64_decode($eID);
                            $dEve= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event e WHERE e.eventID='$decode'");

                            if($row = mysqli_fetch_array($dEve)){
                                $eName = $row['eventName'];
                                $eVen = $row['venue'];
							} 
                            function curdate() {
                                return date('d-m-Y');
                            }
                            echo $sName; ?>, you have successfully attended <?php 
                            echo $eName; ?> at <?php echo $eVen;?> on <?php echo curdate();?>! :)
                            <label><a href="std-report.php"> View History</a></label>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12"> 
                    <form class="example" action="std-success.php?id=<?php echo $id ; ?>" method="post">
                        Search by Event Name &nbsp;&nbsp;
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter event names.."> 
                        <input type="submit" name="seven" value="This Week">
                        <input type="submit" name="fourteen" value="This Two Weeks">
                        <input type="submit" name="month" value="This Month">
                        <input type="submit" name="all" value="View All">
                    </form> <br>
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>Upcoming Events</b> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id= "subject-grid" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Event Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Time</th>
                                            <th>Category</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1;

                                            while($eve = mysqli_fetch_array($dEvent)){ 
                                                //index
                                                echo "<tr>";
                                                echo "<td>".$i."</td>";
                                                
                                                //Event Name
                                                $eName= $eve['eventName'];
                                                echo "<td>".$eName."</td>";
                                                
                                                //Event Start Date
                                                $sDate = new DateTime($eve['startDate']);
                                                $formattedsDate = $sDate->format('d/m/Y');
                                                echo "<td>".$formattedsDate."</td>";

                                                //Event End Date
                                                $eDate = new DateTime($eve['endDate']);
                                                $formattedeDate = $eDate->format('d/m/Y');
                                                echo "<td>".$formattedeDate."</td>";
                                                //Event time
                                                $time = $eve['eTime'];
                                                echo "<td>".$time."</td>";

                                                //Event Category
                                                $category = $eve['category'];
                                                echo "<td>".$category."</td>";  
                                                
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
    </div>		

    <div class="text-center alert alert-warning">
                        <a href="https://www.facebook.com/uitm.raub.9" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="https://pahang.uitm.edu.my/v3/index.php/direktori/kampus-raub" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <!--<a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-search"></i>&nbsp; Search </a>
                        <a href="#" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>-->
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
                } 
                else {
                tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
</body>
</html>