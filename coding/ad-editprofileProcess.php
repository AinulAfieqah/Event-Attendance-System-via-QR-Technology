<?php
session_start();

if(!$_SESSION['adminID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

// including the database connection file
include_once("db_connection.php");
$adminID = $_SESSION['adminID'];
$dAdmin = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin ad WHERE ad.adminID='$adminID'");

if(isset($_POST['update']))
{	
	$adID = mysqli_real_escape_string($db_connect, $_POST['adID']);
	$adName = mysqli_real_escape_string($db_connect, $_POST['adName']);
	$adPhone = mysqli_real_escape_string($db_connect, $_POST['adPhone']);	
	$adEmail = mysqli_real_escape_string($db_connect, $_POST['adEmail']);

	// checking empty fields
	if(empty($adName) || empty($adPhone) || empty($adEmail)) {	
			
		if(empty($adName)) {
			echo "<script type='text/javascript'>alert('Admin name field is empty.')</script>";
		}

		if(empty($adPhone)) {
			echo "<script type='text/javascript'>alert('Admin phone field is empty.')</script>";
		}

		if(empty($adEmail)) {
			echo "<script type='text/javascript'>alert('Admin email field is empty.')</script>";
		}
	} 
	// if all the fields are filled (not empty)
	else {	
		//updating the table
		$sql = "UPDATE eventqrsystem.admin SET adminName=UPPER('$adName'), adPhone='$adPhone', adEmail='$adEmail' WHERE adminID='$adID'";
		$result = mysqli_query($db_connect, $sql);

		//if cannot connect to database
		if(!$result)
		{
			echo "Error in DB insert";
		}
		
		//redirectig to the display page
		header("Location: ad-dashboard.php");
	}
}
?>


<?php
//getting id from url
$adID = $_GET['id'];

//selecting data associated with this particular id
$red = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin ad WHERE ad.adminID='$adID'");

while($res = mysqli_fetch_array($red)){
	//$organizerID = $res['organizerID'];
	$adName = $res['adminName'];
	$adPhone = $res['adPhone'];
	$adEmail = $res['adEmail'];
}

?>