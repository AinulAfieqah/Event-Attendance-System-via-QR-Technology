<?php
session_start();

if(!$_SESSION['studentid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include("db_connection.php");
$studentID = $_SESSION['studentid'];
$id=$_GET['id'];

$query = "SELECT e.eventName, e.startDate, org.orgName, v.roomName, s.studentname, e.eventID, s.studenticno FROM heasuratimran.students s JOIN eventqrsystem.attendance att on s.studentid=att.studentid JOIN eventqrsystem.authentication aut on att.qrCode=aut.qrCode JOIN eventqrsystem.event e on aut.eventID=e.eventID JOIN eventqrsystem.organizer org on e.organizerID=org.organizerID JOIN eventqrsystem.venue v on e.venueCode=v.venueCode WHERE s.studentid='$studentID' AND e.eventID='$id'";

if(!$query){
	echo "Cannot retrieve db";
}

$list = mysqli_query($db_connect, $query);

//get data from database 	
	while($res=mysqli_fetch_array($list)){
		$sName = $res['studentname'];
		$sIC = $res['studenticno'];
    	$eName = $res['eventName'];
		$oName= $res['orgName'];
		$eVenue = $res['roomName'];
		$eSDate = $res['startDate'];
    }

require('fpdf182/fpdf.php');

class PDF extends FPDF{
	function Header(){
		// Logo
    	$this->Image('img/uitmlogo.png',10,10,75,30);
    	$this->Image('img/grey.png',140,0,75,50);
    	// Arial bold 20
		//$this->SetFont('Arial', 'B', 20);
		// Line break
    	$this->Ln(30);
	}

	// Page footer
	function Footer(){
    	// Position at 1.5 cm from bottom
    	//$this->SetY(-15);

    	//$this->Image('img/signPR.png',10,215,60,30);

    	$this->Image('img/footer.png',0,267,210,30);
    	// Arial italic 8
    	//$this->SetFont('Arial','I',8);
    	// Page number
    	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AddFont('Playfair Display', '', 'PlayfairDisplay-Regular.php');
$pdf->AddPage();
$pdf->SetFont('Playfair Display','',36);
//$pdf->Image('img/uitmlogo.png');
//$pdf->PrintChapter(1, 'CERT', 'sijil.docx');
//$pdf->Cell(40,10,'Hello World!');
$pdf->Cell(50,40,'SIJIL PENGHARGAAN');
$pdf->Ln(30);
$pdf->SetFont('Playfair Display','',11);
$pdf->Cell(15,10,'Dengan ini disahkan bahawa');
$pdf->Ln();
$pdf->SetFont('Playfair Display','',15);
//$ain='ainul';
$pdf->Cell(15,10,$sName.' ('.$sIC.')');
$pdf->Ln(12);
$pdf->SetFont('Playfair Display','',11);
$pdf->Cell(15,10,'Telah memberi khidmat dan menjayakan');
$pdf->Ln();
$pdf->SetFont('Playfair Display','',15);
//$prog='prgram A';
$pdf->Cell(15,10,$eName);
$pdf->Ln(12);
$pdf->SetFont('Playfair Display','',11);
$pdf->Cell(15,10,'Sebagai');
$pdf->Ln();
$pdf->SetFont('Playfair Display','',15);
$psr='Peserta';
$pdf->Cell(15,10,$psr);
$pdf->Ln(12);
$pdf->SetFont('Playfair Display','',11);
$pdf->Cell(15,10,'Anjuran');
$pdf->Ln();
$pdf->SetFont('Playfair Display','',15);
//$org='hep';
$pdf->Cell(15,10,$oName);
$pdf->Ln(12);
$pdf->SetFont('Playfair Display','',11);
$pdf->Cell(15,10,'Pada');
$pdf->Ln();
$pdf->SetFont('Playfair Display','',15);
//$date='tarikh';
$pdf->Cell(5,10,$eSDate);
$pdf->Ln(12);
$pdf->SetFont('Playfair Display','',11);
$pdf->Cell(5,10,'Di');
$pdf->Ln();
$pdf->SetFont('Playfair Display','',15);
//$venue='tempat';
$pdf->Cell(5,10,$eVenue);
$pdf->Ln(12);
$pdf->Image('img/signPR.png',10,210,60,30);
$pdf->Image('img/logoCS.png',160,220,40,40);
$pdf->Ln(40);
$pdf->SetFont('Playfair Display','',12);
$pdf->Cell(5,10,'Ts. Dr. Khairi Khalid');
$pdf->Ln(7);
$pdf->Cell(5,10,'Penolong Rektor');
$pdf->Ln(7);
$pdf->Cell(5,10,'Universiti Teknologi MARA Pahang Kampus Raub');

$pdf->Output();

?>