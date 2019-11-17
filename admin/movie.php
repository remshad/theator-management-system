<?php
require('login1.php'); 

$head=
    "

    <script>
  

        
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
<head>

<style>
        .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 80%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 25px;
        border-radius: 4px;
        align: center;
        }

        .activec, .collapsible:hover {
        background-color: #555;
        width: 80%;
        }

        .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
        width: 80%;
        font-size: 20px;
        }

        input, select {
        width: 100%;
        padding: 12px 20px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
        width: 80%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 4px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        .movgrid-container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        background-color: #ffc34a;
        padding: 6px;
        border-radius: 4px;
        }
        .movgrid-item {
        background-color: #ffebc2;
        display: grid;
        grid-template-columns: 30% auto;
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 5px;
        border-radius: 4px;
        max-width: 50%;
        font-size: 18px;
        }
        .movgrid-itemimg {
        max-height: 100%;
        padding-top: auto;
        }
        .movgrid-itemimg img{
        max-width: 100%;
        align: center;
        padding:2%;
        }
        .movgrid-itemdesc {
        display: grid;
        grid-template-rows: 80% 20%;
        }
        .movgrid-itemdesc input[type=button]{
        padding: 5px;
        }

</style>

</head>

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
                    $sql="UPDATE category set cat_name='{$_GET['nvalue']}' WHERE cat_id='{$_GET['cat_id']}'";
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
        }
    }
    
    if(isset($_POST['submit']))
    {
        
       
            if(isset($_POST['new_cat']) && strlen($_POST['new_cat'])>2)
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
  
        $sql="SELECT * FROM language";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }   
        $langoption="<option default>-select language-</option>";

        while($row=mysqli_fetch_assoc($result))
        {
           $langoption=$langoption."<option value='{$row['lang_id']}'>{$row['language']}</option>";
        }
        
       
        echo "
        <button type='button' class='collapsible'>Add New Movie</button>
        <div class='content'>
        <form action='movie.php' method='post' enctype='multipart/form-data'>
        
            <div>
                <div>Movie Name:</div>
                <div><input type='text' name='new_movname'></div>
            </div>
            <div>
                <div>Language:</div>
                <div><select name='new_lang'>{$langoption}</select></div>
            </div>
            <div>
                <div>Image Path:</div>
                <div><input type='text' name='new_imgsrc'></div>
            </div>
            <div>
                <div>Duration:</div>
                <div><input type='time' name='new_movdur' min='01:00' max='05:00'></div>
            </div>
            <div>
                <div>Youtube Trailer Path:</div>
                <div><input type='text' name='new_vidsrc'></div>
            </div>
            <div>
                <div>Release Date:</div>
                <div><input type='date' name='new_movreldate'></div>
            </div>
            <div>
                <div>Direction:</div>
                <div><input type='text' name='new_movdir'></div>
            </div>
            <div>
                <div>Cast:</div>
                <div><input type='text' name='new_movcast'></div>
            </div>
            <div>
                <div>Production:</div>
                <div><input type='text' name='new_movprod'></div>
            </div>
        
            <center><input type='submit' name='submit' value='Add' ></center>
        </form>
        </div>";

        echo "<script>
        var coll = document.getElementsByClassName('collapsible');
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener('click', function() {
            this.classList.toggle('activec');
            var content = this.nextElementSibling;
            if (content.style.display === 'block') {
            content.style.display = 'none';
            } else {
            content.style.display = 'block';
            }
        });
        }
        </script>
        
        <br><br>";

        $sql="SELECT * FROM movie NATURAL JOIN language";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }

            $sqlcat="SELECT * FROM movie NATURAL JOIN movie_category NATURAL JOIN category";
            $resultcat = mysqli_query($link,$sqlcat);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            $categories="";
            while($row=mysqli_fetch_assoc($resultcat))
            {
                $categories.="{$row['cat_name']}&nbsp";
            }
        
            $sqlcount="SELECT * FROM movie NATURAL JOIN movie_category NATURAL JOIN category";
            $resultcat = mysqli_query($link,$sqlcat);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            $categories="";
            while($row=mysqli_fetch_assoc($resultcat))
            {
                $categories.="{$row['cat_name']}&nbsp";
            }
        echo "<div class='movgrid-container'>";
       
        while($row=mysqli_fetch_assoc($result))
        {


            $desc=" <b>{$row['mov_name']}&nbsp({$row['language']})&nbsp{$row['mov_duration']}mins</b><br>
                    {$categories}<br>
                    Director:&nbsp{$row['mov_direction']}<br>
                    Running in theatres:&nbsp{$row['mov_direction']}<br>
                    {$row['mov_name']}<br>";
            

           echo "<div class='movgrid-item'>
                    <div class='movgrid-itemimg'><img src='{$row['mov_img_path']}'></div>
                    
                    <div class='movgrid-itemdesc'>
                        <div>{$desc}</div>
                        <div><input type='button' value='Edit'></div>
                    </div>
                </div>";
        }
       
       
        echo "</div>";
    ?>
        
  </div>
<?php
    include_once('foot.php');
?>
     