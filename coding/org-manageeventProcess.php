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
//$picFirstname = $_SESSION['picFirstname'];
//$result = mysqli_query($db_connect, "SELECT * FROM event WHERE organizerID='$oID'");
//if (mysqli_num_rows($result) == 0) {
//	echo("<script>alert('No record found!')</script>");
//	echo("<script>window.location = 'org-dashboard.php';</script>");
//}

//else{
//	$res = mysqli_fetch_array($result);
	//$sCode = $res['subjCode'];
	//$sName = $res['subjName'];
//}

	/*if(isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM event WHERE eventID ='$valueToSearch'";
		$dEve = searchTable($query);
	}
	else
	{
		$query = "SELECT * FROM event where organizerID = '$organizerID'";
		$dEve = searchTable($query);
	}
	
	function searchTable($query)
	{
		$mysqli = mysqli_connect('localhost','root','', 'event_attendance_qr');
		$searchResult=mysqli_query($mysqli, $query);
		return $searchResult;
	}*/
?>	<!--$i = 1;
	//$dSubj = mysqli_query($mysqli, "SELECT subjCode, subjName, creditHours from subject");
	while($org = mysqli_fetch_array($dOrg)){ 
		//index
		echo "<tr>";
		echo "<td>".$i."</td>";
		
		//Organizer ID
		$orgID = $org['organizerID'];
		echo "<td>".$orgID."</td>";
		
		//Organizer Name
		$oName= $org['orgName'];
		echo "<td>".$oName."</a></td>";			
		//Person in Charge
		$pic = $org['picFirstname'];
		echo "<td>".$pic."</td>";	
		
		//Total Event
		$oTE = mysqli_query($db_connect, "SELECT * FROM event WHERE organizerID='$orgID'");
		$totEve= mysqli_num_rows($oTE);
		echo "<td>".$totEve."</td>";
		
		//Action
        echo "<td><a href=\"ad-editorganizer.php?org_name=$oName\"><i class='glyphicon glyphicon-edit'></i></a> | <a href=\"ad-deletesection.php?org_name=$oName\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='glyphicon glyphicon-trash'></i></a></td>";

		$i++;
	}
	//header('Location: ad-manageorganizer.php');-->
