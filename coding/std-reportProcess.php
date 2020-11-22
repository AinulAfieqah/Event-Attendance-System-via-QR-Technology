<?php
session_start();

if(!$_SESSION['studentid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}
//including the database connection file
include_once("db_connection.php");

$studentID = $_SESSION['studentid'];

$dStd = mysqli_query($db_connect, "SELECT * FROM heasuratimran.students s WHERE s.studentid='$studentID'");

/*$sql = "SELECT e.category FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID'";
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
	}*/

	$search = intval($_GET['q']);
	//echo $search;
	//$search=isset($_POST['datesearch']);
	//if(isset($_POST['submit'])){
	if($search=='1') {
	//if (isset($_POST['seven'])) {
	 		$query = "SELECT e.eventName, e.startDate, s.studentid, e.eventID FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID' and  e.startDate >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) ORDER BY e.startDate DESC";
	 		//echo $query;
	 		$list = mysqli_query($db_connect, $query);

	 	}
	else if ($search=='2') {
		//(isset($_POST['fourteen'])){
		$query = "SELECT e.eventName, e.startDate, s.studentid, e.eventID FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID' and  e.startDate >= DATE_SUB(CURDATE(), INTERVAL 14 DAY) ORDER BY e.startDate DESC";
			//echo $query;
	 		$list = mysqli_query($db_connect, $query);
	}
	 	
	else if ($search=='3') {
		//(isset($_POST['month'])){
		$query = "SELECT e.eventName, e.startDate, s.studentid, e.eventID FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID' and  e.startDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) ORDER BY e.startDate DESC";
			//echo $query;
	 		$list = mysqli_query($db_connect, $query);
	}

	else if (isset($_POST['4'])){
		$query = "SELECT e.eventName, e.startDate, s.studentid, e.eventID FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID'";
		//echo $query;
		$list = mysqli_query($db_connect, $query);
	}
	else
	{
		$query = "SELECT e.eventName, e.startDate, s.studentid, e.eventID FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID WHERE s.studentid='$studentID'";
		//echo $query;
		$list = mysqli_query($db_connect, $query);
	}

	
	/*function searchTable($query)
	{
		$mysqli = mysqli_connect('localhost','root','', 'eventqrsystem');
		$searchResult=mysqli_query($mysqli, $query);
		return $searchResult;

		if(!$searchResult)
        {
            echo "Fail to Open";
        }
	}*/


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
</head>
<body>

	<div class="panel panel-default">
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
                    </div>

</body>
</html>