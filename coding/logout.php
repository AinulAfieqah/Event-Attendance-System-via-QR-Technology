<?php
session_start();

if($_SESSION['adminID'])
{
	unset($_SESSION['adminID']);
	session_destroy();
    header("Location: index.php");
}

else if($_SESSION['organizerID'])
{
	unset($_SESSION['organizerID']);
	session_destroy();
    header("Location: index.php");
}

else if($_SESSION['studentid'])
{
	unset($_SESSION['studentid']);
	session_destroy();
    header("Location: index.php");
}

else{
	echo "Unsuccessful!";
}
//session_destroy();

//kembali/redirect ke halaman login.php
//header('location:index.php');
?>