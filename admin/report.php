 <?php
require('login1.php');   
include_once('head.php');    
?>  


<div class="container">

<?php
    $date = new DateTime();
    //echo "<br>".(($date->getTimestamp())-2592000)." ".date('d-m-Y', (($date->getTimestamp())-2592000))."<br>";
    $checkdate = (($date->getTimestamp())-2592000);
?>

<table class="table table-hover">
<caption>Top Grossing Movies (All Time)</caption>
<tr><th>Id</th><th>Movie</th><th>Ticket sales</th><th>Net Sales(Without Convenience)</th><th>Net Sales</th></tr>
<?php
    $sql="SELECT mov_id,mov_name,sum(b_booked_seats) AS total_tickets,sum(b_ticket_fare) AS net,(sum(b_ticket_fare)+sum(b_conv_charge)) AS totalnet FROM movie NATURAL JOIN movie_show NATURAL JOIN show_time NATURAL JOIN booking GROUP BY mov_id LIMIT 10";

    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr><td>{$row['mov_id']}</td><td>{$row['mov_name']}</td><td>{$row['total_tickets']}</td><td>&#8377 {$row['net']}</td><td>&#8377 {$row['totalnet']}</td></tr>";  
    }
?>
</table>    
<br>


<table class="table table-hover">
<caption>Top Grossing Movies (Past Month)</caption>
<tr><th>Id</th><th>Movie</th><th>Ticket sales</th><th>Net Sales(Without Convenience)</th><th>Net Sales</th></tr>
<?php
    

    $sql="SELECT mov_id,mov_name,sum(b_booked_seats) AS total_tickets,sum(b_ticket_fare) AS net,(sum(b_ticket_fare)+sum(b_conv_charge)) AS totalnet FROM movie NATURAL JOIN movie_show NATURAL JOIN show_time NATURAL JOIN booking WHERE b_booked_time>{$checkdate} GROUP BY mov_id LIMIT 10";

    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr><td>{$row['mov_id']}</td><td>{$row['mov_name']}</td><td>{$row['total_tickets']}</td><td>&#8377 {$row['net']}</td><td>&#8377 {$row['totalnet']}</td></tr>";  
    }
?>
</table>    
<br>

<table class="table table-hover">
<caption>Top Grossing Theatres (All Time)</caption>
<tr><th>Id</th><th>Theatre</th><th>Ticket sales</th><th>Net Sales(Without Convenience)</th><th>Net Sales</th></tr>
<?php
    $sql="SELECT theatre.t_id as tid,t_theatrename,sum(b_booked_seats) AS total_tickets,sum(b_ticket_fare) AS net,(sum(b_ticket_fare)+sum(b_conv_charge)) AS totalnet FROM (screen NATURAL JOIN screen_details NATURAL JOIN booking) JOIN theatre ON theatre.t_id=screen.t_id GROUP BY theatre.t_id  LIMIT 10";
    //echo $sql;
    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr><td>{$row['tid']}</td><td>{$row['t_theatrename']}</td><td>{$row['total_tickets']}</td><td>&#8377 {$row['net']}</td><td>&#8377 {$row['totalnet']}</td></tr>";  
    }
?>
</table> 
<br>

<table class="table table-hover">
<caption>Top Grossing Theatres (Past Month)</caption>
<tr><th>Id</th><th>Theatre</th><th>Ticket sales</th><th>Net Sales(Without Convenience)</th><th>Net Sales</th></tr>
<?php
    $sql="SELECT theatre.t_id as tid,t_theatrename,sum(b_booked_seats) AS total_tickets,sum(b_ticket_fare) AS net,sum((b_ticket_fare)+(b_conv_charge)) AS totalnet FROM (screen NATURAL JOIN screen_details NATURAL JOIN booking) JOIN theatre ON theatre.t_id=screen.t_id WHERE b_booked_time>{$checkdate} GROUP BY theatre.t_id  LIMIT 10";
    //echo $sql;
    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr><td>{$row['tid']}</td><td>{$row['t_theatrename']}</td><td>{$row['total_tickets']}</td><td>&#8377 {$row['net']}</td><td>&#8377 {$row['totalnet']}</td></tr>";  
    }
?>
</table> 
<br>

</div>
<?php
    include_once('foot.php');
?>
     