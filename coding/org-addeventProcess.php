<?php
session_start();

if(!$_SESSION['organizerID'])
{
    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include_once("db_connection.php");

$organizerID = $_SESSION['organizerID'];
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'");

//getting id from url
//$oID = $_GET['org_id'];

//selecting data associated with this particular id
//$result = mysqli_query($db_connect, "SELECT * FROM organizer WHERE org_ID='$oID'");
//if (mysqli_num_rows($result) == 0) {
//	echo("<script>alert('No record found!')</script>");
//	echo("<script>window.location = 'ad-dashboard.php';</script>");
//}

//else{
//	$res = mysqli_fetch_array($result);
//	$o_ID = $res['org_ID'];
//	$oName = $res['org_name'];
//}

//including the database connection file
//include_once("db_connection.php");
//$sID = $_GET['id'];
if(isset($_POST['Create'])) {	

	$eve_name = mysqli_real_escape_string($db_connect, $_POST['eName']);
	$desc = mysqli_real_escape_string($db_connect, $_POST['eDesc']);
	$category = mysqli_real_escape_string($db_connect, $_POST['eCat']);
	$venue = mysqli_real_escape_string($db_connect, $_POST['eVenue']);
	$stDate = mysqli_real_escape_string($db_connect, $_POST['eSDate']);
	$eDate = mysqli_real_escape_string($db_connect, $_POST['eEDate']);
	$time = mysqli_real_escape_string($db_connect, $_POST['eTime']);
	//$org_ID = mysqli_real_escape_string($db_connect, $)
	
	if(empty($eve_name) || empty($desc) || empty($category) || empty($venue) ||empty($date) || empty($time)) {
				
		if(empty($eve_name)) {
			echo "<script type='text/javascript'>alert('Event name field is empty.')</script>";
		}

		if(empty($desc)) {
			echo "<script type='text/javascript'>alert('Description field is empty.')</script>";
		}
		
		if(empty($category)) {
			echo "<script type='text/javascript'>alert('Category field is empty.')</script>";
		}

		if(empty($venue)) {
			echo "<script type='text/javascript'>alert('Venue field is empty.')</script>";
		}

		if(empty($stDate)) {
			echo "<script type='text/javascript'>alert('Start date field is empty.')</script>";
		}

		if(empty($eDate)) {
			echo "<script type='text/javascript'>alert('End date field is empty.')</script>";
		}

		if(empty($time)) {
			echo "<script type='text/javascript'>alert('Phone number is empty.')</script>";
		}
		
	}
	
		//insert data to database
		$dEve = mysqli_query($db_connect, "INSERT INTO eventqrsystem.event (eventName, description, category, venueCode, startDate, endDate, eTime, organizerID) VALUES ('$eve_name','$desc','$category','$venue','$stDate','$eDate','$time', (SELECT organizerID FROM organizer WHERE organizerID='$organizerID'))");

		if(!$dEve)
		{
			echo "Error in DB insert" . mysqli_error();
		}
		
		//display success message
		//echo "<script type='text/javascript'>alert('submitted successfully!')</script>"; // problem
		
		header("Location: org-manageevent.php");
		
		//echo "<script>window.open('/ad-sectionview.php?id='+$sID2 ,'_self')</script>";	
}
?>