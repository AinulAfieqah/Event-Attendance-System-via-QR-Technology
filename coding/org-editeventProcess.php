<?php
session_start();

if(!$_SESSION['organizerID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

// php code begin from here for edit 
// including the database connection file
include_once("db_connection.php");
$organizerID = $_SESSION['organizerID'];
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'");
//$eID = $_SESSION['eID'];

if(isset($_POST['update']))
{	
	$eventID = mysqli_real_escape_string($db_connect, $_POST['eventID']);
	$eventName = mysqli_real_escape_string($db_connect, $_POST['eName']);
	$eventDesc = mysqli_real_escape_string($db_connect, $_POST['eDesc']);
	$eventCategory = mysqli_real_escape_string($db_connect, $_POST['eCat']);
	$eventVenue = mysqli_real_escape_string($db_connect, $_POST['eVenue']);
	$eStartDate = mysqli_real_escape_string($db_connect, $_POST['eSDate']);
	$eEndDate = mysqli_real_escape_string($db_connect, $_POST['eEDate']);	
	$eventTime = mysqli_real_escape_string($db_connect, $_POST['eTime']);
	$organizerID = mysqli_real_escape_string($db_connect, $_POST['organizerID']);
	
	// checking empty fields
	if(empty($eventName) || empty($eventDesc) || empty($eventCategory) || empty($eventVenue) || empty($eStartDate) || empty($eEndDate) || empty($eventTime)) {	
		
		if(empty($eventDesc)) {
			echo "<script type='text/javascript'>alert('Description field is empty.')</script>";
		}

		if(empty($eventCategory)) {
			echo "<script type='text/javascript'>alert('Category field is empty.')</script>";
		}

		if(empty($eventVenue)) {
			echo "<script type='text/javascript'>alert('Venue field is empty.')</script>";
		}

		if(empty($eStartDate)) {
			echo "<script type='text/javascript'>alert('Start date field is empty.')</script>";
		}

		if(empty($eEndDate)) {
			echo "<script type='text/javascript'>alert('End date field is empty.')</script>";
		}

		if(empty($eventTime)) {
			echo "<script type='text/javascript'>alert('Time field is empty.')</script>";
		}
	} 
	// if all the fields are filled (not empty)
	else {	

		/*$venue = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event eve JOIN eventqrsystem.venue ven ON eve.venueCode=ven.venueCode WHERE eve.roomName='$eventVenue'");

		if(!$venue)
        {
            echo "Fail to Open DB";
        }

		while($res = mysqli_fetch_array($venue)){
			$Venue = $res['venueCode'];
		}*/

		//$Venue = $_GET['eventVenue'];

		//updating the table
		$result = mysqli_query($db_connect, "UPDATE eventqrsystem.event SET eventName='$eventName', description='$eventDesc', category='$eventCategory', venueCode='$eventVenue', startDate='$eStartDate', endDate='$eEndDate', eTime='$eventTime' WHERE organizerID='$organizerID' AND eventID='$eventID'");
	
		if(!$result)
        {
            echo "Fail to Update DB";
        }
		
		//redirecting to the display page, ad-manageevent.php
		header("Location: org-manageevent.php");
	}
}
?>


<?php
//getting id from url
$eventID = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db_connect, "SELECT eve.eventName, eve.description, eve.category, ven.venueCode, eve.startDate, eve.endDate, eve.eTime, org.organizerID FROM eventqrsystem.event eve JOIN eventqrsystem.venue ven ON eve.venueCode=ven.venueCode JOIN eventqrsystem.organizer org ON eve.organizerID=org.organizerID WHERE eve.eventID='$eventID'");

while($res = mysqli_fetch_array($result)){
	$eName = $res['eventName'];
	$eDesc= $res['description'];
	$eCat = $res['category'];
	$eVenue = $res['venueCode'];
	$eSDate = $res['startDate'];
	$eEDate = $res['endDate'];
	$eTime = $res['eTime'];
	$organizerID = $res['organizerID'];
}

?>