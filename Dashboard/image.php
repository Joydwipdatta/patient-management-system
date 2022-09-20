<?php

//image//
$size=2097152;
$allowedExts = array("jpeg","jpg","png");
$temp = explode(".", $_FILES["image"]["name"]);
$extension = end($temp);
$uploadimage=$_FILES["image"]["name"];
 move_uploaded_file($_FILES["image"]["tmp_name"],"imagess/" . $_FILES["image"]["name"]);
if(!$allowedExts){ 
    echo"please enter corect format";
}
    if (!$allowedExts>=$size){
echo "please  enter correct  size";
    }
        ?>