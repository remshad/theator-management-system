<?php
require('login1.php');

$head="<script>
function edit(myid)
{
var name=prompt('Enter new name');
if(name!=null && name.length>2)
{
myid.name=myid.name+'&value='+name;
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
</script>";   
include_once('head.php');    
?>  


 <div class="container">
   
  <?php
  
  if(isset($_POST['submit']) && $_POST['submit']=='submit')
  {
      
      
      $_POST['veg']=intval($_POST['veg']);
      $_POST['category']=intval($_POST['category']);
      $_POST['item_text']=mysqli_real_escape_string($link,$_POST['item_text']);
      if(mysqli_num_rows(mysqli_query($link,"SELECT * FROM `item_generic`  WHERE `Name`='{$_POST['item_text']}' AND  `Cat_id`='{$_POST['category']}' AND `Veg`='{$_POST['veg']}'")))
      {
          $error.=" The item already exists.!";
      }else
      {
               
                    $target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["myImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["myImage"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    if (move_uploaded_file($_FILES["myImage"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["myImage"]["name"]). " has been uploaded.";
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        echo "Sorry, there was an error uploading your file.";
    }
          
      mysqli_query($link,"INSERT INTO `item_generic` (`Name`, `Cat_id`, `Veg`,`Path`)  values  ('{$_POST['item_text']}','{$_POST['category']}','{$_POST['veg']}','{$target_file}')");
          
      }
      
      
  }
  
  if(isset($_GET['action']) && $_GET['action']=='edit')
  {
  if(isset($_GET['item_id']))
  {
    if(isset($_GET['value']) && strlen($_GET['value'])>0)
    {
        $_GET['value']=mysqli_real_escape_string($link,$_GET['value']);
        $_GET['item_id']=intval($_GET['item_id']);
        urldecode($_GET['value']);
        $sql="update  item_generic set Name='{$_GET['value']}' WHERE Item_id='{$_GET['item_id']}'";
        $result=mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }
        
    }
  
    
  }
  }else if(isset($_GET['action']) && $_GET['action']=='delete')
  {
    $item_id=intval($_GET['item_id']); 
  
  $result=mysqli_query($link,"SELECT * FROM `share_item` WHERE `Item_id`='{$item_id}' and `Special` ='0'");
  if(mysqli_num_rows($result)>0)
  {
     $error.=" items avalable in item share table"; 
  }else
  {
      
      $sql="delete from item_generic where `Item_id`='{$item_id}' ";
      mysqli_query($link,$sql);
       if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }
  }
  
  }
  
       $sql="SELECT Item_id,itg.Name as Gen_Name,itc.Name as Cat_Name,Veg FROM `item_generic` as itg join  `item_category` as itc on  itg.`Cat_id`= `itc`.`Cat_id`  WHERE 1";
       $result=mysqli_query($link,$sql);
       if(mysqli_error($link))
       {
           die(mysqli_error($link));
       }
       
       echo "<table class='table table-hover'><caption>List item</caption><tr><th>Number</th><th>Item</th><th>Type</th><th>Category</th><th>Action1</th><th>Action2</th>";
       
       $i=0;
  while($row=mysqli_fetch_assoc($result))
  {
      $i++;
      if($row['Veg']==0)
      {$type='Non Veg';}else
      {$type='Veg';}
      
      echo "<tr><td>{$i}</td><td>{$row['Gen_Name']}</td><td>{$type}</td><td>{$row['Cat_Name']}</td><td><button name='add_item.php?item_id={$row['Item_id']}&action=edit' onclick='return edit(this);'>Edit</button></td><td><button  name='add_item.php?item_id={$row['Item_id']}&action=delete' onClick='return deletes(this);'> Delete</button></a></td></tr>";
  }
  
  echo '</table>';
   ?> 
  <table><caption>Add item</caption>
  <form action="add_item.php" method="post" enctype="multipart/form-data">
 <tr><td>Select Category</td><td> <select name="category">
  <?php
       $sql="SELECT * FROM `item_category` WHERE 1";
       $result=mysqli_query($link,$sql);
       while($row=mysqli_fetch_assoc($result))
       {
echo "<option value='{$row['Cat_id']}'>{$row['Name']}</option> "           ;
           
       }
   ?>
  
  </select></td></tr><tr><td>Enter Item Name</td>
  <td><input type="text" name="item_text"></td></tr>
  <tr><td>Veg?</td><td><select name="veg"><option value="1">Veg</option><option value="0">Non-Veg</option></select></td></tr>
   <tr><td>Upload image</td><td><input type='file' name='myImage' accept='image/*' /></td></tr>
  <tr><td colspan="2">
  <input type="submit" name="submit" value="submit"></td></tr></table>
  </form>
  
  </div>
<?php
    include_once('foot.php');
?>
     