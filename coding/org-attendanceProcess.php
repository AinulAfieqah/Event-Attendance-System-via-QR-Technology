<?php 
session_start();
if(!$_SESSION['organizerID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include_once("db_connection.php");
$eventID=$_GET['id'];
$organizerID = $_SESSION['organizerID'];
$dEve= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event e JOIN eventqrsystem.venue v ON e.venueCode = v.venueCode WHERE e.eventID='$eventID'");
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'");


//get data from database 	
	while($res=mysqli_fetch_array($dEve)){
		$event_ID = $res['eventID'];
    	$eName = $res['eventName'];
		$eDesc= $res['description'];
		$eCat = $res['category'];
		$eVenue = $res['roomName'];
		$eSDate = $res['startDate'];
		$eEDate = $res['endDate'];
		$eTime = $res['eTime'];
    }

?>