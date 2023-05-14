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
          
            <title>editemloyee</title>
            <link rel="stylesheet" href="side.css">
   
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
        <div class="container">
        <div class="container"><center>

        <style>
table { 
    
    margin:10%;
    box-shadow: 2px 2px 2px 2px;
margin-bottom: 550px;
margin-left: 190px;
height: auto;
align-items: center;
border-collapse: collapse;
width: 10%;
color: #588c7e;
font-family: 'Times New Roman';
font-size: 12.5px;
text-align: center;
}
th {
  margin:100px;
  padding: 12px;
align-items: center;
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {
  padding:7px ;
  background-color: #f2f2f2
  }
</style>

    <?php
    include 'config.php';
    ?>
    <div class="container">
    <table  class="table">
        <thead>
            <tr>
                
               <th scope="col">ID</th>
                <th scope="col">FNAME</th>
                <th scope="col">   </th>
                <th scope="col">MNAME</th>
                <th scope="col">   </th>
                <th scope="col">LNAME</th>
                <th scope="col">   </th>
                <th scope="col">EMAIL</th>
                <th scope="col">   </th>
                <th scope="col">PHONE</th>
                <th scope="col">   </th>
                <th scope="col">BIRTHDATE</th>
                <th scope="col">   </th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">   </th>
                <th scope="col">ADDRESS</th>
                <th scope="col">   </th>
                <th scope="col">PASSWORD</th>
                <th scope="col">   </th>
                <th scope="col">GENDER</th>
                <th scope="col">   </th>
                <th scope="col">ACTIONS</th>
                <tbody>
            <?php
                    $sql="SELECT * FROM `users`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        //fetch one by one takes time like
                        /*$row=mysqli_fetch_assoc($result);
                        echo $row['fname'];
                        */
                        //Altenatively we use loops
                        while($row=mysqli_fetch_assoc($result)){
                           $id=$row['id'];
                            $fname=$row['firstname'];
                            $mname=$row['middlename'];
                            $lname=$row['lastname'];
                            $email=$row['email'];
                            $phone=$row['phone'];
                            $birthdate=$row['birthdate'];
                            $department=$row['department'];
                            $address=$row['address'];
                            $password=$row['password'];
                            $gender=$row['gender'];
                            
                            echo '<tr>
                            <td> '.$id.'</td>
                            <td>'.$fname.'<td>
                            <td>'.$mname.'<td>
                            <td>'.$lname.'<td>
                            <td>'.$email.'<td>
                            <td>'.$phone.'<td>
                            <td>'.$birthdate.'<td>
                            <td>'.$department.'<td>
                            <td>'.$address.'<td>
                            <td>'.$password.'<td>
                            <td>'.$gender.'<td>
                            <td>
                            <button>
                            <a href="updateep.php?updateid='.$id.'">Update</a>
                        </button>
                        <button>
                            <a href="deleteep.php?deleteid='.$id.'">Delete</a>
                        </button>
                            </td>
                            </tr>';
                        }
                    }
             ?>
                </tbody>
            </tr>
        </thead>
    </table>
    </div> 
</body>