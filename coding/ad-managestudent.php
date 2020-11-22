<?php
include_once("ad-managestudentProcess.php")
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
    
    <!-- newly added: 20/12/2019 -->
    <!-- Bootstrap 3.3.7 
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- end -->
</head>

<style>
    #difull p{ color:#fff; font-size:30px; margin:5px; font-weight:bold}
.pagination {
    padding: 6px;
}
div.pagination a {
    padding: 5px 12px;
    margin:6px;
    border: 2px solid #AAAADD;
    text-decoration: none;
    color: #000099;
    background:#fff;
}
div.pagination a:hover, div.pagination a:active {
    border: 2px dashed #000;
    color: #fff;
    background:#C4C4C4;
}
div.pagination span.current {
    padding: 5px 12px;
    margin: 2px;
    border: 2px solid #0C8ED7;
    font-weight: bold;
    background-color: tomato;
    color: #fff;
}
div.pagination span.disabled {
    padding: 5px 12px;
    margin: 2px;
    border: 1px solid #EEE;
    color: #fff;
    background:#666;
}
</style>

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
                            <li><a  href="ad-manageorganizer.php">Manage Organizer</a></li>
                            <li><a href="ad-managevenue.php?page=1">Manage Venue</a></li>
                            <li><a class="menu-top-active" href="ad-managestudent.php?page=1">View Student</a></li>
                            <li><a href="ad-manageprogrammes.php">View Programme</a></li>
                            <li><a href="ad-report.php">View Report</a></li>
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
                    <h1 class="page-head-line">View Student</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                    <!--form class="example" action="ad-managestudent.php" method="post">
                        Search by Student No &nbsp;&nbsp;
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Student No.."> 
                    </form> <br-->
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>List of Student</b> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id= "list-student" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student IC No</th>
                                            <th>Student No</th>
                                            <th>Student Name</th>
                                            <th>Programme Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            $i = $page*10+1-10;

                                            while($std = mysqli_fetch_array($result)){ 
                                                //index
                                                echo "<tr>";
                                                echo "<td>".$i."</td>";
                                                
                                                //Student IC
                                                $sIC = $std['studenticno'];
                                                echo "<td>".$sIC."</td>";
                                                
                                                //Student Name
                                                $sName= $std['studentno'];
                                                echo "<td>".$sName."</td>";
                                                
                                                //Student Course
                                                $sCourse = $std['studentname'];
                                                echo "<td>".$sCourse."</td>";   
                                                
                                                //Student Faculty
                                                $sFac = $std['programmecode'];
                                                echo "<td>".$sFac."</td>";

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
            <div style="margin-top:60px"> <?=$pagination?></div>
            <?php
                /*for($page=1;$page<=$number_of_pages;$page++)
        {
            echo '<a id="pagingLink" href="ad-managestudent.php?page=' . $page . '"> ' . $page . '</a>';
        }*/
        ?>
            <!--form class="form-horizontal" action="ad-addstudent.php" method="get" name="formAddS">
                 <button type="submit" class="btn btn-warning" name="Submit" value="addStd">Add Student</button>
            </form-->
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
    <!--script>
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
        //td1 = tr[i].getElementsByTagName("td")[3];
        val[];
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
</script-->

<!-- end -->
</body>
</html>