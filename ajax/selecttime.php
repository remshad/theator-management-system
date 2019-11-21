<?php




require_once('dbs.php');

file_put_contents('save.txt',var_export($_GET,true));

$date=strtotime($_GET['date']);
$mov_id=$_GET['mov_id'];
$screen=$_GET['screen'];

$sql="SELECT * FROM time_slots NATURAL join show_time WHERE scr_id='{$screen}' and movsh_id in (SELECT movsh_id from movie_show NATURAL JOIN movie WHERE mov_id='{$mov_id}')";
$result=mysqli_query($link,$sql);
echo "<option>Select Time</option>";
while($row=mysqli_fetch_assoc($result))
{
$time=date('H:i', mktime(0, $row['time_showtime']));  

    echo "<option value='{$row['showt_id']}' >Time {$time}</option> ";

}







//'date' => '2019-11-22',
 // 'mov_id' => '1',
 // 'screen' => '1',



?>