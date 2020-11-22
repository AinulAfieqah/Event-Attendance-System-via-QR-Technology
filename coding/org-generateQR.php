<?php
include_once("org-generateQRProcess.php")
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
    <title>QR Code</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css-ht/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css-ht/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css-ht/style.css" rel="stylesheet" />
</head>

<body>
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <!--<div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Manage Section</h1>
                </div>
            </div> -->  
            <div class="row">
                <div class="col-md-1"> </div>
                <div class="col-md-10"> <!--HT-->
                    <div class="panel panel-default">
                        <!--<div class="panel-body">--> 
                        <div align="center">
                                <img src="temp/<?php echo $event_ID.".png"; ?>" width="500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" align="center">
            <form class="form-horizontal" action="org-manageevent.php" method="get" name="formAddE">
                 <button type="submit" class="btn btn-warning" name="Submit" value="backEve">Back</button>
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
<!-- Bootstrap core JavaScript -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>

</body>
</html>
