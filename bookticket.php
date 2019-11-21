<?php

require_once('db.php');
require_once('login1.php');


file_put_contents('test.txt',var_export($_POST,true));


'date' => '2018-12-13',
  'class' => '1',
  'seat' => '25',
  'movid' => '1',
  'location' => '223',
  'theatre' => '1',
  'screen' => '1',
  'conv_fee' => '250',

  $date=strtotime($_POST['date']);
  $b_booked_time=time();
  $b_booked_seats=$_POST['seat'];
  $movsh_id=$_POST['seat'];



?>