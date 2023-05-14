<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['lastname'])) {
    header("Location: index.php");
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
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (firstname,middlename,lastname, email,phone,birthdate,department,address,gender, password)
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
				echo "<script>alert('Something Wrong Went.🥺')</script>";
			}
		} else {
			echo "<script>alert('Something wrong with your Email ! ,either Email Already Exists.🥺')</script>";
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
	var gender = document.querySelector('#gender').value;
    
if( fname=="")
{  
alert("Please Enter The Firstname🥺 !!");
focus();
document.querySelector('#fname').style.border="red solid 2px ";
return false;
}
else
{
document.querySelector('#fname').style.border="green solid 2px ";
}
if(mname=="")
{
alert("Please Enter The Middlename🥺 !!");
focus();
document.querySelector('#mname').style.border="red solid 2px ";
return false;
}
if(mname != "")
{
document.querySelector('#mname').style.border="green solid 2px ";
}
if(lname=="")
{
alert("Please Enter The Lastname🥺 !!");
focus();
document.querySelector('#lname').style.border="red solid 2px ";
return false;
}
if(lname != "")
{
document.querySelector('#lname').style.border="green solid 2px ";
}
if(email="")
{
alert("Please Enter The Email🥺 !!");
focus();
document.querySelector('#email').style.border="red solid 2px ";
return false;
}
if(email != "")
{
document.querySelector('#email').style.border="green solid 2px ";
}
if(phone==""){
	alert(" Please Enter The Phone☎️ !!");
	focus();
	document.querySelector('#phone').style.border="red solid 2px ";
	return false;
}
if(phone != "")
{
document.querySelector('#phone').style.border="green solid 2px ";
}
if(birth==""){
	alert(" Please Enter The Birthdate🥺 !!");
	focus();
	document.querySelector('#birth').style.border="red solid 2px ";
	return false;
}
if(birth != "")
{
document.querySelector('#birth').style.border="green solid 2px ";
}
if(depa==""){
	alert(" Please Enter Your Department🥺 !!");
	focus();
	document.querySelector('#depa').style.border="red solid 2px ";
	return false;
}
if(depa != "")
{
document.querySelector('#depa').style.border="green solid 2px ";
}
if(address==""){
	alert(" Please Enter The Address🥺 !!");
	focus();
	document.querySelector('#address').style.border="red solid 2px ";
	return false;
}
if(address != "")
{
document.querySelector('#address').style.border="green solid 2px ";
}
if(pass1==""){
	alert(" Please Enter The Password🥺 !!");
	focus();
	document.querySelector('#pass1').style.border="red solid 2px ";
	return false;
}
if(pass1 != "")
{
document.querySelector('#fname').style.border="green solid 2px ";
}
if(pass2==""){
	alert(" Please Confirm Password🥺 !!");
	focus();
	document.querySelector('#pass2').style.border="red solid 2px ";
	return false;
}
if(pass2 != "")
{
document.querySelector('#fname').style.border="green solid 2px ";
}
if(pass1 != pass2){
	alert(" Passwords not much🥺 !!");
	focus();
	document.querySelector('#pass1').style.border="red solid 2px ";
	document.querySelector('#pass2').style.border="red solid 2px ";
	return false;
}
if(gender == ""){
	alert(" Please Enter The Gender🥺 !!");
	focus();
	document.querySelector('#gender').style.border="red solid 2px ";
	return false;
}

return true;
}
</script>
</head>
<body>
	<div class="container">
		<form action="" method="POST" >
		<h2 style="padding-bottom:10px;padding-left:40px;">REGISTRATION FORM</h2>
			<div >
				<input type="text" placeholder="Enter Firstanme" id="fname" name="firstname" value="<?php echo $firstname; ?>" onkeypress ="return /[a-z ]/i.test(event.key)" >
			</div>
			<div >
				<input type="text" placeholder="Enter Middlename" id="mname" name="middlename" value="<?php echo $middlename; ?>"  onkeypress ="return /[a-z ]/i.test(event.key)" >
			</div>
			<div >
				<input type="text" placeholder="Enter Lastname" id="lname" name="lastname" value="<?php echo $lastname; ?>"  onkeypress ="return /[a-z ]/i.test(event.key)">
			</div>
			<div >
				<input type="email" placeholder="Enter Email" id="email" name="email" value="<?php echo $email; ?>" required >
			</div>
			<div >
				<input type="text" placeholder="Enter phone number" id="phone" name="phone" minlength="10" maxlength="10" value="<?php echo $phone; ?>"  onkeydown ="return /[0-9]/i.test(event.key)" >
			</div>
			<div >
				<input type="date" placeholder="Enter your birthdate" id="birth" name="birthdate" value="<?php echo $birthdate; ?>" >
			</div>
			<div >
				<input type="text" placeholder="Enter your department" id="depa" name="department" value="<?php echo $department; ?>"  onkeypress ="return /[a-z ]/i.test(event.key)">
			</div>
			<div >
				<input type="text" placeholder="Enter your address" id="address" name="address" value="<?php echo $address; ?>" onkeypress ="return /[a-z 0-9 ]/i.test(event.key)">
			</div>
			<div >
				<input type="password" placeholder="Enter Password" id="pass1" name="password" maxlength="6" minlength="6" value="<?php echo $_POST['password']; ?>" >
            </div>
            <div >
				<input type="password" placeholder="Confirm Password" id="pass2" name="cpassword" maxlength="6" minlength="6" value="<?php echo $_POST['cpassword']; ?>" >
			</div>
			 <!-- <div>
                   <input type="radio" name="gender" value="<?php echo $_POST['gender']; ?>" required> Male <input type="radio" name="gender" value="<?php echo $_POST['gender']; ?>" required> Female
                </div> -->
				<div class="input-field col m6 s12">
                    <label for="city">gender</label><br>
                    <select name="gender" id="gender">
					<option value=""></option>
                      <option value="male">male</option>
                      <option value="female">female</option>
					</select>
				</div>
            <div>
				<button type="submit" name="submit" style="margin-right: 100px;" onclick="return valid()">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>