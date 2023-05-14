<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
     
    <script>
        function leaveform(){
    var fullname = document.querySelector('#fullname').value;
    var email = document.querySelector('#email').value;
     var type1 = document.querySelector('#type1').value;
    var  type2= document.querySelector('#type2').value;
    var start = document.querySelector('#start').value;
    var end = document.querySelector('#end').value;
    var from = document.querySelector('#from').value;
    var towhere = document.querySelector('#towhere').value;
    var descri = document.querySelector('#descri').value;
    var attach = document.querySelector('#attach').value;

    if(fullname == ""){  
    alert("Please Enter The Lastname🥺 !!");
    focus();
    document.querySelector('#fullname').style.border="red solid 2px";
    return false;   
    }
    if(fullname != ""){
        document.querySelector('#fullname').style.border="green solid 2px";
    }
    if(email == ""){
        alert("Please Enter Your Email🥺 !!");
    focus();
    document.querySelector('#email').style.border="red solid 2px";
     return false;   
    } 
    if(email != ""){
        document.querySelector('#email').style.border="green solid 2px";
    }
    if(type1 == ""){
        alert("Please Enter The Type of Leave🥺 !!");
    focus();
    document.querySelector('#type1').style.border="red solid 2px";
     return false;   
    }
    if(type1 != ""){
        document.querySelector('#type1').style.border="green solid 2px";
    }
    if(type2 == ""){
        alert("Please Enter The Catergory🥺 !!");
    focus();
    document.querySelector('#type2').style.border="red solid 2px";
     return false;   
    }
    if(type2 != ""){
        document.querySelector('#type2').style.border="green solid 2px";
    }
    if(start == ""){
        alert("Startdate is Needed 🥺!!");
    focus();
    document.querySelector('#start').style.border="red solid 2px";
     return false;   
    }
    if(start != ""){
        document.querySelector('#start').style.border="green solid 2px";
    }
    if(end == ""){
        alert("Enddate is Needed 🥺!!");
    focus();
    document.querySelector('#end').style.border="red solid 2px";
     return false;   
    }
    if(end != ""){
        document.querySelector('#end').style.border="green solid 2px";
    }
    if(start == end){
        alert("Dates can't be same 🥺!!");
    focus();
    document.querySelector('#end').style.border="red solid 2px";
     return false;   
    }
    
    if(start > end ){
        alert("Startdate can't be bigger than Enddate 🥺!!");
    focus();
    document.querySelector('#start').style.border="red solid 2px";
     return false;   
    }
    if((start-end) > 28 ){
        alert("Leave can't be long than 28 days 🥺!!");
    focus();
     return false;   
    }
    if(from = ""){
        alert("We Need Your Root 🥺!!");
    focus();
    document.querySelector('#from').style.border="red solid 2px";
     return false;   
    }
    if(from != ""){
        document.querySelector('#from').style.border="green solid 2px";
    }
    if(towhere = ""){
        alert("We Need Your Destination 🥺!!");
    focus();
    document.querySelector('#towhere').style.border="red solid 2px";
     return false;   
    }
    if(towhere != ""){
        document.querySelector('#towhere').style.border="green solid 2px";
    }
    if(descri = ""){
        alert("Description for your leave is needed 🥺!!");
    focus();
    document.querySelector('#descri').style.border="red solid 2px";
     return false;   
    }
    if(descri != ""){
        document.querySelector('#descri').style.border="green solid 2px";
    }
     if(attach = ""){
        alert("Any Attachment of what you mentioned above 🥺!!");
    focus();
    document.querySelector('#attach').style.border="red solid 2px";
     return false;   
    }
    if(attach != ""){
        document.querySelector('#attach').style.border="green solid 2px";
    }
    // else if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/){
    //     alert("Please Select jpg,png File🥺 !!");
    // focus();
    //  return false;   
    // }

    return true;

        }
    </script>
    <link rel="stylesheet" href="tarifa.css">
</head>
<body>
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
        
    </div>
    <h4 STYLE="TEXT-ALIGN:CENTER">Welcome to LAMS</h4>
    
    <div class="container">

       <form action="leave.php" method="POST">
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
                    
             <div >
				<input type="text" placeholder="Enter Your Lastname" id="fullname" name="lastname" value="" value="<?php echo $lastname ?>" style="width:550px;" onkeypress ="return /[a-z ]/i.test(event.key)" >
			</div>
            <div >
				<input type="text" placeholder="Enter Email" id="email" name="email" value="" value="<?php echo $email; ?>" style="width:550px;" >
			</div>           
   <br><br> <label for="">Type of leave(choose paid or unpaid):</label>
                                <select name="leavetype" id="type1">
                                    <option value="">--Select Leave type--</option>
                                    <option value="paid">PAID</option>
                                    <option value="unpaid">UNPAID</option>
                                </select>
                                <label for="">Leave Catergory:</label>
                                <select name="leavecatergory" id="type2">
                                    <option value="">--Select Leave catergory--</option>
                                    <option value="Martenity Leave">Martenity Leave</option>
                                    <option value="Partenity Leave">Partenity Leave</option>
                                    <option value="Casual Leave">Casual Leave</option>
                                    <option value="Mandatory Leave">Mandatory Leave</option>
                                </select>
                                <div class="leaveDuration">Leave Duration:</div>
                                <label>Start Date:</label>
                                 <input type="date" name="startdate" id="start">
                                 <label>End Date:</label>
                                 <input type="date" name="enddate" id="end">
                                 <div class="destination">Destination:<br/>
                                 <label for="">From where:</label>
                                <select name="fromwhere" id="from">
                                    <option value="">--Select where you are from--</option>
                                    <option value="Dodoma">Dodoma</option>
                                    
                                </select>
                                <label for="">To where:</label>
                                <select name="towhere" id="towhere">
                                    <option value="">--Select where you are going--</option>
                                    <option value="o1">Arusha</option>
                                    <option value="Dar es Salaam">Dar es Salaam</option>
                  <option value="Dodoma">Dodoma</option>
                  <option value="Geita">Geita</option>
                  <option value="Iringa">Iringa</option>
                  <option value="Kagera">Kagera</option>
                  <option value="Katavi">Katavi</option>
                  <option value="Kigoma">Kigoma</option>
                  <option value="Kilimanjaro">Kilimanjaro</option>
                  <option value="Lindi">Lindi</option>
                  <option value="Manyara">Manyara</option>
                  <option value="Mara">Mara</option>
                  <option value="Mbeya">Mbeya</option>
                  <option value="Morogoro">Morogoro</option>
                  <option value="Mtwara">Mtwara</option>
                  <option value="Mwanza">Mwanza</option>
                  <option value="Njombe">Njombe</option>
                  <option value="Pemba Kaskazini">Pemba Kaskazini</option>
                  <option value="Pemba Kusini">Pemba Kusini</option>
                  <option value="Pwani">Pwani</option>
                  <option value="Rukwa">Rukwa</option>
                  <option value="Ruvuma">Ruvuma</option>
                  <option value="Shinyanga">Shinyanga</option>
                  <option value="Simiyu">Simiyu</option>
                  <option value="Singida">Singida</option>
                  <option value="Tabora">Tabora</option>
                  <option value="Tanga">Tanga</option>
                  <option value="Zanzibar Kusini">Zanzibar Kusini</option>
                  <option value="Unguja Kaskazini">Unguja Kaskazini</option>
                  <option value="Unguja Magharibi">Unguja Magharibi</option>
                                </select>

                                <label for="">Description:</label>
                                <input type="text" name="description" id="descri" ><br>
                                
                                <label for="">Attach your file:</label>
                                <input type="file" name="file" id="attach">
                                <input type="text" name="approval" value="WAITING FOR APPROVAL" style="display:none;" ><br>
                            <div >
                                <button type="submit" name="apply" class="btn btn-primary" onclick="return leaveform()" >Apply</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
