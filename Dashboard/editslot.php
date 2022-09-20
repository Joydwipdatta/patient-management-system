<?php
include "connection.php";
session_start();
include "dsession.php";
error_reporting(0);
?>




<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Edit Slot</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="bar">
        <div class="sidebar">
            <div class="profile">
                <img src="img/doc2.jpg" alt="">
                <h4>Dr.<?php  echo $result['dname']?></h4>
                <p><?php  echo $result['dspeciality']?></p>
            </div>
            <div class="sidemenu">
                <ul>
                    <a href="doctor.php"> <li><ion-icon name="apps-outline" class="icond"></ion-icon>Dashboard</li></a>
                    <li class="active"><ion-icon name="calendar-outline" class="icond"></ion-icon>Slots</li>
                    <a href="appointment.php"><li> <ion-icon name="people-outline" class="icond"></ion-icon> Appointments</li></a>
                    <a href="history.php"><li><ion-icon name="receipt-outline" class="icond"></ion-icon>History</li></a>
                </ul>
                <ul class="bottommenu">
                    <a href="logout.php"><li><ion-icon name="log-out-outline" class="icond"></ion-icon>Logout</li></a>
                </ul>

            </div>
        </div>

        <div class="mainbar">
            <div class="topmain">
                <div class="mainh">
                    <h1>Slots</h1>
                   
                </div>
                <div class="mainbutton">
                    <a href="slot.php"><button>View Slots</button></a>
                </div>
                <div class="mainmenu">
                    <ul>
                        <a href="#"><li><ion-icon name="help-circle-outline" class="icond"></ion-icon>Help</li></a>
                        <a href="#"><li><ion-icon name="settings-outline" class="icond"></ion-icon>Setting</li></a>
                        <a href="dprofile.php"><li><ion-icon name="person-circle-outline" class="icond"></ion-icon>Profile</li></a>
                    </ul>
                </div>
            </div>
            <?php
 
 $day=$_GET['update'];
 $query="SELECT * FROM `slots` WHERE  day='$day'";
 $data=mysqli_query($connection,$query);
 $result=mysqli_fetch_assoc($data);
   $day=$result['day'];
   $slot1=$result['slot1'];
   $slot2=$result['slot2'];
   $slot3=$result['slot3'];
   $slot4=$result['slot4'];
   $slot5=$result['slot5'];
   $slot6=$result['slot6'];
   $slot7=$result['slot7'];
   $slot8=$result['slot8'];
   $slot9=$result['slot9'];
   $slot10=$result['slot10'];
 
 
 
 
 
 if(isset($_POST['submit'])){
   $slot1=$_POST['slot1'];
   $slot2=$_POST['slot2'];
   $slot3=$_POST['slot3'];
   $slot4=$_POST['slot4'];
   $slot5=$_POST['slot5'];
   $slot6=$_POST['slot6'];
   $slot7=$_POST['slot7'];
   $slot8=$_POST['slot8'];
   $slot9=$_POST['slot9'];
   $slot10=$_POST['slot10'];
 
 
 
$query= "UPDATE `slots` SET  slot1='$slot1', slot2='$slot2', slot3='$slot3', slot4='$slot4',slot5='$slot5',slot6='$slot6',slot7='$slot7',slot8='$slot8',slot9='$slot9',slot10='$slot10' where day='$day'";
$result=mysqli_query($connection,$query);
if($result){
echo "updated successfully";
header('location:slot.php');
  
 }
 else{
   echo "not success";
  //die(mysql_error($connection));
 } 
 
 }   
       
 ?>
            <div class="mainbodyslot">
                <div class="drform">
                    
                    <form action="" method="POST" class="drfr">

                        
                        <input type="text" name="duid" id="" value=<?php echo $_SESSION['duid']?> readonly>
                        <label for="day">Day</label>
                        <input type="text" name="day" id="" value=" <?php echo $day?>"   readonly>

                        <div class="slottimegrid">
                            <div>
                                <label for="slot1">Slot 1<span class="requerd">*</span></label>
                                <input type="time" name="slot1" id="" value="<?php echo $slot1?>" required>
                            </div>
                            <div>
                                <label for="slot2">Slot 2<span class="requerd">*</span></label>
                                <input type="time" name="slot2" id="" value="<?php echo $slot2?>" required>
                            </div>
                            <div>
                                <label for="slot3">Slot 3<span class="requerd">*</span></label>
                                <input type="time" name="slot3" id="" value="<?php echo $slot3?>" required>
                            </div>
                            <div>
                                <label for="slot4">Slot 4</label>
                                <input type="time" name="slot4" id="" value="<?php echo $slot4?>" >
                            </div>
                            <div>
                                <label for="slot5">Slot 5</label>
                                <input type="time" name="slot5" id="" value="<?php echo $slot5?>" >
                            </div>
                            <div>
                                <label for="slot6">Slot 6</label>
                                <input type="time" name="slot6" id="" value="<?php echo $slot6?>" >
                            </div>
                            <div>
                                <label for="slot7">Slot 7</label>
                                <input type="time" name="slot7" id="" value="<?php echo $slot7?>" >
                            </div>
                            <div>
                                <label for="slot8">Slot 8</label>
                                <input type="time" name="slot8" id="" value="<?php echo $slot8?>" >
                            </div>
                            <div>
                                <label for="slot9">Slot 9</label>
                                <input type="time" name="slot9" id="" value="<?php echo $slot9?>" >
                            </div>
                            <div>
                                <label for="slot10">Slot 10</label>
                                <input type="time" name="slot10" id="" value="<?php echo $slot10?>" >
                            </div>
                        </div>
 
 
   
                        <input type="submit" name="submit" value="update" class="logbutton">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>