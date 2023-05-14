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
   
    <input type="checkbox" id="check">
    <label for="check">
      <i  id="btn">☰</i>
      <i  id="cancel">☰</i>
    </label>
    <div class="sidebar" style="margin-top: 40px; height:auto;">
      <header style="text-align: center; height: 11.2vh;"><img src="AVATAR.png" alt="Avatar" style="width:20%;">
         <h> ADMIN </h> 
        </header>
        <a href="admindash.php">
        
        <span>MY EMPLOYEE</span>
      </a>
        <a href="veiw applicants.php">
        
        <span>VIEW APPLICATION</span>
      </a>
      <a href="editemplo.php">
        
        <span>EDIT EMPLOYEE</span>
      </a>
      <a href="adminlogout.php">
         
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
margin-bottom: 300px;
margin-left: 215px;
height: auto;
align-items: center;
border-collapse: collapse;
color: #588c7e;
font-family: 'Segoe UI';
font-size: 12.5px;
text-align: center;
}
th {
padding: 10px;
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
              <th>ACTION</th>
             </tr>

                    
        <?php
$conn = mysqli_connect("localhost", "root", "", "lams_system");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT lastname,email, leavetype, leavecatergory, startdate , enddate, fromwhere, towhere, description, file, approval FROM leaveform";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
  <td><?php echo $row['lastname']; ?></td>
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['leavetype']; ?></td>
  <td><?php echo $row['leavecatergory']; ?></td>
  <td><?php echo $row['startdate']; ?></td>
  <td><?php echo $row['enddate']; ?></td>
  <td><?php echo $row['fromwhere']; ?></td>
  <td><?php echo $row['towhere']; ?></td>
  <td><?php echo $row['description']; ?></td>
  <td><?php echo $row['file']; ?></td>
  <td><?php echo $row['approval']; ?></td>
  <button style=" border-box:5px;background-color:aqua;border:2px solid gray;">
  <td><a href="updateapplicant.php?id=<?= $row['email']; ?>">RESPONSE</a></td>
</button>
</tr>

<?php

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
