<?php

require_once('db.php');
require_once('login1.php');


file_put_contents('test.txt',var_export($_POST,true));


//$date=strtotime($_POST['date']);
$b_booked_time=time();
$b_booked_seats=$_POST['seat'];
$u_id=$_COOKIE['t_id'];
$b_visit_date=strtotime($_POST['date']);
$b_status=0;
$b_conv_charge=$_POST['conv_fee'];
$scrd_id=$_POST['class'];
$showt_id=$_POST['times'];
$fare=$_POST['ticket_fare'];

$sql="INSERT INTO `booking`( `b_booked_time`, `b_booked_seats`, `u_id`, `b_visit_date`, `b_status`, `b_conv_charge`, `scrd_id`, `showt_id`,`b_ticket_fare`) VALUES ('{$b_booked_time}','{$b_booked_seats}','{$u_id}','{$b_visit_date}','{$b_status}','{$b_conv_charge}','{$scrd_id}','{$showt_id}','{$fare}')";

$result=mysqli_query($link,$sql);

if(mysqli_error($link))
{
    die(mysqli_error($link).$sql);
}else
{
       header('Location:profile.php?book=sucess');
}
?>