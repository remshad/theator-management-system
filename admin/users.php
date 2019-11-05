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
             mysqli_query($link,"UPDATE `user` SET status=1 WHERE id='{$uid}'");
             if(mysqli_error($link))
             {
                 die(mysqli_error($link));
             }
             
         }else if(isset($_GET['action']) && $_GET['action']=='disprove')
         {
             mysqli_query($link,"UPDATE `user` SET SET status=0 WHERE id='{$uid}'");
             if(mysqli_error($link))
             {
                 die(mysqli_error($link));
             }
             
         }
         
         
     }
     
 ?>

 <div class="container">
 
 <table class="table table-hover"><caption>User</caption>
 
 <tr><th>No</th><th>Id<th>User</th><th>Action</th></tr>
 
 <?php
      
 $sql="SELECT * FROM  `user` WHERE type!=3 and status=0 order by type desc, id desc";
$i=0;
      $result=mysqli_query($link,$sql);
      if(mysqli_error($link))
      {
          die(mysqli_error($link));
      }
      while($row=mysqli_fetch_assoc($result))
      {
          $i++;
          $link='';
          if($row['Type']==0)
          {
          $link="<button name='users.php?uid={$row['id']}&action=approve' onClick='makeit(this);'>Approve</button>";    
          }else if($row['Type']==1)
          {
          $link="<button name='users.php?uid={$row['id']}&action=disprove' onClick='makeit(this);'>Disprove</button>";                  
          }
          
       echo "<tr><td>{$i}</td><td>{$row['id']}</td><td>{$row['Name']}</td><td>{$link}</td></tr>";   
          
          
      }
      
      
      
      
      
  ?>
 
 </table>
   
  <?php
  
       
       
   ?>
  
  </div>
<?php
    include_once('foot.php');
?>
     