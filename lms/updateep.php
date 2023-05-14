<?php 
include 'config.php';
$id=$_GET['updateid'];
$sql="SELECT * FROM `users` WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$phone = $row['phone'];
$department = $row['department'];
$password = $row['password'];

if(isset($_POST['submit'])){

	$phone = $_POST['phone'];
	$department = $_POST['department'];
	$password = $_POST['password'];
    

    $sql="UPDATE `users` SET `id`='$id',
	`phone`='$phone',`department`='$department',`password`='$password' where id = $id";
    $con=mysqli_query($conn,"update users set password='$password' where lastname='$id'");
    $result=mysqli_query($conn,$sql);

    if($result){
		echo "<script>alert('User Updated Successfully..🤩')</script>";
		$phone = "";
		$department = "";
		$password = "";

    //     header('location:admindash.php?');
	
    }
    else{
		echo "<script>alert('Something Wrong Went.🥺')</script>";
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
			                <div >phone
			                	<input type="text"   name="phone" value=<?php echo $phone; ?>>
			                </div>
			                <div >department
				                <input type="text"  name="department" value=<?php echo $department; ?>>
			                </div>
			                <div >password
			                	<input type="password"  name="password" value=<?php echo $password; ?>>
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