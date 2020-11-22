<?php
session_start();

if(!$_SESSION['organizerID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

?>

<?php
//including the database connection file
include("db_connection.php");

//getting id of the data from url
$eID = $_GET['id'];

//deleting the row from table
$del = mysqli_query($db_connect, "DELETE FROM eventqrsystem.event WHERE eventID='$eID'");

if (!$del){
	echo "Record deleted successfully";
}

else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}

//redirecting to the display page (index.php)
header("Location: ad-manageevent.php");
?>