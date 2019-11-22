<?php require_once('db.php');  ?>
<?php
require_once('login1.php');
require_once('head.php');
require_once('menu.php');
require_once('phpqrcode/qrlib.php');



?>

<section class="section-long">
        <div class="container">

<?php

$uid=$_COOKIE['t_id'];
$book_id=$_GET['book_id'];


$sql="SELECT * FROM `booking`  where `u_id` like '{$uid}' and b_id='$book_id' ";

$result=mysqli_query($link,$sql);
if(mysqli_error($link))
{
        die(mysqli_error($link));
}

$codeContents="http://mca2019.autopermit.in/view_ticket.php?book_id={$book_id}";
QRcode::png($codeContents, 'qr.png');
    
   // echo $svgCode;


echo "<table class='table' >
<caption  style='caption-side: top;'><h3>Memico Theatre Booking System</h3><img src='qr.png'></img></caption>
<thead>

<tr><th colspan=2>Ticket</th></tr></thead>";
echo '<tbody>';
$row=mysqli_fetch_assoc($result);
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
$theatreName='caxa';



$sql="SELECT * from booking NATURAL JOIN screen_details NATURAL JOIN screen join theatre on screen.t_id=theatre.t_id WHERE b_id = '{$book_id}'";
$result=mysqli_query($link,$sql);
if(mysqli_error($link))
{
    die(mysqli_error($link));
}

$row1=mysqli_fetch_assoc($result);




$sql="SELECT * from booking NATURAL JOIN show_time NATURAL JOIN time_slots WHERE b_id='{$book_id}'";
$result=mysqli_query($link,$sql);
if(mysqli_error($link))
{
    die(mysqli_error($link));
}

$row2=mysqli_fetch_assoc($result);


$sql="SELECT * from booking NATURAL JOIN show_time NATURAL JOIN movie_show NATURAL JOIN movie WHERE b_id='{$book_id}'";
$result=mysqli_query($link,$sql);
if(mysqli_error($link))
{
    die(mysqli_error($link));
}

$row3=mysqli_fetch_assoc($result);

$showtime = date('H:i', mktime(0, $row2['time_showtime']));
$total=$row['b_ticket_fare']+$row['b_conv_charge'];

echo "<tr><td>Booking Time</td><td>{$booktime}</td></tr>";
echo "<tr><td>Theatre Name</td><td>{$row1['t_theatrename']}</td></tr>";
echo "<tr><td>Screen Name</td><td>{$row1['scr_name']}</td></tr>";
echo "<tr><td>Movie Name</td><td>{$row3['mov_name']}</td></tr>";
echo "<tr><td>Show Date</td><td>{$visittime}</td></tr>";
echo "<tr><td>Class</td><td>{$row1['scrd_class_name']}</td></tr>";
echo "<tr><td>Time</td><td>{$showtime}</td></tr>";
echo "<tr><td>Booked Seats</td><td>{$row['b_booked_seats']}</td></tr>";
echo "<tr><td>Ticket Fare</td><td>{$row['b_ticket_fare']} &#8377;</td></tr>";
echo "<tr><td>Conveniance Charge</td><td>{$row['b_conv_charge']} &#8377;</td></tr>";
echo "<tr><td>Total Fare</td><td>{$total} &#8377; </td></tr>";
echo "<tr><td colspan=2 style='text-align:center;'><button onclick='window.print();'>Print</button></td></tr>";
}
echo '</tbody>';
echo '</table>';

?>

</section>
</div>
<?php

include_once('model.php');
?>
</body>
</html>