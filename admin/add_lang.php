<?php
require('login1.php'); 

$head=
    "<script>
    

    function edit(myid)
    {
      //alert(myid.name);
    var nvalue=prompt('Enter new language');
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
    
            if(isset($_GET['lang_id']))
              {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>0)
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['lang_id']=intval($_GET['lang_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE language set language='{$_GET['nvalue']}' WHERE lang_id='{$_GET['lang_id']}'";
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
            if(isset($_GET['lang_id']))
            {
                
                $lang_id=intval($_GET['lang_id']); 

                $result1=mysqli_query($link,"SELECT * FROM language WHERE lang_id='{$lang_id}'");
                if(mysqli_num_rows($result1)==1)
                {
                    //echo "deleting";
                    $sql="DELETE FROM language WHERE lang_id='{$lang_id}' ";
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
        
       
            if(isset($_POST['new_lang']) && strlen($_POST['new_lang'])>2)
            {
                //echo '<script>alert("'.$_GET['nvalue'].'")</script>';
                
                $_POST['new_lang']=mysqli_real_escape_string($link,$_POST['new_lang']);
                $sql="SELECT * FROM language WHERE language='{$_POST['new_lang']}'";

                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                
                if(mysqli_num_rows($result)>0)
                {
                    echo '<script>alert("Duplicate Entry Not Allowed")</script>';
                } else {
                    $sql="INSERT INTO language (language) VALUES ('{$_POST['new_lang']}')";
                    //echo $sql;
                    
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }    
            }
        
    }
  
       $sql="SELECT * FROM language";
       $result = mysqli_query($link,$sql);
       if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }
       
        echo "
        <form action='add_lang.php' method='post' enctype='multipart/form-data'>
        <center><table>
        <tr><td>Add New Language as </td><td>&nbsp<input type='text' name='new_lang'> </td><td>&nbsp<input type='submit' name='submit' value='Add' > </td></tr>
        </table></center> 
        </form>
        <br><br>";

        echo "<table class='table table-hover'><tr><th>Language No</th><th>Language</th></tr>";
       
        while($row=mysqli_fetch_assoc($result))
        {
           echo "<tr> <td>{$row['lang_id']}</td> <td>{$row['language']}</td> 
                <td><button name='add_lang.php?lang_id={$row['lang_id']}&action=edit' onclick='edit(this);'>Edit</button></td>
                
                </tr>";
        }
        //<td><button name='add_lang.php?lang_id={$row['lang_id']}&action=delete' onclick='deletes(this);'>Delete</button></td>
       
       echo "</table>";
   ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     