<?php 

session_start();

if (!isset($_SESSION['lastname'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="side.css">
    
    <title>Welcome</title>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
      <i  id="btn">☰</i>
      <i class="fas fa-times" id="cancel">☰</i>
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
        <div class="container"><center>
          
            <?php
$conn = mysqli_connect("localhost", "root", "", "LAMS_SYSTEM");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  firstname,middlename,lastname,email,phone,birthdate,department,address,gender FROM users WHERE lastname = '".$_SESSION['lastname']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo  "<h2 >USERNAME:</h2>". $row["firstname"]."   ".$row["middlename"] ."    ".$row["lastname"]  ."<br><BR><BR>"."<h2>EMAIL:</h2>". $row["email"]."<br><BR><BR>"."<h2>PHONE:</h2>".
 $row["phone"]."<br><BR><BR>"."<h2>BIRTHDATE:</h2>". $row["birthdate"]."<br><BR><BR>"."<h2>DEPARTMENT:</h2>". $row["department"] ."<br><BR><BR>"."<h2>ADDRESS:</h2>". $row["address"]."<br><BR><BR>" ."<h2>GENDER:</h2>". $row["gender"]."<br><BR><BR>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
        
        </center>
        </div>
</body>
</html>