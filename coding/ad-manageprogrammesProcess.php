<?php
//including the database connection file
include_once("db_connection.php");

session_start();

if(!$_SESSION['adminID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

$adminID = $_SESSION['adminID'];
$dAdmin = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin ad WHERE ad.adminID='$adminID'");

	/*if(isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM heaprogrammes WHERE programmecode ='$valueToSearch'";
		$prog = searchTable($query);
	}
	else
	{
		$query = "SELECT * FROM programmes";
		$prog = searchTable($query);
	}
	
	function searchTable($query)
	{
		$mysqli = mysqli_connect('localhost','root','', 'heasuratimran');
		$searchResult=mysqli_query($mysqli, $query);
		return $searchResult;
	}*/
?>	