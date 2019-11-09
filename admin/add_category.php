<?php
require('login1.php'); 

$head=
    "<script>
    
    
    
    
        function add(myid)
        {
        var new_cat=prompt('Enter new category name');
        
        if(new_cat!=null)
            {
                myid.name=myid.name+'&new_cat='+new_cat;
                window.location=myid.name;
            }
        }
        
        function edit(myid)
        {
          //  alert(myid.name);
        var nvalue=prompt('Enter new category name');
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
        
    </script>";  
include_once('head.php');    
?>  


 <div class="container">
   
  <?php
  
    if(isset($_GET['action']))
    {
       
        if($_GET['action']=='edit')
        {    
    
            if(isset($_GET['cat_id']))
              {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>0)
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['cat_id']=intval($_GET['cat_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE category set name='{$_GET['nvalue']}' WHERE id='{$_GET['cat_id']}'";
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
            if(isset($_GET['cat_id']))
            {
                
                $cat_id=intval($_GET['cat_id']); 

                $result1=mysqli_query($link,"SELECT * FROM category WHERE id='{$cat_id}'");
                if(mysqli_num_rows($result1)==1)
                {
                    //echo "deleting";
                    $sql="DELETE FROM category WHERE id='{$cat_id}' ";
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
        
       
            if(isset($_POST['new_cat']) && strlen($_POST['new_cat'])>2)
            {
                //echo '<script>alert("'.$_GET['nvalue'].'")</script>';
                
<<<<<<< HEAD
            $_POST['category']=mysqli_real_escape_string($link,$_POST['category']);
                $sql="SELECT * FROM item_category WHERE Name='{$_POST['category']}'";

=======
            $_POST['new_cat']=mysqli_real_escape_string($link,$_POST['new_cat']);
                $sql="SELECT * FROM category WHERE name='{$_POST['new_cat']}'";
                
                //echo $sql;
>>>>>>> parent of 609ee6c... Revert "Update add_category.php"
                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                
                if(mysqli_num_rows($result)>0)
                {
                    echo '<script>alert("Duplicate Entry Not Allowed")</script>';
                } else {
                    /*
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
                    */
                    
                    $sql="INSERT INTO category (name) VALUES ('{$_POST['new_cat']}')";
                    //echo $sql;
                    
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }    
            }
        
    }
  
       $sql="SELECT * FROM category";
       $result = mysqli_query($link,$sql);
       if(mysqli_error($link))
       {
            die(mysqli_error($link));
       }
       
       echo "<table class='table table-hover'><tr><th>Category No</th><th>Category Name</th></tr>";
       
       while($row=mysqli_fetch_assoc($result))
       {
           echo "<tr> <td>{$row['id']}</td> <td>{$row['name']}</td> 
                <td><button name='add_category.php?cat_id={$row['id']}&action=edit' onclick='edit(this);'>Edit</button></td>
                <td><button name='add_category.php?cat_id={$row['id']}&action=delete' onclick='deletes(this);'>Delete</button></td>
                </tr>";
       }
       
       
       echo "</table>";
       


        echo "
        <form action='add_category.php' method='post' enctype='multipart/form-data'>
        <table>
        <tr><td>Category Name</td><td><input type='text' name='new_cat'></td></tr>
        <tr><td colspan='2'><input type='submit' name='submit' value='submit' ></td></tr>
        
        </table> ";
        //<tr><td colspan='2'><button name='add_category.php?&action=add' onclick='add(this);'>Add</button></td></tr>
   ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     