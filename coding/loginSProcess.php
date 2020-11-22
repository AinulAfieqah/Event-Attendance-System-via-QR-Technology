<?php

include("db_connection.php");

$id = $_GET['id'];

if(isset($_POST['login']))
{
    $username=addslashes($_POST['username']);
    $password=addslashes($_POST['password']);
    $eventID=$_GET['id'];
    $decode = base64_decode($eventID);

//echo $username;
//echo $password;
//echo $eventID;
    $run=mysqli_query($db_connect,"SELECT * FROM  heasuratimran.students std WHERE std.studentno='$username' AND std.studenticno='$password'");
    $run1=mysqli_query($db_connect,"SELECT * FROM eventqrsystem.authentication aut WHERE aut.eventID='$decode'");

    if(mysqli_num_rows($run) > 0)
    {
        //$find = mysqli_query($db_connect, "SELECT * FROM admin WHERE username='$username'");
        $row = mysqli_fetch_assoc($run);
        $row2 = mysqli_fetch_assoc($run1);
        
        $studentID = $row['studentid'];
        $_SESSION['studentid']=$studentID;
        //echo $_SESSION['studentID'];

        //$getstudentid = $row['studentID'];
        $qrcode = $row2['qrCode'];

       $sql = "INSERT INTO eventqrsystem.attendance(qrCode, studentid) VALUES ('$qrcode','$studentID')";
       //echo $sql;
        $sqlInsert = mysqli_query($db_connect,$sql);
        if(!$sqlInsert)
        {
            echo "Fail in Insert";
        }

        echo "<script>window.open('std-success.php?id=$eventID','_self')</script>";
        
    }     
    else
    {
      echo "<script>alert('Username or password is incorrect!')</script>";
    }
}
?>