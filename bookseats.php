<?php

include 'connection.php';
$thname=$_GET['thname'];
$filmname=$_GET['name'];
$time=$_GET['time'];
$seats=$_GET['seats'];
$seat1='';
$q="select bookedseats from book where filmname='$filmname' && time='$time'";
$q1=  mysqli_query($conn, $q);
if($q2=  mysqli_fetch_assoc($q1))
{
    $seat1=$q2['bookedseats'];
}


$s="insert into book(filmname,theatrename,time,bookedseats)values('$filmname','$thname','$time','$seats')";
$s1=  mysqli_query($conn, $s);
$sq="select * from book where filmname='$filmname' and time='$time' and bookedseats='$seats'";
$sq1=  mysqli_query($conn, $sq);
if($sq2=  mysqli_fetch_assoc($sq1))
{
    $id=$sq2['id'];
    
 
}

?>
<html>
    <head>
        <script>
            function showid()
            {
                alert('your id is <?php echo $id;?>')
                window.location.href='seat.php?name=<?php echo $filmname;?>&time=<?php echo $time;?>&tname=<?php echo $thname;?>'
            }
            </script>
    </head>
    <body onload="showid()">
    </body>
</html>
