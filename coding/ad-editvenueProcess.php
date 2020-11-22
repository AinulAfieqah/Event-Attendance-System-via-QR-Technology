<?php
session_start();

if(!$_SESSION['adminID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

// php code begin from here for edit 
// including the database connection file
include_once("db_connection.php");
$adminID = $_SESSION['adminID'];
$dAdmin = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin ad WHERE ad.adminID='$adminID'");

if(isset($_POST['update']))
{	
	$vCode = mysqli_real_escape_string($db_connect, $_POST['vCode']);
	$rName = mysqli_real_escape_string($db_connect, $_POST['rName']);
	$rSize = mysqli_real_escape_string($db_connect, $_POST['rSize']);
	$locate = mysqli_real_escape_string($db_connect, $_POST['locate']);
	$note = mysqli_real_escape_string($db_connect, $_POST['note']);
	$category = mysqli_real_escape_string($db_connect, $_POST['category']);
	
	// checking empty fields
	if(empty($rName) || empty($rSize) || empty($locate) || empty($note) || empty($category)) {	
			
		if(empty($rName)) {
			echo "<script type='text/javascript'>alert('Room name field is empty.')</script>";
		}
		
		if(empty($rSize)) {
			echo "<script type='text/javascript'>alert('Room size field is empty.')</script>";
		}

		if(empty($locate)) {
			echo "<script type='text/javascript'>alert('Location field is empty.')</script>";
		}
		
		if(empty($note)) {
			echo "<script type='text/javascript'>alert('Note field is empty.')</script>";
		}

		if(empty($category)) {
			echo "<script type='text/javascript'>alert('Category field is empty.')</script>";
		}
	} 
	// if all the fields are filled (not empty)
	else {	
		//updating the table
		/*$result = mysqli_query($db_connect, "UPDATE event_attendance_qr.venue SET roomName=UPPER('$rName'), roomSize='$rSize', location=UPPER('$locate'), note=UPPER('$note'), category=UPPER('$category'), adminID('$adminID') WHERE venueCode='$vCode'");*/
		
		$sql = "UPDATE eventqrsystem.venue SET roomName=UPPER('$rName'), roomSize='$rSize', location=UPPER('$locate'), note=UPPER('$note'), category=UPPER('$category') WHERE venueCode='$vCode'";

		//echo "$sql";
		$result = mysqli_query($db_connect, $sql);

		if(!$result)
		{
			echo "Error in DB insert";
		}
		//redirectig to the display page, ad-sectionview.php
		header("Location: ad-managevenue.php?page=1");
	}
}
?>


<?php
//getting id from url
$vCode = $_GET['id'];

//selecting data associated with this particular id
$venue = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.venue v WHERE v.venueCode='$vCode'");

while($res = mysqli_fetch_array($venue)){
	$rName = $res['roomName'];
	$rSize = $res['roomSize'];
	$locate = $res['location'];
	$note = $res['note'];
	$category = $res['category'];
}

?>