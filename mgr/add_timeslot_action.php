<?php
include_once('dbs.php');
    if(isset($_POST['submit']))
    {
      $sc_id=$_POST['screen'];
      $slots=$_POST['slots'];
      $slot="";
      foreach ($slots as $slo) 
      {
      	$slot .= $slo.",";
      }
  $result=mysqli_query($link,"INSERT INTO `show_time`(`screen_id`,`time_slot_id`) VALUES ('$sc_id','$slot')");
     	if($result)
     	{
     		echo '<script language="javascript">';
echo "setTimeout(function(){ ";
echo "   document.location='add_timeslot.php';";
echo "}, 100);";  // redirect after 3 seconds
echo "</script>";
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