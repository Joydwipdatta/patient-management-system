<?php
include 'connection.php';
if(isset($_GET['delete'])){
    
     
    $query="DELETE FROM `slots` WHERE  day='".$_GET['delete']."' ";
    $result=mysqli_query($connection,$query);
    if($result){
        header('location:slot.php');
    }
    else{
        echo "not deleted successfully";
    }
}
?>