<?php
include_once('dbs.php');
    if(isset($_POST['submit']))
    {
      $sc_id=$_POST['screen_id'];
      $slots=$_POST['slots'];
      $mv_id=$_POST['movie'];
      $end_date=$_POST['e_date'];
      $e_date=strtotime($end_date);
      $start_date=$_POST['s_date'];
      $s_date=strtotime($start_date);
      $slot="";
      foreach ($slots as $slo) 
      {
      	$slot .=$slo.",";
      }

  $result=mysqli_query($link,"INSERT INTO `movie_show`(`movie_id`,`start_date`,`end_date`,`showtime_id`,`screen_id`) VALUES ('$mv_id','$s_date','$e_date','$slot','$sc_id')");
     	if($result)
     	{
     		echo '<script language="javascript">';
        //echo "alert('movie added successfully')";
echo "setTimeout(function(){ ";
echo "   document.location='index.php';";
echo "},100);";  // redirect after 3 seconds
echo "</script>";
     	}
     }
    
      // $result= mysqli_query($link,"INSERT INTO `theatre`(`theatrename`,`district_id`,`mgr_id`) VALUES ('$theatre','$district','$mgr_id')");
      // if($result)
      // {
      // 	header("Location:add_screen.php");
      // }
      // else
      // {
      // 	die("prepare statement error.....");
      //}
  
?>