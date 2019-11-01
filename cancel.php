<?php
                                include 'connection.php';
                                $id=$_POST['id'];
                                $filmname=$_POST['filmname'];
                                $time=$_POST['time'];
                                $del="delete from book where id='$id'";
                                $del1=  mysqli_query($conn, $del);
                                
?>


<html>
    <head>
        <script>
            function showid()
            {
                alert('Your Tickets are cancelled');
                window.location.href='seat.php?name=<?php echo $filmname;?>&time=<?php echo $time;?>'
            }
            </script>
    </head>
    <body onload="showid()">
    </body>
</html>