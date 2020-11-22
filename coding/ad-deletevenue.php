<?php
session_start();

if(!$_SESSION['adminID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

?>

<?php
//including the database connection file
include("db_connection.php");

//getting id of the data from url
$vCode = $_GET['id'];

//deleting the row from table
$del = mysqli_query($db_connect, "DELETE FROM eventqrsystem.venue WHERE venueCode='$vCode'");

if (!$del) {
    echo "Error deleting record:" . mysqli_error($db_connect);
} else {
    echo "Record deleted successfully";
}

//redirecting to the display page (index.php)
header("Location: ad-managevenue.php");
?>