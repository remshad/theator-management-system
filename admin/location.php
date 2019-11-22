<?php
require('login1.php'); 

$head=
    "<script>
    

    function edit(myid)
    {
      //alert(myid.name);
    var nvalue=prompt('Enter Name');
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
  
    if(isset($_GET['action']))
    {
       
        if($_GET['action']=='edit')
        {    
    
            if(isset($_GET['state_id']))
              {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>2 && testtext($_GET['nvalue']))
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['state_id']=intval($_GET['state_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE state SET state_name='{$_GET['nvalue']}' WHERE state_id='{$_GET['state_id']}'";
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
            if(isset($_GET['state_id']))
            {
                
                $state_id=intval($_GET['state_id']); 

                $result1=mysqli_query($link,"SELECT * FROM state WHERE state_id='{$state_id}'");
                if(mysqli_num_rows($result1)==1)
                {
                    //echo "deleting";
                    $sql="DELETE FROM state WHERE state_id='{$state_id}' ";
                    mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }
            }
        } */
        else if($_GET['action']=='dedit')
        {    
    
            if(isset($_GET['district_id']))
              {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>0  && testtext($_GET['nvalue']))
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['district_id']=intval($_GET['district_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE district SET district_name='{$_GET['nvalue']}' WHERE district_id='{$_GET['district_id']}'";
                    $result=mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                    
                }
                 
              }
    
            
        
        }
        /* else if($_GET['action']=='ddelete')
        {    
            if(isset($_GET['district_id']))
            {
                
                $district_id=intval($_GET['district_id']); 

                $result1=mysqli_query($link,"SELECT * FROM district WHERE district_id='{$district_id}'");
                if(mysqli_num_rows($result1)==1)
                {
                    //echo "deleting";
                    $sql="DELETE FROM district WHERE district_id='{$district_id}' ";
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
        
       
            if(isset($_POST['new_state']) && strlen($_POST['new_state'])>2  && testtext($_POST['new_state']))
            {
                //echo '<script>alert("'.$_GET['nvalue'].'")</script>';
                
                $_POST['new_state']=mysqli_real_escape_string($link,$_POST['new_state']);
                $sql="SELECT * FROM state WHERE state_name='{$_POST['new_state']}'";

                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                
                if(mysqli_num_rows($result)>0)
                {
                    echo '<script>alert("Duplicate Entry Not Allowed")</script>';
                } else {
                    $sql="INSERT INTO state (state_name) VALUES ('{$_POST['new_state']}')";
                    //echo $sql;
                    
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }    
            }
        
    }

    if(isset($_POST['submitd']))
    {
        
       
            if(isset($_POST['new_district']) && strlen($_POST['new_district'])>2 && testtext($_POST['new_district']))
            {
                //echo '<script>alert("'.$_GET['nvalue'].'")</script>';
                
                $_POST['new_district']=mysqli_real_escape_string($link,$_POST['new_district']);
                $sql="SELECT * FROM district WHERE district_name='{$_POST['new_district']}'";

                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                
                if(mysqli_num_rows($result)>0)
                {
                    echo '<script>alert("Duplicate Entry Not Allowed")</script>';
                } else {
                    $sql="INSERT INTO district (district_name) VALUES ('{$_POST['new_district']}')";
                    //echo $sql;
                    
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }    
            }
        
    }
    //------------STATES
       $sql="SELECT * FROM state";
       $result = mysqli_query($link,$sql);
       if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }
       
        echo "
        <form action='location.php' method='post' enctype='multipart/form-data'>
        <center><table>
        <tr><td>Add New State as </td><td>&nbsp<input type='text' name='new_state'> </td><td>&nbsp<input type='submit' name='submit' value='Add' > </td></tr>
        </table></center> 
        </form>
        <br>";

        echo "
        <form action='location.php' method='post' enctype='multipart/form-data'>
        <center><table>
        <tr><td>Add New District as </td><td>&nbsp<input type='text' name='new_district'> </td><td>&nbsp<input type='submit' name='submitd' value='Add' > </td></tr>
        </table></center> 
        </form>
        <br>";

        echo "<table class='table table-hover'><tr><th>State Id</th><th>State</th></tr>";
       
        while($row=mysqli_fetch_assoc($result))
        {
           echo "<tr> <td>{$row['state_id']}</td> <td>{$row['state_name']}</td> 
                <td><button name='location.php?state_id={$row['state_id']}&action=edit' onclick='edit(this);'>Edit</button></td>
                
                </tr>";
        }
        echo "</table>";
        //<td><button name='location.php?state_id={$row['state_id']}&action=delete' onclick='deletes(this);'>Delete</button></td>

        $sql="SELECT * FROM district NATURAL JOIN state ORDER BY state_name,district_name";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }
        

        echo "<table class='table table-hover'><tr><th>District Id</th><th>District</th><th>State</th></tr>";
        
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr> <td>{$row['district_id']}</td> <td>{$row['district_name']}</td> <td>{$row['state_name']}</td> 
                <td><button name='location.php?district_id={$row['district_id']}&action=dedit' onclick='edit(this);'>Edit</button></td>
                
                </tr>";
        }
        echo "</table>";
        //<td><button name='location.php?district_id={$row['district_id']}&action=ddelete' onclick='deletes(this);'>Delete</button></td>
   ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     