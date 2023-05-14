<?php
session_start();
$con = mysqli_connect("localhost","root","","lams_system");

if(isset($_POST['apply']))
{
    
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $leavetype = $_POST['leavetype'];
    $leavecatergory = $_POST['leavecatergory'];
    $startdate = date ('Y-m-d', strtotime($_POST['startdate']));
    $enddate = date ('Y-m-d', strtotime($_POST['enddate']));
    $fromwhere = $_POST['fromwhere'];
    $towhere = $_POST['towhere'];
    $description = $_POST['description'];
    $file = $_POST['file'];
    $approval = $_POST['approval'];

    $query = "INSERT INTO leaveform ( lastname,email,leavetype, leavecatergory, startdate , enddate, fromwhere, towhere, description, file, approval) VALUES ('$lastname','$email','$leavetype','$leavecatergory', '$startdate', '$enddate', '$fromwhere', '$towhere', '$description', '$file', '$approval')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {   echo "<script>alert('Application Received Successfully.🤩')</script>";
       // $_SESSION['status'] = "Application Received";
        header("Location: leaveform.php");
    }
    else
    {
        echo "<script>alert('Appliccation Failed.🥺')</script>";
        //$_SESSION['status'] = "Appliccation Failed";
        header("Location: leaveform.php");
    }
}
?>
