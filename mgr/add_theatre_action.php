<?php
session_start();
include_once('dbs.php');
    if(isset($_POST['submit']))
    {
      $theatre=$_POST['theatre'];
      $district=$_POST['district'];
      $_SESSION['screens']=$_POST['screens'];
      $mgr_id=$_COOKIE["share_id"];
      $count=mysqli_query($link,"select * from theatre where u_id='$mgr_id'");
      if(mysqli_num_rows($count)>0)
   {
    header("Location:index.php");
      
    }
    else
    {
      $result= mysqli_query($link,"INSERT INTO `theatre`(`t_theatrename`,`district_id`,`u_id`) VALUES ('$theatre','$district','$mgr_id')");
      if($result)
      {
          header("Location:add_screen.php");
      }
      else
      {
        die("prepare statement error.....");
      }
    }



    }
    ?>