<?php 
include 'config.php';
$lastname=$_GET['lastname'];
$sql="SELECT * FROM `leaveform` WHERE lastname=$lastname";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$approval = $row['approval'];

if(isset($_POST['submit'])){

	$approval = $_POST['approval'];
    

    $sql="UPDATE `leaveform` SET `lastname`='$lastname'
	,`approval`='$approval' where lastname = $lastname";

    $result=mysqli_query($conn,$sql);

    if($result){
       // echo "Deleted Successfully";
	   
        header('location:admindash.php?');
		echo "<script>alert('User Updated Successfully!')</script>";
    }
    else{
        die(mysqli_error($conn));
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--<link rel="stylesheet" href="lore.css">-->
    <link rel="stylesheet" href="tarifa.css"/>

	<title >Update Form</title>
</head>
<h4 align="center"><a href="">Employee Leave Management System </a></h4>
        <div class="container"><center>
	        <div class="container">
		        <form action="" method="POST" >
		                <h2 style="padding-bottom:10px;padding-left:40px;">UPDATE FORM</h2>
			                <div >approval
			                	<input type="text"  name="approval" value=<?php echo $approval; ?>>
                            </div>
                            <div>
			                	<button type="submit" name="submit" style="margin-left: 50px; background-color: #82c1d1;">Update</button>
			                </div>
			
                </form>
	        </div>
        </center>
    </div> 
</body>
</html>