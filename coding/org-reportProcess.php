<?php
//including the database connection file
include_once("db_connection.php");

session_start();

if(!$_SESSION['organizerID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

$organizerID = $_SESSION['organizerID'];
//$oID = $_SESSION['organizerID'];
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'");

$orgEve = mysqli_query($db_connect, "SELECT e.category FROM eventqrsystem.organizer org JOIN eventqrsystem.event e on org.organizerID = e.organizerID WHERE org.organizerID='$organizerID'");
if(!$orgEve)
    {
        echo "Fail to Open";
    }
$academic=0; 
$award=0;
$career=0;
$cultural=0;
$entre=0;
$innovation=0;
$leader=0;
$sport=0;
$volunteer=0;

	while($try = mysqli_fetch_array($orgEve)){

	$cat = $try['category'];
		//echo $cat;

		if($cat == 'Academic'){
			$academic++;
			//echo $academic;
		}
		else if($cat == 'Award'){
			$award++;
			//echo $award;
		}
		else if($cat == 'Career'){
			$career++;
			//echo $career;
		}
		else if($cat == 'Cultural'){
			$cultural++;
			//echo $cultural;
		}
		else if($cat == 'Entrepreneurship'){
			$entre++;
			//echo $entre;
		}
		else if($cat == 'Innovation'){
			$innovation++;
			//echo $innovation;
		}
		else if($cat == 'Innovation'){
			$leader++;
			//echo $leader;
		}
		else if($cat == 'Sport'){
			$sport++;
			//echo $sport;
		}
		else{
			$volunteer++;
			//echo $volunteer;
		}
	}