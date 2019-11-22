<?php require_once('db.php');  ?>
<?php
require_once('login1.php');
require_once('head.php');
require_once('menu.php');




?>

<section class="section-long">
        <div class="container">

<?php

$uid=$_COOKIE['t_id'];
$sql="SELECT * FROM `booking`  where `u_id` like '{$uid}' order  by `b_visit_date` desc";

$result=mysqli_query($link,$sql);
if(mysqli_error($link))
{
        die(mysqli_error($link));
}

if(mysqli_num_rows($result)>0)
{
echo "<table class='table'><tr><th>Booked Time</th><th>Show Date</th><th>Seats</th><th>Fare</th><th>Status</th><th colspan=2></th></tr>";
while($row=mysqli_fetch_assoc($result))
{

        
       $fare=$row['b_conv_charge']+$row['b_ticket_fare'];
       switch($row['b_status'])
       {

        case 0:$status='Booked but not paid';
       break;
       case 1:$status='Booked and paid';
       break;
       default:$status='Unknown status';
       break;
       }
$booktime=date('d-m-Y h:m',$row['b_booked_time']);
$visittime=date('d-m-Y',$row['b_visit_date']);


echo "<tr><td>{$booktime}</td><td>{$visittime}</td><td>{$row['b_booked_seats']}</td><td>{$fare}</td><td>{$status}</td><td><a href='view_ticket.php?book_id={$row['b_id']}' target='_blank'>View Ticket</a></td><td>Pay</td></tr>";

}

echo '</table>';

}else
{
echo "<h1>No booking History found..!</h1>";
}

?>

</section>
</div>
<?php

include_once('model.php');
?>
</body>
</html>