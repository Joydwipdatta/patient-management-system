<?php
session_start();
session_unset();
header('location:/medicine/patientlogin.php');
?>