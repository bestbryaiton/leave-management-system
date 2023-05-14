<?php 

session_start();

if (!isset($_SESSION['lastname'])) {
 header("Location: leaveform.php");
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
    <!-- <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?> -->
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn">☰</i>
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
        <style>
table { 
width:10%;
box-shadow: 2px 2px 2px 2px;
margin-bottom: 400px;
margin-left: 245px;
height: auto;
align-items: center;
border-collapse: collapse;
color: #588c7e;
font-family: 'Segoe UI';
font-size: small;
text-align: center;
}
th {
padding: 15px;
align-items: center;
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {
  padding:7px ;
  background-color: #f2f2f2
  }
</style>

        <table>
             <tr>
             <th>LASTNAME</th>
             <th>EMAIL</th>
              <th>LEAVE TYPE</th>
              <th>LEAVE CATERGORY</th>
              <th>STARTDATE</th>
              <th>ENDDATE</th>
              <th>FROM</th>
              <th>TO</th>
              <th>DESCRIPTION</th>
              <th>ATTACHMENT</th>
              <th>RESPONSE</th>
             </tr>

                    
        <?php
$conn = mysqli_connect("localhost", "root", "", "LAMS_SYSTEM");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT lastname,email, leavetype, leavecatergory, startdate , enddate, fromwhere, towhere, description, file, approval FROM leaveform WHERE lastname = '".$_SESSION['lastname']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo  "<tr><td>" . $row["lastname"] ."  ". "</td><td>" . $row["email"] ."  ". "</td><td>"  . $row["leavetype"] ."  ". "</td><td>" . $row["leavecatergory"] ."  ". "</td><td>"."  ".  $row["startdate"] ."</td><td>" . $row["enddate"]. "</td><td>"
. $row["fromwhere"]."</td><td>" . $row["towhere"]."</td><td>" . $row["description"]."</td><td>" . $row["file"]."</td><td>" . $row["approval"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
 
        </table>
      </center>
        </div>
</body>
</html>