<?php 
session_start();
if(!$_SESSION['organizerID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include_once("db_connection.php");
$event_ID=$_GET['id'];
$organizerID = $_SESSION['organizerID'];
$dEve= mysqli_query($db_connect, "SELECT * FROM eventqrsystem.event eve WHERE eve.eventID='$event_ID'");
$dOrg = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.organizer org WHERE org.organizerID='$organizerID'");

if(isset($event_ID) !=''){
    //support shipment data
    //$event_ID=$_GET['eventID'];
    //$category = $_GET['category'];
    //$date = $_GET['date'];

    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    // include file qrlib.php
    include "phpqrcode/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
   //$filename = $PNG_TEMP_DIR.$event_ID'.png';

    #Input parameter
    $content = $event_ID;
    $private = base64_encode($content);
    $fileName = $PNG_TEMP_DIR.$event_ID.".png";
    $link = "http://csraub.uitm.edu.my/uitmevent/loginS.php?id=$private";
    $quality = 'H'; //Have 4 choices, L (Low), M(Medium), Q(Good), H(High)
    $size = 10; //Range 1 smallest - 10 largest
    $padding = 2;


    QRCode::png($link, $fileName, $quality, $size, $padding);

    $dAut = mysqli_query($db_connect, "INSERT INTO authentication (qrImage, eventID) VALUES ('$fileName', '$content') ");

    if(!$dAut)
        {
            echo "Error in DB insert" . mysqli_error();
        }
}
else{
    //header('location:org-manageevent.php');

}

?>