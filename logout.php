<?php
include 'connection.php';

session_start();
//if(isset($_SESSION['email']))
//{
//  echo 'hii';  
//}

unset($_SESSION['email']);
session_destroy();

    

header("location:index.php");


        exit();
?>
