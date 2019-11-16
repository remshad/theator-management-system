<?php


require_once('dbs.php');


$sc_id=intval($_GET['screen_id']);

$sql="SELECT * FROM `show_time` WHERE `screen_id`='{$sc_id}' ";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($result))
{
echo "<option value='{$row['screen_id']}'>{$row['time_slot_id']}</option>";
print_r($row);
}



?>