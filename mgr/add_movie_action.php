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
      if($end_date < $start_date)
      {
        echo "<script>
alert('final date can't be greater than starting date);
window.location.href='add_movie.php?sc_id=$sc_id';
</script>";
      }
      if(count($slots)==0)
      {
        echo "<script>
alert('please select timeslot');
window.location.href='add_movie.php?sc_id=$sc_id';
</script>";

      }
      
      	
//echo "INSERT INTO `movie_show`(`mov_id`,`movsh_start_date`,`movsh_end_date`,`showt_id`) VALUES ('$mv_id','$s_date','$e_date','$slo')";
      //echo "INSERT INTO `movie_show`(`mov_id`,`movsh_start_date`,`movsh_end_date`) VALUES ('$mv_id','$s_date','$e_date'");
      else
      {
  $result=mysqli_query($link,"INSERT INTO `movie_show`(`mov_id`,`movsh_start_date`,`movsh_end_date`) VALUES ('$mv_id','$s_date','$e_date')");
     	if($result)
     	{
        $last_id=mysqli_insert_id($link);
        foreach ($slots as $slo) 
      {
        $result1=mysqli_query($link,"INSERT INTO `show_time`(`scr_id`,`time_id`,`movsh_id`) VALUES ('$sc_id','$slo','$last_id')");

      }
       		 echo "<script>
  alert('movie show added successfully...');
  window.location.href='index.php';
  </script>";
     	}
      else
{
   echo "<script>
alert('cannot add movie this time...');
window.location.href='index.php';
</script>";

}
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