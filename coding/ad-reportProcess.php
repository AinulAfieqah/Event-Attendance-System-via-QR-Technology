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

//calculate number of events based on organization
	$hea = $hep = 0;

	// Retrieve events organized
	//$dEveOrg = mysqli_query($db_connect, "SELECT event_attendance_qr.organizer.organizerID FROM event_attendance_qr.organizer, event_attendance_qr.event WHERE event_attendance_qr.organizer.organizerID=event_attendance_qr.event.organizerID");

	$dEveOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org JOIN eventqrsystem.event e ON org.organizerID=e.organizerID");
	if(!$dEveOrg)
        {
            echo "Fail to Open Eve Org";
        }

	while($reg = mysqli_fetch_array($dEveOrg)){
		$oID = $reg['orgName'];
				
		if($oID == 'HEA UITM RAUB'){
			$hea++;
		}
		
		else {
			$hep++;
		}
	}

//calculate total events attended based on programmecode
	$am110 = $bm119 = $bm111 = $cs110 = $cs111 = $ba111 = $ba119 = 0;

	// Retrieve events organized
	$dPCode = mysqli_query($db_connect, "SELECT p.programmeid FROM heasuratimran.programmes p JOIN heasuratimran.students s ON p.programmeid=s.programmeid JOIN eventqrsystem.attendance att ON att.studentid=s.studentid JOIN eventqrsystem.authentication aut ON att.qrCode=aut.qrCode JOIN eventqrsystem.event e ON aut.eventID=e.eventID");
	while($reg = mysqli_fetch_array($dPCode)){
		$pCode = $reg['programmeid'];
				
		if($pCode == 1){
			$am110++;
		}
		else if($pCode == 2){
			$bm119++;
		}
		else if($pCode == 3){
			$bm111++;
		}
		else if($pCode == 5){
			$cs111++;
		}
		else if($pCode == 4){
			$cs110++;
		}
		else if($pCode == 6){
			$ba111++;
		}
		else if($pCode == 7){
			$ba119++;
		}
	}

	//calculate total events attended based on programmecode
	$awam = $bank = $niaga = $cs = $stat = 0;

	// Retrieve events organized
	$dPName = mysqli_query($db_connect, "SELECT p.programmename FROM heasuratimran.programmes p JOIN heasuratimran.students s ON p.programmeid=s.programmeid JOIN eventqrsystem.attendance att ON att.studentid=s.studentid JOIN eventqrsystem.authentication aut ON att.qrCode=aut.qrCode JOIN eventqrsystem.event e ON aut.eventID=e.eventID");
	while($reg = mysqli_fetch_array($dPName)){
		$pName = $reg['programmename'];
				
		if($pName == 'DIPLOMA PENTADBIRAN AWAM'){
			$awam++;
		}
		else if($pName== 'DIPLOMA PENGAJIAN PERBANKAN'){
			$bank++;
		}
		else if($pName == 'DIPLOMA PENGAJIAN PERNIAGAAN'){
			$niaga++;
		}
		else if($pName == 'DIPLOMA SAINS KOMPUTER'){
			$cs++;
		}
		else if($pName == 'DIPLOMA STATISTIK'){
			$stat++;
		}
	}

$sql = "SELECT e.category FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID";

$result = mysqli_query($db_connect, $sql);
if(!$result)
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

	while($try = mysqli_fetch_array($result)){

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