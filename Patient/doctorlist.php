<?php
include "connection.php";
session_start();
include "psession.php";

?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Medicine | patient | Doctor list</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="style3.css">
        <link rel="stylesheet" href="queries.css">
    </head>
    <body>
        <!-- nav bar-->
        <header class="navbar">
            <div class="logo">
                <a href="patient.php"><h2>Medicine</h2></a>
            </div>
            <div class="navmanu">
                <ul>
                    <a href="doctorlist.php"><li><ion-icon name="search-outline" class="iconp"></ion-icon>Find Doctor</li></a>
                    <a href="pprofile.php"><li><ion-icon name="person-circle-outline" class="iconp"></ion-icon>Profile</li></a>
                    <a href="logout.php"><li><ion-icon name="log-out-outline" class="iconp"></ion-icon>Logout</li></a>
                </ul>
            </div>
        </header>
        
        <section class="topbar">
            <div class="search">
                <form action="doctorlist.php" method="POST">
                    <span><ion-icon name="search-outline"></ion-icon></span>
                    <select id="speciality" name="speciality">
                        <option value="search">  Search speciality wise doctor </option>
                        <option value="dentist">Dentist</option>
                        <option value="Gynecologist">Gynecologist/obstetrician</option>
                        <option value="physician">General physician</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Ear-Nose-Throat(ENT)">Ear-Nose-Throat(ENT)</option>
                        <option value="Homoeopath">Homoeopath</option>
                        <option value="Ayurveda">Ayurveda</option>
                    
                    </select>
                
                    <input type="submit"  name="submit" value="Search">
                </form>            
            </div>
            <div class="searchcon">
                <p>Fed up of endless wait?</p>
                <h4>Look for Doctor</h4>
            </div>
        </section>
        <section class="drlist">
        <h2> Find Doctor </h2>
                    <p><ion-icon name="checkmark-circle-outline" class="right-icon"></ion-icon>Book appointments with minimum wait-time &  </p>
                    
                    <div class="drlists">
        
                        <table>
        <?php
        
           if(isset($_POST['submit'])){
             $speciality=$_POST['speciality'];
              

             $query="SELECT * FROM `doctor` WHERE   dspeciality LIKE '%$speciality%' ";
             $result=mysqli_query($connection,$query);
              if($result){
               if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    echo '
                            <tr>
                              <td>'.$row['dimage'].' alt=""></td>
                              <td><h3>'.$row['dname'].'</h3> <p>'.$row['dspeciality'].'</p><p>'.$row['daddress'].'</p></td>
                              <td><a href="pslot.php?duid='.$row['duid'].'"><button>Book appointment</button></a></td>
                            </tr>  ';
                }
               }else{
                 echo "<h2> doctors  not available</h2>";
               }
              }
            }
            
            ?>
             </table>
            </div>
            </section>
       

        <footer class="footer">
            <div class="footcontent">
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">Medicine</li>
                        <li>About</li>
                        <li>Blog</li>
                        <li>Careers</li>
                        <li>Press</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">For patients</li>
                        <li>Search for doctors</li>
                        <li>Search for Clinics</li>
                        <li>Health app</li>
                        <li>About medicines</li>
                        <li>Read health article</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">For doctors</li>
                        <li>Profile</li>
                        <li>For Clinics</li>
                        <li>Medicine pro</li>
                        
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">For hospitals</li>
                        <li>Insta by Medicine</li>
                        <li>Profile</li>
                        <li>Medicine Reach</li>
                        <li>Medicine Drive</li>
                        <li>Wellness Plans</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">More</li>
                        <li>Help</li>
                        <li>Developers</li>
                        <li>Privacy Policy</li>
                        <li>Terms & Conditions</li>
                        <li>Healthcare Directory</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">Social</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Linkeden</li>
                        <li>Youtube</li>
                        <li>Github</li>
                    </ul>
                </div>
            </div>
            <div class="footbottom">
                <h1>Medicine</h1>
                <p>Copyright © 2017, Medicine. All rights reserved.</p>
            </div>
        </footer>


        <!-- javascript -->
       
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    

    </body>
</html>