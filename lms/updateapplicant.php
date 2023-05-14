<?php
 include("config.php");
//  $email=$_GET['id'];
//  $sql="SELECT * FROM `leaveform` WHERE email = '$email'";
//  $result=mysqli_query($conn,$sql);
// $row=mysqli_fetch_assoc($result);
// $approval = $row['approval'];
  if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM leaveform WHERE email = '$id' ";
    $result = mysqli_query($conn,$sql);
  
    if($result == true){
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
        }
    }
}
if(isset($_POST['apply'])){

	$approval = $_POST['approval'];
	
    $sql="UPDATE `leaveform` SET 
	`approval`='$approval' where email = '$id'";
    $con=mysqli_query($conn,$sql);
    $result=mysqli_query($conn,$sql);

    if($result){
		echo "<script>alert('User Updated Successfully..🤩')</script>";
		$approval = "";
		 header('location:veiw applicants.php?');
	
    }
    else{
		echo "<script>alert('Something Wrong Went.🥺')</script>";
        die(mysqli_error($conn));
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leave Application</title>

        <link rel="stylesheet" href="lore.css">
    </head>
    <body>
        <div class="container">
    
           <form action="" method="POST">
                            <?php 
        if(isset($_SESSION['status']))
            {
        ?>
         <div > 
         <strong>Congratulations!</strong> <?php echo $_SESSION['status'];?></div>
        <?php
         unset($_SESSION['status']);
        }
        ?>
                    
    <input type="text" name="approval" value="WAITING FOR APPROVAL"><br>
    <div >
    <button type="submit" name="apply" class="btn btn-primary" >RESPOND</button>
    </div>
    </form>

        </div>
        
    
    </body>
    </html>

  }