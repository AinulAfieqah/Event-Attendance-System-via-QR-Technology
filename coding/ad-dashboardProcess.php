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
$dEve= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event");
$dOrg= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer");
$dStud= mysqli_query($db_connect, "SELECT * FROM heasuratimran.students");
$dProg= mysqli_query($db_connect, "SELECT * FROM heasuratimran.programmes");
$dVen= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.venue");
?>