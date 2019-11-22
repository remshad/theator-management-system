<?php

require_once('dbs.php');

file_put_contents('rating.txt',var_export($_GET,true));

$sql="SELECT * FROM `rating` WHERE `mov_id`='{$_GET['mov_id']}' and  `u_id`='{$_GET['user']}'";
$result=mysqli_query($link,$sql);

if(mysqli_num_rows($result)>0)
{
echo ("1");
}else
{
    $sa="insert into rating (`mov_id`, `rat_rating`, `u_id`) values ('{$_GET['mov_id']}','{$_GET['val']}','{$_GET['user']}')";
    mysqli_query($link,$sa);
    if(mysqli_error($link))
    {
        echo ("1");    
}else
{
    echo ("2");
}
}

?>