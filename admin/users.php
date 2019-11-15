<?php
require('login1.php');   


$head="<script>
function makeit(myid)
{
if (confirm('Are you ok?')) {
 window.location=myid.name;
} else {
  alert('not ok');
}


}
</script>
";


include_once('head.php');    
?>  
<?php
     
     if(isset($_GET['uid']) && intval($_GET['uid'])>0)
     {
         $uid=intval($_GET['uid']);
         if(isset($_GET['action']) && $_GET['action']=='approve')
         {
             mysqli_query($link,"UPDATE `user` SET u_status=1 WHERE u_id='{$uid}'");
             if(mysqli_error($link))
             {
                 die(mysqli_error($link));
             }
             
         }else if(isset($_GET['action']) && $_GET['action']=='disprove')
         {
             mysqli_query($link,"UPDATE `user` SET u_status=0 WHERE u_id='{$uid}'");
             if(mysqli_error($link))
             {
                 die(mysqli_error($link));
             }
             
         }
         
         
     }
     
 ?>




 <div class="container">
 
 <table class="table table-hover"><caption>User</caption>
 
 <tr><th>No</th><th>User Id</th><th>User Name</th><th>User Type</th><th>Action</th></tr>
 
 <?php
      
    //$sql="SELECT * FROM  `user` WHERE type!=3 and status=0 order by type desc, id desc";
    $sql="SELECT * FROM  `user` order by u_type desc";
    $i=0;
    $result=mysqli_query($link,$sql);

    
    if(mysqli_error($link))
    {
        die(mysqli_error($link));
    }
    $countuser=$countmgr=$countadmin=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $i++;
        $action='';
        $type='';
        if($row['u_type']==0)
        {
            $type="Customer";
            $countuser++;
            //$link="<button name='users.php?uid={$row['id']}&action=approve' onClick='makeit(this);'>Approve</button>";    
        } 
        else if($row['u_type']==1)
        {
            $type="Theatre Manager";
            $countmgr++;
            //$link="<button name='users.php?uid={$row['id']}&action=disprove' onClick='makeit(this);'>Disprove</button>";                  
        }
        else if($row['u_type']==2)
        {
            $type="Administrator";
            $countadmin++;
            //$link="<button name='users.php?uid={$row['id']}&action=disprove' onClick='makeit(this);'>Disprove</button>";                  
        }
        
    echo "<tr><td>{$i}</td><td>{$row['u_id']}</td><td>{$row['u_name']}</td><td>{$type}</td><td>{$action}</td></tr>";   
        
        
    }
  
?>
<?php

echo "<center><h1>USERS : {$countuser} | MANAGERS : {$countmgr} | ADMINS : {$countadmin}</h1></center>";
?> 

</table>
</div>


    
    <div class="container">
 
    <table class="table table-hover"><caption>Manager</caption>
    
    <tr><th>No</th><th>User Id</th><th>User Name</th><th>Theatre</th><th>Area</th><th>Manager Status</th></tr>
    
<?php
    //$sql="SELECT * FROM  `user` NATURAL JOIN `theatre` NATURAL JOIN `district` NATURAL JOIN `state` WHERE user.type=1";
    $sql="SELECT u_id,u_name,u_status,t_theatrename,district_name,state_name FROM `user` NATURAL JOIN `theatre` NATURAL JOIN `district` NATURAL JOIN `state`";
    $i=0;
    $result=mysqli_query($link,$sql);

    
    if(mysqli_error($link))
    {
        die(mysqli_error($link));
    }

    $action='';
    $type='';
    $area='';

    while($row=mysqli_fetch_assoc($result))
    {
        $i++;
        $area=$row['district_name'].", ".$row['state_name'];
        if($row['u_status']==0)
        {
            
            $action="PENDING  <button name='users.php?uid={$row['u_id']}&action=approve' onClick='makeit(this);'>Approve</button>";    
        } 
        else if($row['u_status']==1)
        {
            $action="APPROVED  <button name='users.php?uid={$row['u_id']}&action=disprove' onClick='makeit(this);'>Disprove</button>";                  
        }
        
        
    echo "<tr><td>{$i}</td><td>{$row['u_id']}</td><td>{$row['u_name']}</td><td>{$row['t_theatrename']}</td><td>{$area}</td><td>{$action}</td></tr>";   
        
        
    }


?>
</table>
</div>


<?php
    include_once('foot.php');
?>
     