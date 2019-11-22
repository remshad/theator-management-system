<?php
require('login1.php'); 

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
  

    
    if(isset($_POST['submitedit']) || ($_GET['movid']))
    {
                    
        $e_movid=isset($_POST['submitedit'])?$_POST['edit_movid']:$_GET['movid'];
            $sql="SELECT * FROM movie NATURAL JOIN language WHERE mov_id='{$e_movid}'";
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
           
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
                    $setcat[$rowcat['cat_id']]=true;
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
    
                $desc=" <b style='font-size:30px'>{$row['mov_id']}.{$row['mov_name']}</font>&nbsp({$row['language']})&nbsp{$row['mov_duration']}mins</b><br>
                <b></b> <b>Genre:&nbsp</b>{$categories}<br>
                        <b>Director:&nbsp</b>{$row['mov_direction']}<br>
                        <b>Cast:&nbsp</b>{$row['mov_starring']}<br>
                        <b>Production:&nbsp;</b>{$row['mov_production']}<br>
                        <b>Release Date:&nbsp</b>".date('d-m-Y', $row['mov_released'])."<br>
                        <b>Description:&nbsp</b>{$row['mov_description']}<br>";
                
    
               echo "<div class='movgrid-item'>
                        <div class='movgrid-itemimg'><img src='{$row['mov_img_path']}'></div>
                        
                        <div class='movgrid-itemdesc'>
                            <div>{$desc}</div>
                            <div>
                                <form name='finishedit' action='movie.php'>
                                
                                </form></div>
                        </div>
                    </div>";



                    $sql="SELECT * FROM language";
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }   
                    $langoption="<option default>-select language-</option>";
            
                    while($rowl=mysqli_fetch_assoc($result))
                    {
                        if($row['language']==$rowl['language'])
                        {
                            $langoption=$langoption."<option value='{$rowl['lang_id']}' selected>{$rowl['language']}</option>";
                        }
                    }
            
            
                    $sql="SELECT * FROM category";
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }   
                    $genreoption="";
            
                    while($rowc=mysqli_fetch_assoc($result))
                    {
                        if(isset($setcat[$rowc['cat_id']])){
                            $genreoption=$genreoption."{$rowc['cat_name']}&nbsp;<input type='checkbox' name='new_movcat[]' value='{$rowc['cat_id']}' checked>&nbsp;&nbsp;";
                        } else {
                            $genreoption=$genreoption."{$rowc['cat_name']}&nbsp;<input type='checkbox' name='new_movcat[]' value='{$rowc['cat_id']}'>&nbsp;&nbsp;";
                        }
                    }

                echo "
                <div class='content' style='display:block'>
                <form action='movieeditc.php' method='post' enctype='multipart/form-data'>
                
                    <div>
                        <div>Movie Name:</div>
                        <div><input type='text' name='new_movname' value='{$row['mov_name']}'></div>
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
                        <div><input type='text' name='new_imgsrc' value='{$row['mov_img_path']}'></div>
                    </div>
                    <div>
                        <div>Duration:</div>
                        <div><input type='time' name='new_movdur' min='01:00' max='05:00' value=".date('H:i', mktime(0,$row['mov_duration']))."></div>
                    </div>
                    <div>
                        <div>Youtube Trailer Path:</div>
                        <div><input type='text' name='new_vidsrc' value='{$row['mov_youtube_link']}'></div>
                    </div>
                    <div>
                        <div>Release Date:</div>
                        <div><input type='date' name='new_movreldate' value=".date('Y-m-d', $row['mov_released'])."></div>
                    </div>
                    <div>
                        <div>Direction:</div>
                        <div><input type='text' name='new_movdir' value='{$row['mov_direction']}'></div>
                    </div>
                    <div>
                        <div>Cast:</div>
                        <div><textarea name='new_movcast'>'{$row['mov_starring']}'</textarea></div>
                    </div>
                    <div>
                        <div>Production:</div>
                        <div><input type='text' name='new_movprod' value='{$row['mov_production']}'></div>
                    </div>
                    <div>
                        <div>Description:</div>
                        <div><textarea name='new_movdesc'>'{$row['mov_description']}'</textarea></div>
                    </div>
                    
                    <center><input type='submit' name='submiteditc' value='Confirm Edit' ></center>
                    <input type='hidden' name='new_movid' value='{$row['mov_id']}'>
                </form>
                </div>
        
                
                
                <br><br>";
            }
    }       
?>
        
 
<?php
    include_once('foot.php');
?>
     