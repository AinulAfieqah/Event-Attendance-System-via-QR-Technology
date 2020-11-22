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


if (isset($_POST['submit']))
{
//check fields

	$oldpassword = mysqli_real_escape_string($db_connect, $_POST['oldPassword']);
	$newpassword = mysqli_real_escape_string($db_connect, $_POST['newPassword']);
	$repeatnewpassword = mysqli_real_escape_string($db_connect, $_POST['repeatnewPassword']);

	$queryget = mysqli_query($db_connect, "SELECT ad.password FROM eventqrsystem.admin ad WHERE ad.adminID='$adminID'") or die("Query didn't work");
	$row = mysqli_fetch_assoc($queryget);

	$oldpassworddb = $row['password'];

		//check pass
	if ($oldpassword==$oldpassworddb)
	{
		
		//check twonew pass
		if ($newpassword==$repeatnewpassword)
		{
		//success
		//change pass in db
	
			 if (strlen($newpassword)>25||strlen($newpassword)<6) 
			{
			 echo "Password must be betwwen 6 & 25";
			}

			else
			{
		
				$querychange = mysqli_query($db_connect, "UPDATE eventqrsystem.admin SET password='$newpassword', firstTime='1' WHERE adminID='$adminID'");
				
				header("Location: ad-dashboard.php");
				//session_destroy();
				//die("Your pass has been changed");		
			}
		}
		
		else
				die("New Password don't match");
	}
	else
		die("Old Password doesn't match");		


}
?>