<?php 

session_start();

if (!isset($_SESSION['lastname'])) {
    header("Location: adminlog.php");
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
    <!-- <?php echo "<h1>Welcome " . $_SESSION['lastname'] . "</h1>"; ?> -->
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
        <div class="container">
        <div class="container"><center>
        <style>
table { 
  margin:10%;
    box-shadow: 2px 2px 2px 2px;
margin-bottom: 590px;
margin-left: 230px;
height: auto;
align-items: center;
border-collapse: collapse;
width: 10%;
color: #588c7e;
font-family: 'Times New Roman';
font-size: 17px;
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
              <th>FNAME</th>
              <th>MNAME</th>
              <th>LNAME</th>
              <th>EMAIL</th>
              <th>PHONE</th>
              <th>BIRTHDATE</th>
              <th>DEPARTMENT</th>
              <th>ADDRESS</th>
              <th>GENDER</th>
             </tr>

          
        <?php
$conn = mysqli_connect("localhost", "root", "", "LAMS_SYSTEM");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  firstname,middlename,lastname,email,phone,birthdate,department,address,gender FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo  "<tr><td>" . $row["firstname"] ."  ". "</td><td>" . $row["middlename"] ."  ". "</td><td>"."  ".  $row["lastname"] ."</td><td>" . $row["email"]. "</td><td>"
. $row["phone"]."</td><td>" . $row["birthdate"]."</td><td>" . $row["department"]."</td><td>" . $row["address"]."</td><td>" . $row["gender"]. "</td></tr>";
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