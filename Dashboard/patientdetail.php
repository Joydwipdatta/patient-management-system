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
    <title>Patient Detail</title>
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
                    <h1>Patient Detail</h1>
                </div>
                <div class="mainbutton">
                    <a href="appointment.php"> <button>All Appointments</button></a>
                </div>
                <div class="mainmenu">
                    <ul>
                        <a href="#"><li><ion-icon name="help-circle-outline" class="icond"></ion-icon>Help</li></a>
                        <a href="#"><li><ion-icon name="settings-outline" class="icond"></ion-icon>Setting</li></a>
                        <a href="drprofile.php"><li><ion-icon name="person-circle-outline" class="icond"></ion-icon>Profile</li></a>
                    </ul>
                </div>
            </div>
            
            <div class="mainbody">
                <section class="patientsection">
                
                    <div class="patientdetail">
                        <div class="patientnameimg">
                            <div><img src="img/woman-gde38d1257_1280.jpg" alt=""></div>
                 <?php           
             $query="SELECT * FROM `appointment` WHERE duid='$duid'";    
            $result=mysqli_query($connection,$query);
              $data=mysqli_fetch_assoc($result);
                ?>
                            <div class="pnameno">
                                <h3><?php echo $data['pname']?></h3>
                               <!-- <p>+91-88373-02945</p>--->
                            </div>
                        </div>
                        <div class="pdetail">
                            <div>
                                <h5>Starting Time</h5>
                                <p><?php echo $data['slot']?></p>
                            </div>
                            
                            <div>
                                <h5>D.O.B</h5>
                                <p><?php echo $data['pdob']?></p>
                            </div>
                            <div>
                                <h5>Gender</h5>
                                <p><?php echo $data['pgender']?></p>
                            </div>
                           <div>
                            <?php
                                $query="SELECT * FROM `preport` WHERE duid='$duid'";    
                                $result=mysqli_query($connection,$query);
                                  $data=mysqli_fetch_assoc($result);

                            ?>
                                <h5>Last Appointment</h5>
                                <p><?php echo $data['lastappointment']?></p>
                    
                            </div>
                            <?php           
             $query="SELECT * FROM `appointment` WHERE duid='$duid'";    
            $result=mysqli_query($connection,$query);
              $data=mysqli_fetch_assoc($result);
                ?>
                            <div>

                                <h5>Register Date</h5>
                                <p><?php echo $data['bookingdate']?></p>
                            </div>
                            
                        </div>
                        <div class="psymptoms">
                            <h5>Symptoms</h5>
                            <p><?php echo $data['symptom']?></p>
                        </div>
                    </div>
                    <?php           
             $query="SELECT * FROM `appointment` WHERE duid='$duid'";    
            $result=mysqli_query($connection,$query);
              $data=mysqli_fetch_assoc($result);
                ?>
                
                    <div class="patientreport">
                        <h4>Patient Report</h4>
                        <form action="" method="POST"  enctype="multipart/form-data" >
                            <div class="drpatientid">
                                <div class="drid">

                                    
                                    <input type="hidden" name="duid" id="" value="<?php echo $data['duid']?>" readonly>
                                </div>
                                <div class="patientid">
                                    
                                    <input type="hidden" name="puid" id="" value="<?php echo $data['puid']?>" readonly>
                                </div>

                            </div>
                            <div class="drpatientid">
                                <div class="drid">
                                    
                                    <input type="hidden" name="dname" id="" value="<?php echo $data['dname']?>" readonly>
                                </div>
                                <div class="patientid">
                                    
                                    <input type="hidden" name="pname" id="" value="<?php echo $data['pname']?>" readonly>
                                </div>
                                <input type="hidden" name="dob" id="" value="<?php  echo $data['pdob']?>">
                                <input type="hidden" name="gender" id="" value="<?php  echo $data['pgender']?>">
                                <input type="hidden"  name="symptom"  value="<?php echo $data['symptom']?>" >
                                <input type="hidden" name="lappointment" id="" value="<?php echo $data['bookingdate']?>">

                            </div>
                            <div class="attends">
                                <input type="radio" id="" name="attend" value="0">
                                <label for="attend">Attended</label>
                            </div>
                            <div class="attends attendlast">
                                <input type="radio" id="" name="attend" value="1" class="notattend">
                                <label for="notattend">Not Attend</label>
                            </div><br><br><br>
                            <label for="suggestion">Suggestion</label><br>
                            <textarea name="suggestion"  id="" cols="30" rows="4"></textarea><br>
                            <label for="Prescription">Upload Prescription</label><br>
                            <input type="file" name="file" id=""><br>

                            <input type="submit" name="submit" value="Submit">
                            
                        </form>
                    </div>
                </section>    
            </div>
        </div>
    </div>
    <?php
    //error_reporting(0);
    $_SESSION['duid'];
    $duid=$_SESSION['duid'];

    if(isset($_POST['submit'])){
        $duid=$_POST['duid'];
        $puid=$_POST['puid'];
        $dname=$_POST['dname'];
        $pname=$_POST['pname'];
        $pdob=$_POST['dob'];
        $pgender=$_POST['gender'];
        $lappointment=$_POST['lappointment'];
        $psymptom=$_POST['symptom'];
        $attended=$_POST['attend'];
        
       // if($attended !== $nattend){
           // echo "please select only one";
       // }
    
        $suggestion=$_POST['suggestion'];
       
        $size=4097152;
        $allowedExts = array("pdf","docs","dotx","doc","docx");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $upload_pdf=$_FILES["file"]["name"];
         move_uploaded_file($_FILES["file"]["tmp_name"],"pdf/". $_FILES["file"]["name"]);
        if(!$allowedExts){ 
            echo"please enter correct format";
        }
        if (!$allowedExts>=$size){
    echo "please  enter correct  size";
        }
        $query="INSERT INTO  `preport`(dname,duid,pname,puid,pdob,gender,lastappointment,psymptom,attend,notattend,suggestion,pdf) VALUE('$dname','$duid','$pname','$puid','$pdob','$pgender','$lappointment','$psymptom','$attended','$nattend','$suggestion','$upload_pdf')";
        $result=mysqli_query($connection,$query);
        if($result){
          echo "done";
    
        }else{
          echo "submit again";
        }
}
    ?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>