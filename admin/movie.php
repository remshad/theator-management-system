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
    }
    
    if(isset($_POST['submit']))
    {
        
    /*
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

                $sql="INSERT INTO category (cat_name) VALUES ('{$_POST['new_cat']}')";
                //echo $sql;
                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
            }    
        }
        */
        
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


        $sql="SELECT * FROM category";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        }   
        $genreoption="";

        while($row=mysqli_fetch_assoc($result))
        {
           $genreoption=$genreoption."{$row['cat_name']}&nbsp;<input type='checkbox' name='new_movcat[]' value='{$row['cat_id']}'>&nbsp;&nbsp;";
        }
        
       
        echo "
        <button type='button' class='collapsible'>Add New Movie</button>
        <div class='content'>
        <form action='movieadd.php' method='post' enctype='multipart/form-data'>
        
            <div>
                <div>Movie Name:</div>
                <div><input type='text' name='new_movname'></div>
            </div>
            <div>
                <div>Language:</div>
                <div><select name='new_lang'>{$langoption}</select></div>
            </div>
            <div>
                <div>Genre:</div>
                <div>{$genreoption}</div>
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
                <div><textarea name='new_movcast'>Enter text here...</textarea></div>
            </div>
            <div>
                <div>Production:</div>
                <div><input type='text' name='new_movprod'></div>
            </div>
            <div>
                <div>Description:</div>
                <div><textarea name='new_movdesc'>Enter text here...</textarea></div>
            </div>
        
            <center><input type='submit' name='submitadd' value='Add' ></center>
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
/*
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
            }*/
        echo "<div class='movgrid-container'>";
       
        while($row=mysqli_fetch_assoc($result))
        {
            $sqlcat="SELECT * FROM movie NATURAL JOIN movie_category NATURAL JOIN category WHERE mov_id='{$row['mov_id']}'";
            $resultcat = mysqli_query($link,$sqlcat);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            $categories="";
            while($rowcat=mysqli_fetch_assoc($resultcat))
            {
                $categories.="{$rowcat['cat_name']}&nbsp";
            }
            $sqlcount="SELECT COUNT(DISTINCT(t_id)) FROM movie NATURAL JOIN movie_show NATURAL JOIN show_time NATURAL JOIN screen NATURAL JOIN theatre WHERE mov_id='{$row['mov_id']}'";
            $resultcount = mysqli_query($link,$sqlcount);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            while($rowcount=mysqli_fetch_assoc($resultcount))
            {
                $theatrecount=$rowcount['COUNT(DISTINCT(t_id))'];
            }

            $desc=" <b>{$row['mov_id']}.{$row['mov_name']}&nbsp({$row['language']})&nbsp{$row['mov_duration']}mins</b><br>
                    {$categories}<br>
                    Director:&nbsp{$row['mov_direction']}<br>
                    Running in theatres:&nbsp{$theatrecount}<br>
                    Production:&nbsp;{$row['mov_production']}<br>";
            

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
     