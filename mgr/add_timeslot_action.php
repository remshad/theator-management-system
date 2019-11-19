<?php
include_once('dbs.php');
    if(isset($_POST['submit']))
    {
      $sc_id=$_POST['screen'];
      $slots=$_POST['slots'];
      if(count($slots)==0)
      {
        echo "<script>
alert('please select timeslot');
window.location.href='add_timeslot.php';
</script>";

      }
      foreach ($slots as $slo) 
      {
      	
  $result=mysqli_query($link,"INSERT INTO `show_time`(`scr_id`,`time_id`) VALUES ('$sc_id','$slo')");
     	
     }
     if($result)
     {
      echo "<script>
alert('show times assigned to screen successfully...');
window.location.href='index.php';
</script>";
     }
//      }
    
      // $result= mysqli_query($link,"INSERT INTO `theatre`(`theatrename`,`district_id`,`mgr_id`) VALUES ('$theatre','$district','$mgr_id')");
      // if($result)
      // {
      // 	header("Location:add_screen.php");
      // }
      // else
      // {
      // 	die("prepare statement error.....");
      //}
  }
?>