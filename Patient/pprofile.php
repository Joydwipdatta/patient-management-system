
<?php
include "connection.php";
session_start();
include "psession.php";

?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Medicine | Patient - Profile</title>
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
                <h2><a href="patient.php">Medicine</a></h2>
            </div>
            <div class="navmanu">
                <ul>
                    <a href="doctorlist.php"><li><ion-icon name="search-outline" class="iconp"></ion-icon>Find Doctor</li></a>
                    <a href="#"><li><ion-icon name="person-circle-outline" class="iconp"></ion-icon>Profile</li></a>
                    <a href="logout.php"><li><ion-icon name="log-out-outline" class="iconp"></ion-icon>Logout</li></a>
                </ul>
            </div>
        </header>
        <div class="profiledetails">
        
            <div class="details">
                <img src="img/pexels-italo-melo-2379004.jpg" alt="">
                <h3><?php echo $result['pname']?></h3>
                <p>User-ID:<?php echo $result['puid']?> </p>
                <p>E-mail: <?php echo $result['pemail']?></p>
                <p>Phone: <?php echo $result['pphone']?></p>
                <p>D.O.B:<?php echo $result['pdob']?></p>
                <p>Gender: <?php echo $result['pgender']?></p>
            </div>
<?php
  $_SESSION['puid'];
  $puid=$_SESSION['puid'];

  if(isset($_POST['submit'])){
  $pname=$_POST['name'];
  $pphone=$_POST['phone'];
  $pemail=$_POST['email'];
  $ppassword=$_POST['password'];
  $uppercase = preg_match('@[A-Z]@', $ppassword);
  $lowercase = preg_match('@[a-z]@', $ppassword);
  $number    = preg_match('@[0-9]@', $ppassword);
  $specialChars = preg_match('@[^\w]@',$ppassword);

  $size=4097152;
  $allowedExts = array("jpeg","jpg","png");
  $temp = explode(".", $_FILES["image"]["name"]);
  $extension = end($temp);
  $uploadimage=$_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],"patient/images/" . $_FILES["image"]["name"]);
  if(!$allowedExts){ 
      echo"please enter correct format";
  }
      if (!$allowedExts>=$size){
  echo "please  enter correct  size";
      }else{
          echo "inserted";
      }
  $pdob=$_POST['dob'];
  $pgender=$_POST['gender'];




if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($ppassword) < 8) {
echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}
  $query= "UPDATE `patient` SET pname='$pname',pphone='$pphone', pemail='$pemail', ppassword='$ppassword', pimage='$uploadimage',  pdob='$pdob',pgender='$pgender'  where  puid='$puid'";
  $result=mysqli_query($connection,$query);
   if($result){
      header('location:pprofile.php');
      echo "updated successfully";
   }
   else{
      die(mysql_error($connection));
  }     
}           
?>
            <div class="editdetails">
                <h4>Edit Details</h4>
                <div class="editform">
            
                    <form action="pprofile.php" method="POST" enctype="multipart/form-data">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="" value="<?php echo $result['pname']?>" placeholder="Enter full name" required>
                        <div class="daytimeslot">
                            <div>
                                <label for="phone">Phone Number</label>
                                <input type="number" name="phone" id="" value="<?php echo $result['pphone']?>" placeholder="Enter mobile number" required>
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="" value="<?php echo $result['pemail']?>" placeholder="Enter email" required>
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="myInput" value="<?php echo $result['ppassword']?>" placeholder="Enter password" required>
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                            <div>
                                <label for="gender">Gender</label>
                                <input type="radio" name="gender" value="male" id="male" checked="checked" class="gender" required>Male
                                <input type="radio" name="gender" value="female" id="female" class="gender">Female
                            </div>
                            <div>
                                <label for="dob">Date Of Birth </label>
                                <input type="date" name="dob" id="" value="<?php echo $result['pdob']?>" placeholder="Enter date of birth" required><br>
                            </div>
                            <div>
                                <label for="image">Change Image</label>
                                <input type="file" name="image"  id=""><br>
                            </div>
                        </div>
  
                        <input type="submit"  name="submit"  value="Save">
                    </form>
                </div>

            </div>
        </div>

       

        <!-- footer -->

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
    
        <script>
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>
    </body>
</html>