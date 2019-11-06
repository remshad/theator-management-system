<?php
require('login1.php');   
include_once('head.php');    
?>  


 <div class="container">

<table class="table table-hover">
<caption>Pending Share Report </caption>
<tr><th>No<th>Category</th><th>Veg<th>Item</th><th>Available</th></tr>
<?php
     $sql="SELECT SUM(Quantity) as qty,si.item_id as id,ig.Name as item,ig.Veg,ic.Name as category FROM `share_item` as si join item_generic as ig on si.`Item_id`=ig.Item_id join  item_category as ic on ig.Cat_id=ic.Cat_id  join `share_master` as sm on si.Share_id=sm.Share_id WHERE sm.status=0 GROUP by si.Item_id having SUM(Quantity)>0 limit 10";

     $i=0;
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $i++;
    if($row['Veg']==0)
      {$type='Non Veg';}else
      {$type='Veg';}
      
   echo "<tr><td>{$i}</td><td>{$row['category']}</td><td>{$type}</td><td>{$row['item']}</td><td>{$row['qty']}</td></tr>";  
    
}
 ?>
</table>   
  <table class="table table-hover">
<caption>Pending Request Report</caption>
<tr><th>No<th>Category</th><th>Veg<th>Item</th><th>Available</th></tr>
<?php
     $sql="SELECT SUM(ri.Quantity) as qty ,ig.Name as item,ig.Veg,ic.Name as category FROM `request_item` as ri join  `item_generic` as ig on ri.`Item_id`=ig.Item_id join `item_category` as ic on ig.Cat_id=ic.Cat_id WHERE ri.`Status`=0 GROUP by ri.Item_id having sum(ri.Quantity)>0 limit 10";

     $i=0;
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $i++;
    if($row['Veg']==0)
      {$type='Non Veg';}else
      {$type='Veg';}
      
   echo "<tr><td>{$i}</td><td>{$row['category']}</td><td>{$type}</td><td>{$row['item']}</td><td>{$row['qty']}</td></tr>";  
    
}

 ?>

</table>   
  
  </div>
<?php
    include_once('foot.php');
?>
     