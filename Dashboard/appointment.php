<?php
include  "connection.php";
 session_start();
include  "dsession.php";
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
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
                <h4>Dr.<?php echo $result['dname'] ?></h4>
                <p><?php echo $result['dspeciality'] ?></p>
            </div>
            <div class="sidemenu">
                <ul>
                    <a href="doctor.php"> <li><ion-icon name="apps-outline" class="icond"></ion-icon>Dashboard</li></a>
                    <a href="slot.php"><li><ion-icon name="calendar-outline" class="icond"></ion-icon>Slots</li></a>
                    <a href="#"><li class="active"> <ion-icon name="people-outline" class="icond"></ion-icon> Appointments</li></a>
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
                    <h1>All Appointments</h1>
                </div>
                <div class="mainmenu">
                    <ul>
                        <a href="#"><li><ion-icon name="help-circle-outline" class="icond"></ion-icon>Help</li></a>
                        <a href="#"><li><ion-icon name="settings-outline" class="icond"></ion-icon>Setting</li></a>
                        <a href="dprofile.php"><li><ion-icon name="person-circle-outline" class="icond"></ion-icon>Profile</li></a>
                    </ul>
                </div>
            </div>
           
            
            <div class="mainbody">
                <div class="mbody"><div class="appointmentslotbox asb">
                    <div class="appointmentbox">
                       
             <?php
           
             
            $_SESSION['duid'];
            $duid=$_SESSION['duid'];
            $query="SELECT * FROM `appointment` WHERE duid='$duid'";    
            $result=mysqli_query($connection,$query);
             if($result){
              while($row=mysqli_fetch_assoc($result)){
                  $puid=$row['puid'];
                  $pname=$row['pname'];
                  $symptom=$row['symptom'];
                  $slot=$row['slot'];

            echo'
                <div class="patient">
                <div class="patientimg">
                    <img src="img/happy-g3df13d974_1280.jpg" alt="">
                </div>
                <div class="patientdoc">
                     <h4>'.$pname.'</h4>
                    <p>'.$symptom.'</p>
                </div>
                <div class="time">
                    <h2>'.$slot.'</h2>
                </div>
                <div class="detail">
                    <a href="patientdetail.php?puid='.$puid.'"><button>Details</button> </a>
                </div> 
           </div>';
              }
             }

           
?>
                    </div>
                </div></div> 

            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
        


</body>
</html>