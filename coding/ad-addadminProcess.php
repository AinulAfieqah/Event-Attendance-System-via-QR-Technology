<?php
session_start();

if(!$_SESSION['adminID'])
{
    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

//including the database connection file
include_once("db_connection.php");

$adminID = $_SESSION['adminID'];

if(isset($_POST['Submit'])) {	

	$ad_name = mysqli_real_escape_string($db_connect, $_POST['ad_name']);
	$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
	$email = mysqli_real_escape_string($db_connect, $_POST['email']);
	
	if(empty($ad_name) || empty($phone) || empty($email)) {
				
		if(empty($ad_name)) {
			echo "<script type='text/javascript'>alert('Admin name field is empty.')</script>";
		}
		
		if(empty($phone)) {
			echo "<script type='text/javascript'>alert('Admin phone number is empty.')</script>";
		}
		
		if(empty($email)) {
			echo "<script type='text/javascript'>alert('Admin email address is empty.')</script>";
		}
	}

	//Generate username for admin
	$username = 'admin'.$phone[0-3].$phone[0-6].$phone[9];

	//Generate random password for admin
	function random_password( $length = 8, $characters = true, $numbers = true, $case_sensitive = true, $hash = true ) {

    	$password = '';

    	if($characters)
    	{
        	$charLength = $length;
        	if($numbers) $charLength-=2;
        	if($case_sensitive) $charLength-=2;
        	if($hash) $charLength-=2;
        	$chars = "abcdefghijklmnopqrstuvwxyz";
        	$password.= substr( str_shuffle( $chars ), 0, $charLength );
    	}

    	if($numbers)
    	{
        	$numbersLength = $length;
        	if($characters) $numbersLength-=2;
        	if($case_sensitive) $numbersLength-=2;
        	if($hash) $numbersLength-=2;
        	$chars = "0123456789";
        	$password.= substr( str_shuffle( $chars ), 0, $numbersLength );
    	}

    	if($case_sensitive)
    	{
        	$UpperCaseLength = $length;
        	if($characters) $UpperCaseLength-=2;
        	if($numbers) $UpperCaseLength-=2;
        	if($hash) $UpperCaseLength-=2;
        	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        	$password.= substr( str_shuffle( $chars ), 0, $UpperCaseLength );
    	}

    	if($hash)
    	{
        	$hashLength = $length;
        	if($characters) $hashLength-=2;
        	if($numbers) $hashLength-=2;
        	if($case_sensitive) $hashLength-=2;
        	$chars = "!@#$%^&*()_-=+;:,.?";
        	$password.= substr( str_shuffle( $chars ), 0, $hashLength );
    	}

    	$password = str_shuffle( $password );
    	return $password;
	}
	$password = random_password(8);
	
	//insert data to database
	$dAd = mysqli_query($db_connect, "INSERT INTO eventqrsystem.admin(adminName, username, password, adPhone, adEmail, firstTime) VALUES (UPPER('$ad_name'),'$username','$password','$phone','$email', 0)");

	if(!$dAd){
		echo "Error in DB insert";
	}	
}
?>