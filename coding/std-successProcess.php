<?php
session_start();

if(!$_SESSION['studentid'])
{

    header("Location: loginS.php");//redirect to login page to secure the welcome page without login access.
}
//including the database connection file
include_once("db_connection.php");

$studentID = $_SESSION['studentid'];
$id=$_GET['id'];
$dStd = mysqli_query($db_connect, "SELECT * FROM heasuratimran.students std WHERE std.studentid='$studentID'"); // using mysqli_query instead
$dEvent= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event e WHERE e.endDate >= CURDATE() ORDER BY `startDate`, `eTime`");
$dAtt = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.attendance att WHERE att.studentid='$studentID'");

if($res = mysqli_fetch_array($dStd)){
	$studentID = $res['studentid'];
	$sName = $res['studentname'];
}
else if($row = mysqli_fetch_array($dEvent)){
	$eName = $row['eventName'];
	$sDate = $row['startDate'];
	//$formattedsDate = $sDate->format('d/m/Y');
	$eDate = $row['endDate'];
	//$formattedeDate = $eDate->format('d/m/Y');
	$time = $row['eTime'];
	//$formattedTime = $time->format('HH:MM');
	$category = $row['category'];
}

if (isset($_POST['seven'])) {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.endDate BETWEEN CURDATE() and (CURDATE() + INTERVAL 1 WEEK) ORDER BY e.startDate DESC";
	$upcoming = mysqli_query($db_connect, $query);
}
	 	
else if (isset($_POST['fourteen'])){
	$query = "SELECT * FROM eventqrsystem.event e WHERE  e.endDate BETWEEN CURDATE() and (CURDATE() + INTERVAL 14 DAY) ORDER BY e.startDate DESC";
	$upcoming = mysqli_query($db_connect, $query);
}

else if (isset($_POST['month'])) {
	$query = "SELECT * FROM eventqrsystem.event e WHERE  e.endDate BETWEEN CURDATE() and (CURDATE() + INTERVAL 1 MONTH) ORDER BY e.startDate DESC";
	$upcoming = mysqli_query($db_connect, $query);
} 

else if(isset($_POST['all'])) {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.endDate >= CURDATE() ORDER BY e.startDate, e.eTime";
	$upcoming = mysqli_query($db_connect, $query);
}

else {
	$query = "SELECT * FROM eventqrsystem.event e WHERE e.endDate >= CURDATE() ORDER BY e.startDate, e.eTime";
	$upcoming = mysqli_query($db_connect, $query);
}
	
	/*function searchTable($query)
	{
		$mysqli = mysqli_connect('localhost','root','', 'eventqrsystem');
		$searchResult=mysqli_query($mysqli, $query);
		return $searchResult;
	}*/
?>