<?php
session_start();

if(!$_SESSION['organizerID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include_once("db_connection.php");

$username = $_SESSION['organizerID'];
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE organizerID='$username'"); // using mysqli_query instead

$dEve= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event");
//$dOrg= mysqli_query($db_connect, "SELECT * FROM organizer");
$dStd= mysqli_query($db_connect, "SELECT * FROM heasuratimran.students");

//getting id from url
//$organizerID = $_GET['organizerID'];

//selecting data associated with this particular id
//$red = mysqli_query($db_connect, "SELECT * FROM organizer WHERE organizerID='$organizerID'");

while($res = mysqli_fetch_array($dOrg)){
	$organizerID = $res['organizerID'];
	$orgName = $res['orgName'];
	$picFn = $res['picFirstname'];
	$picLn= $res['picLastname'];
	$sID = $res['staffID'];
	$picPhone = $res['picPhone'];
	$picEmail = $res['picEmail'];
}


$search = intval($_GET['q']);
if ($search=='1') {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.organizerID='$username' AND e.endDate BETWEEN CURDATE() and (CURDATE() + INTERVAL 1 WEEK) ORDER BY e.startDate DESC";
	$upcoming = mysqli_query($db_connect, $query);
}
	 	
else if ($search=='2'){
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.organizerID='$username' AND e.endDate BETWEEN CURDATE() and (CURDATE() + INTERVAL 14 DAY) ORDER BY e.startDate DESC";
	$upcoming = mysqli_query($db_connect, $query);
}

else if ($search=='3') {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.organizerID='$username' AND e.endDate BETWEEN CURDATE() and (CURDATE() + INTERVAL 1 MONTH) ORDER BY e.startDate DESC";
	$upcoming = mysqli_query($db_connect, $query);
} 

else if($search=='4') {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.organizerID='$username' AND e.endDate >= CURDATE() ORDER BY e.startDate, e.eTime";
	$upcoming = mysqli_query($db_connect, $query);
}

else {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.organizerID='$username' AND e.endDate >= CURDATE() ORDER BY e.startDate, e.eTime";
	$upcoming = mysqli_query($db_connect, $query);
}
	
	/*function searchTable($query)
	{
		$mysqli = mysqli_connect('localhost','root','', 'eventqrsystem');
		$searchResult=mysqli_query($mysqli, $query);
		return $searchResult;
	}*/

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
	<div class="panel panel-default" method>
                        <div class="panel-heading" style="text-align: center">
                            <b>Upcoming Events for <?php echo $orgName;?></b> 
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

                                            while($eve = mysqli_fetch_array($upcoming)){ 
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

</body>
</html>