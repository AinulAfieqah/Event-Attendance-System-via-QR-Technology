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
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE organizerID='$organizerID'"); // using mysqli_query instead

if(isset($_POST['update']))
{	
	$organizerID = mysqli_real_escape_string($db_connect, $_POST['organizerID']);
	$orgName = mysqli_real_escape_string($db_connect, $_POST['orgName']);
	$picFirstname = mysqli_real_escape_string($db_connect, $_POST['picFirstname']);
	$picLastname = mysqli_real_escape_string($db_connect, $_POST['picLastname']);
	$staffID = mysqli_real_escape_string($db_connect, $_POST['staffID']);
	$picPhone = mysqli_real_escape_string($db_connect, $_POST['picPhone']);	
	$picEmail = mysqli_real_escape_string($db_connect, $_POST['picEmail']);

	// checking empty fields
	if(empty($picFirstname) || empty($picLastname) || empty($staffID) || empty($picPhone) || empty($picEmail)) {	
			
		if(empty($picFirstname)) {
			echo "<script type='text/javascript'>alert('PIC firstname field is empty.')</script>";
		}
		
		if(empty($picLastname)) {
			echo "<script type='text/javascript'>alert('PIC lastname field is empty.')</script>";
		}

		if(empty($staffID)) {
			echo "<script type='text/javascript'>alert('Staff ID field is empty.')</script>";
		}

		if(empty($picPhone)) {
			echo "<script type='text/javascript'>alert('PIC phone field is empty.')</script>";
		}

		if(empty($picEmail)) {
			echo "<script type='text/javascript'>alert('PIC email field is empty.')</script>";
		}
	} 
	// if all the fields are filled (not empty)
	else {	
		//updating the table
		$sql = "UPDATE eventqrsystem.organizer SET picFirstname=UPPER('$picFirstname'), picLastname=UPPER('$picLastname'), staffID='$staffID', picPhone='$picPhone', picEmail='$picEmail' WHERE organizerID='$organizerID'";
		$result = mysqli_query($db_connect, $sql);

		//if cannot connect to database
		if(!$result)
		{
			echo "Error in DB insert";
		}
		
		//redirectig to the display page, ad-sectionview.php
		header("Location: org-dashboard.php");
	}
}
?>


<?php
//getting id from url
$organizerID = $_GET['id'];

//selecting data associated with this particular id
$red = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'");

while($res = mysqli_fetch_array($red)){
	//$organizerID = $res['organizerID'];
	$orgName = $res['orgName'];
	$picFn = $res['picFirstname'];
	$picLn= $res['picLastname'];
	$sID = $res['staffID'];
	$picPhone = $res['picPhone'];
	$picEmail = $res['picEmail'];
}

?>