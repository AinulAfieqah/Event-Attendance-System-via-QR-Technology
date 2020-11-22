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


if (isset($_POST['submit']))
{
//check fields

	$oldpassword = mysqli_real_escape_string($db_connect, $_POST['oldPassword']);
	$newpassword = mysqli_real_escape_string($db_connect, $_POST['newPassword']);
	$repeatnewpassword = mysqli_real_escape_string($db_connect, $_POST['repeatnewPassword']);

	$queryget = mysqli_query($db_connect, "SELECT org.password FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'") or die("Query didn't work");
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
		
				$querychange = mysqli_query($db_connect, "UPDATE eventqrsystem.organizer SET password='$newpassword', firstTime='1' WHERE username='$username'");
				
				header("Location: org-dashboard.php");
				//session_destroy();
				//die("Your pass has been changed");		
			}
		}
		
		else
				die("New Pass don't match");
	}
	else
		die("Old Pass doesn't match");		


}
?>