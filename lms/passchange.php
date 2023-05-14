<?php 

session_start();

include("config.php");
if(isset($_POST['Submit']))
{
 $oldpass=md5($_POST['opwd']);
 $useremail=$_SESSION['lastname'];
 $newpassword=md5($_POST['npwd']);
$sql=mysqli_query($conn,"SELECT password FROM users where password='$oldpass' && lastname='$useremail'");
$num=mysqli_num_rows($sql);

if($num>0)
{
  
 $con=mysqli_query($conn,"update users set password='$newpassword' where lastname='$useremail'");
 echo "<script>alert('Password Changed Successfully🤩  !!')</script>";
 header("Location: logout.php");
}
else
{
 
 echo "<script>alert('Old Password not match🥺 !!')</script>";
}
}
?>


<!--source of editing the password of a person-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="side.css">
    <title>Welcome</title>


    <script type="text/javascript">
function valid()
{
    
if(document.chngpwd.opwd.value=="")
{
  
alert("Old Password Field is Empty🥺 !!");
document.chngpwd.opwd.focus();
document.chngpwd.opwd.style.border=" red solid 2px";
return false;
}
else{
  document.chngpwd.opwd.style.border=" green solid 2px";
    }
     
if(document.chngpwd.npwd.value=="")
{
alert("New Password Field is Empty🥺 !!");
document.chngpwd.npwd.focus();
document.chngpwd.npwd.style.border=" red solid 2px";
return false;
}
else{
  document.chngpwd.npwd.style.border=" green solid 2px";
    }

if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Field is Empty🥺 !!");
document.chngpwd.cpwd.focus();
document.chngpwd.cpwd.style.border=" red solid 2px";
return false;
}
else{
  document.chngpwd.cpwd.style.border=" green solid 2px";
    }

if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match🥺  !!");
document.chngpwd.cpwd.focus();
document.chngpwd.npwd.style.border=" red solid 2px";
return false;
}
else{
  document.chngpwd.npwd.style.border=" green solid 2px";
    }

return true;
}
</script>
</head>


<body>
    <!-- <?php echo "<h1>Welcome " . $_SESSION['lastname'] . "</h1>"; ?> -->
    <input type="checkbox" id="check">
    <label for="check">
      <i id="btn">☰</i>
      <i id="cancel">☰</i>
    </label>
    <div class="sidebar" style="margin-top: 40px; height:auto;">
      <header style="text-align: center; height: 11.2vh;"><img src="AVATAR.png" alt="Avatar" style="width:20%;">
         <?php echo "<h>" . $_SESSION['lastname'] . "</h>"; ?> 
        </header>
    
        <a href="my.php">
          
          <span>MY BOARD</span>
        </a>
        <a href="leaveform.php">
          
          <span>APPLY LEAVE</span>
        </a>
        <a href="feedback.php">
           
          <span>FEEDBACK</span>
          </a>
  
       <a href="passchange.php"> 
  
          <span>MANAGE PASSWORD</span>
        </a>
  
        <a href="logout.php">
            <span>LOG OUT</span>
        </a>
    </div><br>
     
    <body>
        <h4 align="center"><a href="">Employee Leave Management System </a></h4>
        <div class="container">
             <form action="" name="chngpwd" method="post" onSubmit="return valid();" action="index.php" >
                <h3 style="text-align:center ; color: #3f4e4e;">Renew Password</h3>
                <input type="password" name="opwd" id="opwd" placeholder="enter your current password"  autocomplete="none">
              
                <input type="password"name="npwd" id="npwd" placeholder="enter new password" maxlength="8" minlength="6" autocomplete="none" >
              
                <input type="password"name="cpwd" id="cpwd" placeholder="confirm your password" maxlength="8" minlength="6"autocomplete="none" >
               
                <button onclick="return valid()" name="Submit" style=" background-color: #82c1d1;box-shadow: 5px 5px 5px grey">submit</button>
            </form>
            
        </div>
</body>
</html>