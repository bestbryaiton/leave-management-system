<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['lastname'])) {
    header("Location: adminlog.php");
}

if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$birthdate = $_POST['birthdate'];
	$department = $_POST['department'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admins WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admins (firstname,middlename,lastname, email,phone,birthdate,department,address,gender, password)
					VALUES ('$firstname','$middlename','$lastname', '$email','$phone','$birthdate','$department','$address','$gender' ,'$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.🤩')</script>";
				$firstname = "";
				$middlename = "";
				$lastname = "";
				$email = "";
				$phone = "";
				$birthdate = "";
				$department = "";
				$address = "";
				$gender = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.🥺')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.🥺')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.🥺')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="lore.css">

	<title >Register Form</title>
	<script type="text/javascript">
function valid()
{
	var fname = document.querySelector('#fname').value;
    var mname= document.querySelector('#mname').value;
    var lname = document.querySelector('#lname').value;
	var email = document.querySelector('#email').value;
	var phone = document.querySelector('#phone').value;
	var birth = document.querySelector('#birth').value;
	var depa = document.querySelector('#depa').value;
	var address = document.querySelector('#address').value;
	var pass1 = document.querySelector('#pass1').value;
	var pass2 = document.querySelector('#pass2').value;
    
if( fname=="")
{
  
alert("Please Enter The Firstname🥺 !!");
focus();
return false;
}
else if(mname=="")
{
alert("Please Enter The Middlename🥺 !!");
focus();
return false;
}
else if(lname=="")
{
alert("Please Enter The Lastname🥺 !!");
focus();
return false;
}
else if(email="")
{
alert("Please Enter The Email🥺 !!");
focus();
return false;
}
else if(phone==""){
	alert(" Please Enter The Phone🥺 !!")
	return false;
}
else if(birth==""){
	alert(" Please Enter The Birthdate🥺 !!")
	return false;
}

else if(depa==""){
	alert(" Please Enter Your Department🥺 !!")
	return false;
}
else if(address==""){
	alert(" Please Enter The Address🥺 !!")
	return false;
}
else if(pass1==""){
	alert(" Please Enter The Password🥺 !!")
	return false;
}
else if(pass2==""){
	alert(" Please Confirm Password🥺 !!")
	return false;
}
else if(pass1 != pass2){
	alert(" Passwords not much🥺 !!")
	return false;
}
return true;
}
</script>
</head>
<body>
	<div class="container">
		<form action="" method="POST" >
		<h2 style="padding-bottom:10px;padding-left:40px;">ADMIN REGISTRATION FORM</h2>
			<div >
				<input type="text" placeholder="Enter Firstanme" id="fname" name="firstname" value="<?php echo $firstname; ?>" required>
			</div>
			<div >
				<input type="text" placeholder="Enter Middlename" id="mname" name="middlename" value="<?php echo $middlename; ?>" required>
			</div>
			<div >
				<input type="text" placeholder="Enter Lastname" id="lname" name="lastname" value="<?php echo $lastname; ?>" required>
			</div>
			<div >
				<input type="email" placeholder="Enter Email" id="email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div >
				<input type="text" placeholder="Enter phone number" id="phone" name="phone" value="<?php echo $phone; ?>" required>
			</div>
			<div >
				<input type="date" placeholder="Enter your birthdate" id="birth" name="birth" value="<?php echo $birthdate; ?>" required>
			</div>
			<div >
				<input type="text" placeholder="Enter your department" id="depa" name="department" value="<?php echo $department; ?>" required>
			</div>
			<div >
				<input type="text" placeholder="Enter your address" id="address" name="address" value="<?php echo $address; ?>" required>
			</div>
			<div >
				<input type="password" placeholder="Enter Password" id="pass1" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div >
				<input type="password" placeholder="Confirm Password" id="pass2" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
				<div class="input-field col m6 s12">
                    <label for="city">gender</label><br>
                    <select name="kwenda" id="kwenda1" <?php echo $_POST['gender']; ?> required>
					<option value=""></option>
                      <option value="" name="male">male</option>
                      <option value="" name="female">female</option>
					</select>
				</div>
            <div>
				<button type="submit" name="submit" style="margin-right: 100px;" onclick="return valid()">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="adminlog.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>