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

    function testtext($text){
        if((!preg_match("/^[a-zA-Z0-9\W ]+$/",$text))||(preg_match("/^[ ]+$/",$text)))  
        {
            return false;     
        } else {
            return true;
        }
    }

    function testtexta($text){
        if((!preg_match("/^[a-zA-Z ]+$/",$text))||(preg_match("/^[ ]+$/",$text)))  
        {
            return false;     
        } else {
            return true;
        }
    }
  
    if(isset($_GET['action']))
    {
       
        if($_GET['action']=='edit')
        {    
    
            if(isset($_GET['cat_id']))
              {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>2 && testtexta($_GET['nvalue']))
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['cat_id']=intval($_GET['cat_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE category set cat_name='{$_GET['nvalue']}' WHERE cat_id='{$_GET['cat_id']}'";
                    $result=mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                    
                }
                 
              }
    
            
        
        }
        /* else if($_GET['action']=='delete')
        {    
            if(isset($_GET['cat_id']))
            {
                
                $cat_id=intval($_GET['cat_id']); 

                $result1=mysqli_query($link,"SELECT * FROM category WHERE cat_id='{$cat_id}'");
                if(mysqli_num_rows($result1)==1)
                {
                    //echo "deleting";
                    $sql="DELETE FROM category WHERE cat_id='{$cat_id}' ";
                    mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }
            }
        } */
    }
    
    if(isset($_POST['submit']))
    {
        
       
            if(isset($_POST['new_cat']) && strlen($_POST['new_cat'])>2 && testtexta($_POST['new_cat']))
            {
                //echo '<script>alert("'.$_GET['nvalue'].'")</script>';
                
                $_POST['new_cat']=mysqli_real_escape_string($link,$_POST['new_cat']);
                $sql="SELECT * FROM category WHERE cat_name='{$_POST['new_cat']}'";

                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                
                if(mysqli_num_rows($result)>0)
                {
                    echo '<script>alert("Duplicate Entry Not Allowed")</script>';
                } else {
                    
                    $sql="INSERT INTO category (cat_name) VALUES ('{$_POST['new_cat']}')";
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
       
        echo "
        <form action='add_category.php' method='post' enctype='multipart/form-data'>
        <center><table>
        <tr><td>Add New Category as </td><td>&nbsp<input type='text' name='new_cat'> </td><td>&nbsp<input type='submit' name='submit' value='Add' > </td></tr>
        </table></center> 
        </form>
        <br><br>";

        echo "<table class='table table-hover'><tr><th>Category No</th><th>Category Name</th></tr>";
       
        while($row=mysqli_fetch_assoc($result))
        {
           echo "<tr> <td>{$row['cat_id']}</td> <td>{$row['cat_name']}</td> 
                <td><button name='add_category.php?cat_id={$row['cat_id']}&action=edit' onclick='edit(this);'>Edit</button></td>
                
                </tr>";
        }
       
        //<td><button name='add_category.php?cat_id={$row['cat_id']}&action=delete' onclick='deletes(this);'>Delete</button></td>
       echo "</table>";
       


        
        //<tr><td colspan='2'><button name='add_category.php?&action=add' onclick='add(this);'>Add</button></td></tr>
   ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     