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
if(isset($_POST['Submit'])) {	

	$org_name = mysqli_real_escape_string($db_connect, $_POST['org_name']);
	$org_fname = mysqli_real_escape_string($db_connect, $_POST['org_fname']);
	$org_lname = mysqli_real_escape_string($db_connect, $_POST['org_lname']);
	$staffid = mysqli_real_escape_string($db_connect, $_POST['staffid']);
	$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
	$email = mysqli_real_escape_string($db_connect, $_POST['email']);
	
	if(empty($org_name) || empty($org_lname) || empty($org_fname) || empty($staffid) || empty($phone) || empty($email)) {
				
		if(empty($org_name)) {
			echo "<script type='text/javascript'>alert('Organizer name field is empty.')</script>";
		}
		
		if(empty($org_lname)) {
			echo "<script type='text/javascript'>alert('Person-In-Charge lastname name is empty.')</script>";
		// if all the fields are filled (not empty)
		}
		
		if(empty($org_fname)) {
			echo "<script type='text/javascript'>alert('Person-In-Charge firstname name is empty.')</script>";
		// if all the fields are filled (not empty)
		}
		
		if(empty($staffid)) {
			echo "<script type='text/javascript'>alert('Staff ID field is empty.')</script>";
		}
		
		if(empty($phone)) {
			echo "<script type='text/javascript'>alert('Person-In-Charge phone number is empty.')</script>";
		// if all the fields are filled (not empty)
		}
		
		if(empty($email)) {
			echo "<script type='text/javascript'>alert('Person-In-Charge email address is empty.')</script>";
		// if all the fields are filled (not empty)
		}
	}
	
		//insert data to database
		$dOrg = mysqli_query($db_connect, "INSERT INTO eventqrsystem.organizer(orgName, picFirstname, picLastname, username, password, staffID, picPhone, picEmail, adminID) VALUES (UPPER('$org_name'),UPPER('$org_fname'),UPPER('$org_lname'),'$staffid','$staffid','$staffid','$phone','$email', '$adminID')");

		if(!$dOrg)
		{
			echo "Error in DB insert";
		}
		
		//display success message
		//echo "<script type='text/javascript'>alert('submitted successfully!')</script>"; // problem
		
		//header("Location: ad-manageorganizer.php");
		
		//echo "<script>window.open('/ad-sectionview.php?id='+$sID2 ,'_self')</script>";	
}
?>