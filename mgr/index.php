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
$mgr_id=$_COOKIE["t_user"];
$the_details=mysqli_query($link,"select * from `theatre` where `mgr_id`='$mgr_id'" ) ;
      $th_details=mysqli_fetch_array($the_details);
      $th_id=$th_details['id'];
      
 $screen_details=mysqli_query($link,"select * from `screen` where `theatre_id`='$th_id'" ) ; 
 $screens=array();
		while ($myrow =mysqli_fetch_array($screen_details))
		{
			$screens[]=$myrow;
		}   
		foreach ($screens as $sc) 
		{
			$sc_id=$sc['id'];
			$circle_details=mysqli_query($link,"select * from `screen_details` where `screen_id`='$sc_id'" ) ; 
 $circles=array();
		while ($myrow =mysqli_fetch_array($circle_details))
		{
			$circles[]=$myrow;
		}  
		$sql="SELECT * FROM `show_time` WHERE `screen_id`='{$sc_id}' ";
$result=mysqli_query($link,$sql);
$show_times=mysqli_fetch_array($result);
$shows1=array();
$shows=array();
$shows1= explode(',', $show_times['time_slot_id']); 
$shows= array_filter($shows1,'is_numeric');
			
			?>
<div id="bd">
	<h1><?php echo $sc['name'];?></h1>
	<table>
		<thead>
		<tr><th rowspan="2">Class Name</th>
			<th rowspan="2">Ticket Price</th>
			<th colspan="3">Booked Seats By Show</th>
			<th rowspan="2">Total Price</th>
		</tr>
		<tr>
			<?php
for($i=0;$i<count($shows);$i++)
{
  $time_slots=mysqli_query($link,"select * from `time_slots` where id='$shows[$i]'" ) ; 
  //echo "select * from `time_slots` where id='$shows[$i]'";
 $time_slot=mysqli_fetch_array($time_slots);   
?>
<th><?php echo date('h.i',$time_slot['showtime']);?></th>
  <?php
  }
  ?>  
		</tr>
	</thead>
		<?php
		foreach ($circles as $cd) 
		{
		?>
		<tbody>
		<tr><td><?php echo $cd['class_name'];?></td>
			<td><?php echo $cd['price'];?></td>
			<td></td>
			<td></td>
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
     