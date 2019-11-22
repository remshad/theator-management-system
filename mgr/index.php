<?php
require('login1.php');   
include_once('head.php');    
?>  
<style type="text/css">
	.background {
  position: fixed;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  object-fit: cover;
  height: 100%;
  width: 100%;
}
#bd
{
    width: 750px;
    margin: 0 auto;
    background-color: #fff;
    padding: 10px 50px 50px 50px;
    border: 2px solid #cbcbcb;
    font-family: "monospace";
    font-size: 30px;
    color: black;

}
#bd h1 {
    text-align: center;
    padding: 2px 0px;
    
}
table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border: 3px solid purple;
}

thead th:nth-child(1) {
  width: 15%;
}

thead th:nth-child(2) {
  width: 15%;
}

thead th:nth-child(3) {
  width: 5	5%;
}

thead th:nth-child(4) {
  width: 15%;
}

th, td {
  padding: 20px;
}
  body {
  margin: 40px auto;
  background-image: linear-gradient(to top, #a3bded 0%, #6991c7 100%);
}
thead th, tfoot th, tfoot td {
  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
  border: 3px solid purple;
}
</style>
<?php
$today1=date("Y-m-d");
      $today=strtotime($today1);
$mgr_id=$_COOKIE["t_id"];
$the_details=mysqli_query($link,"select * from `theatre` where `u_id`='$mgr_id'" ) ;
      $th_details=mysqli_fetch_array($the_details);
      $th_id=$th_details['t_id'];
      
 $screen_details=mysqli_query($link,"select * from `screen` where `t_id`='$th_id'" ) ; 
 $screens=array();
		while ($myrow =mysqli_fetch_array($screen_details))
		{
			$screens[]=$myrow;
		}   
		foreach ($screens as $sc) 
		{
			$sc_id=$sc['scr_id'];
			$circle_details=mysqli_query($link,"select * from `screen_details` where `scr_id`='$sc_id'" ) ; 
 $circles=array();
		while ($myrow =mysqli_fetch_array($circle_details))
		{
			$circles[]=$myrow;
		}  
		$sql="SELECT * FROM `show_time` WHERE `scr_id`='{$sc_id}' ";
$result=mysqli_query($link,$sql);
$show_times=array();
while ($myrow =mysqli_fetch_array($result))
    {
      $show_times[]=$myrow;
    } 
			
			?>
<div id="bd">
	<h1><?php echo $sc['scr_name'];?></h1>
	<table>
		<thead>
		<tr><th>Class Name</th>
			<th>Ticket Price</th>
			
			<?php
foreach($show_times as $sh_ti)
{
  $time_id=$sh_ti['time_id'];
  $time_slots=mysqli_query($link,"select * from `time_slots` where time_id='$time_id'" ) ; 
  //echo "select * from `time_slots` where id='$shows[$i]'";
 $time_slot=mysqli_fetch_array($time_slots);   
?>
<th><?php echo date('H:i', mktime(0,$time_slot['time_showtime']));?></th>
  <?php
  }
  ?>  
  <th>Total Price</th>
    </tr>
	</thead>
		<?php
		foreach ($circles as $cd) 
		{
      $total=0;
      $scrd_id=$cd['scrd_id'];
      //select sum(b_booked_seats) from booking where scrd_class_name=12
      //echo "select sum(b_booked_seats) as booked from booking where scrd_class_name='$scrd_id' and b_visit_date='$today'";
      //print_r($circle_booked);

		?>
		<tbody>
		<tr><td><?php echo $cd['scrd_class_name'];?></td>
			<td><?php echo $cd['scrd_price'];?></td>
			  <?php
foreach($show_times as $sh_ti)
{
  $sh_timeid=$sh_ti['movsh_id'];
  $mov_shows1=mysqli_query($link,"select * from `movie_show` where movsh_id='$sh_timeid'" ) ; 
  //echo "select * from `time_slots` where id='$shows[$i]'";
 $mov_shows=mysqli_fetch_array($mov_shows1);
 $mov_sh_id=$mov_shows['movsh_id'];
  $circle_booked1=mysqli_query($link,"select sum(b_booked_seats) as booked from booking where scrd_id='$scrd_id' and b_visit_date='$today' and showt_id='{$sh_timeid}'" ) ; 
  //echo "select * from `time_slots` where id='$shows[$i]'";
 $circle_booked=mysqli_fetch_array($circle_booked1);
 $total=$total+$circle_booked['booked'];  
?>
<td><?php echo $circle_booked['booked'];?></td>
  <?php
  }
  ?>  
			<td><?php echo $total;?></td>
		</tr>
	</tbody>
		<?php
	}
	?>
</table>
         
    </div>
    <?php
}
?>
<?php
    include_once('foot.php');
?>
     