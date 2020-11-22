<?php
include_once("org-editprofileProcess.php")
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
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Organizer Dashboard &nbsp;<i class="glyphicon glyphicon-arrow-right"></i> &nbsp; Edit Profile </h1>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8"> 
                          <!--    Striped Rows Table  -->
                        <div class="panel panel-default">
                            <div class="panel-heading" style="text-align: center">
                                <b><i class="glyphicon glyphicon-pencil"></i> Edit Organizer</b> <!--Retrieve from database-->
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" name="form2">
                                    <div class=" row form-group">
                                        <label class="col-md-4" align="right">Organizer ID</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" value="<?php echo $organizerID;?>" name="organizerID" readonly /> <!--from database-->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Organizer Name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  value="<?php echo $orgName;?>" name="orgName" readonly /> <!--from database-->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Person In Charge Firstname</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" style="text-transform:uppercase" value="<?php echo $picFn;?>" name="picFirstname"> 
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Person In Charge Lastname</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  style="text-transform:uppercase" value="<?php echo $picLn;?>" name="picLastname"> 
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Staff ID</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" value="<?php echo $sID;?>" name="staffID">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Person In Charge Phone</label> 
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" value="<?php echo $picPhone;?>" name="picPhone">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-md-4" align="right">Person In Charge Email</label> 
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" value="<?php echo $picEmail;?>" name="picEmail">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2" align="center">
                                            <!--input type="hidden" name="organizerID" value="<?php //echo $_GET['organizerID'];?>">-->
                                            <button type="submit" class="btn btn-warning" name="update">UPDATE</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                <br/>
            </div>  
        </div>
    </div>
</body>
</html>