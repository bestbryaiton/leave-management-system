<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `users` where id = $id";

    $result=mysqli_query($conn,$sql);

    if($result){
       // echo "Deleted Successfully";
        // header('location:admindash.php?');
        echo "<script>alert('User Deleted Successfully!')</script>";
    }
    else{
        die(mysqli_error($conn));
    }
}
/*
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
header("Location:index.php");
?>
*/