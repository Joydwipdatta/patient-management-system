<?php
  
  $_SESSION['puid'];
  $puid=$_SESSION['puid'];

  if($puid== true){
    
        $query="SELECT * FROM `patient` WHERE puid='$puid'";
        $data=mysqli_query($connection,$query);
        $result=mysqli_fetch_assoc($data);
    }
    else{
        header('location:login.php');
    }
?>