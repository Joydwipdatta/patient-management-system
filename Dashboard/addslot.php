<?php
include "connection.php";
session_start();
include "dsession.php";
?>
<?php
$_SESSION['duid'];
$duid=$_SESSION['duid'];
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Add Slot</title>
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
                <h4>Dr. <?php  echo $result['dname']?></h4>
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
                        <a href="drprofile.php"><li><ion-icon name="person-circle-outline" class="icond"></ion-icon>Profile</li></a>
                    </ul>
                </div>
            </div>
            
            <div class="mainbodyslot">
                <div class="drform">
                    
                    <form action="addslot.php" method="POST" class="drfr">
                        
                        <input type="hidden" name="duid" id="" value="<?php echo $duid?>"  readonly>
                        <label for="day">Day</label>
                        <select id="day" name="day" required>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                        </select>
                        <div class="slottimegrid">
                            <div>
                                <label for="slot1">Slot 1<span class="requerd">*</span></label>
                                <input type="time" name="slot1" id="" required>
                            </div>
                            <div>
                                <label for="slot2">Slot 2<span class="requerd">*</span></label>
                                <input type="time" name="slot2" id="" required>
                            </div>
                            <div>
                                <label for="slot3">Slot 3<span class="requerd">*</span></label>
                                <input type="time" name="slot3" id="" required>
                            </div>
                            <div>
                                <label for="slot4">Slot 4</label>
                                <input type="time" name="slot4" id="" >
                            </div>
                            <div>
                                <label for="slot5">Slot 5</label>
                                <input type="time" name="slot5" id="" >
                            </div>
                            <div>
                                <label for="slot6">Slot 6</label>
                                <input type="time" name="slot6" id="" >
                            </div>
                            <div>
                                <label for="slot7">Slot 7</label>
                                <input type="time" name="slot7" id="" >
                            </div>
                            <div>
                                <label for="slot8">Slot 8</label>
                                <input type="time" name="slot8" id="" >
                            </div>
                            <div>
                                <label for="slot9">Slot 9</label>
                                <input type="time" name="slot9" id="" >
                            </div>
                            <div>
                                <label for="slot10">Slot 10</label>
                                <input type="time" name="slot10" id="" >
                            </div>
                        </div>    
                        <input type="submit" name="submit"  value="Submit" class="logbutton">
                        <?php
if(isset($_POST['submit'])){
       $duid=$_POST['duid'];
       $day=$_POST['day'];
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

      // $query=$query="SELECT * FROM  slots WHERE duid=$duid and day=$day";
    //$result=mysqli_query($connection,$query);
    //$count=mysqli_num_rows($result);
    //if($count>0) {
      // echo "please select new day";
    //}
    //else{
       $query="INSERT INTO slots(duid,day,slot1,slot2,slot3,slot4,slot5,slot6,slot7,slot8,slot9,slot10) value('$duid','$day','$slot1','$slot2','$slot3','$slot4','$slot5','$slot6','$slot7','$slot8','$slot9','$slot10')";
       $result=mysqli_query($connection,$query);
       if($result){
        header('location:slot.php'); 
       }else{
        echo"Reenter the data";
       }
    }
//}

?>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>