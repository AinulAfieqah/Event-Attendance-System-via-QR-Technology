<?php
session_start();

if(!$_SESSION['adminID'])
{
    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include_once("db_connection.php");

$adminID = $_SESSION['adminID'];
$dAdmin = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin ad WHERE ad.adminID='$adminID'");

if(isset($_POST['Submit'])) {	

	$roomName = mysqli_real_escape_string($db_connect, $_POST['rName']);
	$roomSize = mysqli_real_escape_string($db_connect, $_POST['rSize']);
	$location = mysqli_real_escape_string($db_connect, $_POST['locate']);
	$note = mysqli_real_escape_string($db_connect, $_POST['note']);
	$category = mysqli_real_escape_string($db_connect, $_POST['category']);
	
	if(empty($roomName) || empty($roomSize) || empty($location) || empty($note) || empty($category)) {		
		if(empty($roomName)) {
			echo "<script type='text/javascript'>alert('Room name field is empty.')</script>";
		}
		
		if(empty($roomSize)) {
			echo "<script type='text/javascript'>alert('Room size field is empty.')</script>";
		}

		if(empty($location)) {
			echo "<script type='text/javascript'>alert('Location field is empty.')</script>";
		}

		if(empty($note)) {
			echo "<script type='text/javascript'>alert(Note field is empty.')</script>";
		}

		if(empty($category)) {
			echo "<script type='text/javascript'>alert('Category field is empty.')</script>";
		}
	}
	
		//insert data to database
		$venue = mysqli_query($db_connect, "INSERT INTO eventqrsystem.venue (roomName, roomSize, location, note, category, adminID) VALUES (UPPER('$roomName'), '$roomSize', UPPER('$location'), UPPER('$note'), UPPER('$category'), $adminID)");

		if(!$venue)
		{
			echo "Error in DB insert" . mysql_error();
		}
		
		header("Location: ad-managevenue.php?page=1");
		
}
?>