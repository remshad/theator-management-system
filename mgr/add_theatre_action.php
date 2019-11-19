<?php
session_start();
include_once('dbs.php');
    if(isset($_POST['submit']))
    {
      $theatre=$_POST['theatre'];
      $district=$_POST['district'];
      $mgr_id=$_COOKIE["t_id"];
      $count=mysqli_query($link,"select * from theatre where u_id='$mgr_id'");
      if(mysqli_num_rows($count)>0)
   {
    echo "<script>
alert('you have already registered a theatre');
window.location.href='index.php';
</script>";
      
    }
    else
    {
      $_SESSION['screens']=$_POST['screens'];
      $result= mysqli_query($link,"INSERT INTO `theatre`(`t_theatrename`,`district_id`,`u_id`) VALUES ('$theatre','$district','$mgr_id')");
      if($result)
      {
          header("Location:add_screen.php");
      }
      else
      {
        echo "<script>
alert('cannot add a theatre this time');
window.location.href='login.php';
</script>";
      }
    }



    }
    ?>