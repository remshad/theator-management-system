<?php
session_start();
include_once('dbs.php');
    if(isset($_POST['submit']))
    {
      $theatre=$_POST['theatre'];
      $district=$_POST['district'];
      $_SESSION['screens']=$_POST['screens'];
      $mgr_id=$_COOKIE["share_id"];
      $result= mysqli_query($link,"INSERT INTO `theatre`(`theatrename`,`district_id`,`mgr_id`) VALUES ('$theatre','$district','$mgr_id')");
      if($result)
      {
      	header("Location:add_screen.php");
      }
      else
      {
      	die("prepare statement error.....");
      }


    }
    ?>