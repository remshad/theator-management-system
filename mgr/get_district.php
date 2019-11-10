<?php


require_once('dbs.php');


$id=intval($_GET['state_id']);

$sql="SELECT * FROM `district` WHERE `state_id`  like '{$id}' ";

$result=mysqli_query($link,$sql);

while($row=mysqli_fetch_assoc($result))
{

echo "<option value='{$row['id']}'>{$row['d_name']}</option>";

}


?>