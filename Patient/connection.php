<?php
 $connection= new mysqli('localhost','root','','medicine'); 
 if(!$connection){       
    die(mysqli_error($connection));
 }


?>