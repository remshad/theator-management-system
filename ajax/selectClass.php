<?php




require_once('dbs.php');

file_put_contents('save.txt',var_export($_GET,true));

$date=strtotime($_GET['date']);
$mov_id=$_GET['mov_id'];
$screen=$_GET['screen'];
$times=$_GET['times'];

$sql="SELECT * from screen_details WHERE scr_id='1'";
$result=mysqli_query($link,$sql);

echo "<option>Select Class</option>";
while($row=mysqli_fetch_assoc($result))
{
    
    $sql1="SELECT SUM(b_booked_seats) as booked,scrd_id from booking WHERE scrd_id={$row['scrd_id']} and showt_id ='{$times}' and `b_visit_date`='{$date}' group by showt_id";
    $results=mysqli_query($link,$sql1);
    if(mysqli_num_rows($results)>0)
    {
        $row1=mysqli_fetch_assoc($results);
        $booked=$row1['booked'];
    }else
    {
        $booked=0;
    }
$available=$row['scrd_seat_avail']-$booked;

    echo "<option value='{$row['scrd_id']}' data-price='{$row['scrd_price']}' data-available='{$available}' >{$row['scrd_class_name']}  -  {$row['scrd_price']} Rs</option> ";

}







//'date' => '2019-11-22',
 // 'mov_id' => '1',
 // 'screen' => '1',



?>