<?php
include "connection.php";
 session_start();
include "dsession.php";
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Slot</title>
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
                <h4>Dr.<?php echo $result['dname']?></h4>
                <p><?php echo $result['dspeciality']?></p>
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
                    <a href="addslot.php"> <button>Add New</button></a>
                </div>
                <div class="mainmenu">
                    <ul>
                        <a href="#"><li><ion-icon name="help-circle-outline" class="icond"></ion-icon>Help</li></a>
                        <a href="#"><li><ion-icon name="settings-outline" class="icond"></ion-icon>Setting</li></a>
                        <a href="dprofile.php"><li><ion-icon name="person-circle-outline" class="icond"></ion-icon>Profile</li></a>
                    </ul>
                </div>
            </div>
           
            <div class="mainbodyslot">
                <table>
                <tr>
                      <th>Day</th>
                      <th>Slot 1</th>
                      <th>Slot 2</th>
                      <th>Slot 3</th>
                      <th>Slot 4</th>
                      <th>Slot 5</th>
                      <th>Slot 6</th>
                      <th>Slot 7</th>
                      <th>Slot 8</th>
                      <th>Slot 9</th>
                      <th>Slot 10</th>
                      <th>Operations</th>
                    </tr>

            
            <?php 
            $query="SELECT * FROM `slots` WHERE duid='$duid' " ;    
            $result=mysqli_query($connection,$query);
            if($result){
 
            while( $row=mysqli_fetch_assoc($result)){
            $day=$row['day'];
            $slot1=$row['slot1'];
            $slot2=$row['slot2'];
            $slot3=$row['slot3'];
            $slot4=$row['slot4']; 
            $slot5=$row['slot5'];
            $slot6=$row['slot6'];
            $slot7=$row['slot7'];
            $slot8=$row['slot8'];
            $slot9=$row['slot9'];
            $slot10=$row['slot10'];
            
             echo '  <tr>
             <td scope="row">'.$day.'</td>
             <td>'.$slot1.'</td>
             <td>'.$slot2.'</td>
             <td>'.$slot3.'</td>
             <td>'.$slot4.'</td>
             <td>'.$slot5.'</td>
             <td>'.$slot6.'</td>
             <td>'.$slot7.'</td>
             <td>'.$slot8.'</td>
             <td>'.$slot9.'</td>
             <td>'.$slot10.'</td>
             <td>
             <a href="editslot.php?update='.$day.'"><ion-icon name="pencil-outline" class="editicon"></ion-icon></a>
             <a href="deleteslot.php?delete='.$day.'"> <ion-icon name="close-outline" class="deleteicon"></ion-icon></a>
             </td>
             </tr>';
            }
            }
            ?>
                </table>

            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>