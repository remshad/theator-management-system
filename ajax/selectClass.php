<?php


file_put_contents('save.txt',var_export($_GET,true));

$date=strtotime($_GET['date']);
$mov_id=$_GET['mov_id'];
$screen=$_GET['screen'];

$sql="SELECT * from movie_show WHERE  mov_id='{$mov_id}}' and  showt_id in (SELECT showt_id from  show_time WHERE scr_id='{$screen}') and {$date} BETWEEN movsh_start_date and movsh_end_date"

//'date' => '2019-11-22',
 // 'mov_id' => '1',
 // 'screen' => '1',



?>