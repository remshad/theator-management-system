<?php
require('login1.php'); 

/*$head=
    "<script>
      
        function edit(myid)
        {
        //alert(myid.name);
        var nvalue=prompt('Enter new Time Slot');
        //myid.href=myid.href+'&nvalue='+nvalue;

            if(nvalue!=null)
            {
            myid.name=myid.name+'&nvalue='+nvalue;
            // alert(myid.name);
            window.location=myid.name;
            }        
        
        }
        
        
        function deletes(myid)
        {
            if (confirm('Are you ok?')) {
                window.location=myid.name;
            } else {
                alert('not ok');
            }
        }
        
    </script>";  */
include_once('head.php');    
?>  


 <div class="container">
   
  <?php
  
    if(isset($_GET['action']))
    {
       
        if($_GET['action']=='edit')
        {    
    
            if(isset($_GET['time_id']))
              {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>0)
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['time_id']=intval($_GET['time_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE time_slots set time_id='{$_GET['nvalue']}' WHERE time_id='{$_GET['time_id']}'";
                    $result=mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                    
                }
                 
              }
    
            
        
        }
        else if($_GET['action']=='delete')
        {    
            if(isset($_GET['time_id']))
            {
                
                $time_id=intval($_GET['time_id']); 

                $result1=mysqli_query($link,"SELECT * FROM time_slots WHERE time_id='{$time_id}'");
                if(mysqli_num_rows($result1)==1)
                {
                    //echo "deleting";
                    $sql="DELETE FROM time_slots WHERE time_id='{$time_id}' ";
                    mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }
            }
        }
    }
    
    if(isset($_POST['submit']))
    {
        
       
            if(isset($_POST['new_ts']) && strlen($_POST['new_ts'])>2)
            {
                //echo $_POST['new_ts'];

                $time = explode(":",$_POST['new_ts']);
                $minutes = intval($time[0])*60 + intval($time[1]);
                //echo $minutes;
                
                $_POST['new_ts']=mysqli_real_escape_string($link,$_POST['new_ts']);
                $sql="SELECT * FROM time_slots WHERE time_showtime='{$minutes}'";

                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                
                if(mysqli_num_rows($result)>0)
                {
                    echo '<script>alert("Duplicate Entry Not Allowed")</script>';
                } else {
                    $sql="INSERT INTO time_slots (time_showtime) VALUES ('{$minutes}')";
                    //echo $sql;
                    
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }    
            }
        
    }
  
       $sql="SELECT * FROM time_slots ORDER BY time_showtime";
       $result = mysqli_query($link,$sql);
       if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }
       
        echo "
        <form action='time_slots.php' method='post' enctype='multipart/form-data'>
        <center><table>
        <tr><td>Add New Time Slot </td><td>&nbsp<input type='time' name='new_ts'> </td><td>&nbsp<input type='submit' name='submit' value='Add' > </td></tr>
        </table></center> 
        </form>
        <br><br>";

        echo "<table class='table table-hover'><tr><th>Time Slot Id</th><th>Time</th></tr>";
       
        while($row=mysqli_fetch_assoc($result))
        {
            //$timestr=(intdiv($row['time_showtime'], 60)).":".($row['time_showtime']%60);
            $timestr = date('H:i', mktime(0,$row['time_showtime']));

           echo "<tr> <td>{$row['time_id']}</td> <td>{$timestr}</td></tr>";
        }
       
       
       echo "</table>";
   ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     