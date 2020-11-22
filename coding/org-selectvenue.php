<?php
    include_once("db_connection.php");
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
    <title>LIST OF VENUES FOR EVENT</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css-ht/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css-ht/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css-ht/style.css" rel="stylesheet" />
</head>

<body>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
					<h1 class="page-head-line">List of Venues for Event</h1>
				</div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>List of Venue</b> <!--HT: Retrieve from database-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id= "subject-grid" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Venue Code</th>
                                            <th>Room Name</th>
                                            <th>Room Size</th>
                                            <th>Location</th>
                                            <th>Note</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$i = 1;
											$venue = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.venue");
											while($row = mysqli_fetch_array($venue)){ 
												//index
												echo "<tr>";
												echo "<td>".$i."</td>";
												
												//Venue Code
												$vCode = $row['venueCode'];
												echo "<td>".$vCode."</td>";
												
                                                //Room Name
                                                $rName = $row['roomName'];
                                                echo "<td>".$rName."</td>";

												//Room Size
												$rSize= $row['roomSize'];
												echo "<td>".$rSize."</a></td>";

                                                //Location
                                                $locatenote= $row['location'];
                                                echo "<td>".$locatenote."</a></td>";

                                                //Note
                                                $note= $row['note'];
                                                echo "<td>".$note."</a></td>";

                                                //Category
                                                $cate= $row['category'];
                                                echo "<td>".$cate."</a></td>";
												
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
</body>
</html>